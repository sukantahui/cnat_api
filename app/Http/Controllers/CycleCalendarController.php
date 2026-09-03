<?php

namespace App\Http\Controllers;

use App\Models\CycleUser;
use App\Models\CyclePeriodEntry;
use App\Http\Requests\UpdateCycleUserRequest;
use App\Http\Requests\StorePeriodEntryRequest;
use App\Helper\ResponseHelper;
use App\Traits\HandlesTransactions;
use Illuminate\Http\Request;

class CycleCalendarController extends Controller
{
    use HandlesTransactions;

    // Build the full payload returned to React
    private function buildPayload(CycleUser $profile): array
    {
        $profile->load('periodEntries');
        return [
            'user_id'        => $profile->user_id,
            'goal'           => $profile->goal,
            'date_of_birth'  => $profile->date_of_birth?->format('Y-m-d'),
            'weight_kg'      => $profile->weight_kg,
            'height_cm'      => $profile->height_cm,
            'blood_group'    => $profile->blood_group,
            'medical_notes'  => $profile->medical_notes,
            'last_seen_at'   => $profile->last_seen_at?->toIso8601String(),
            'created_at'     => $profile->created_at?->toIso8601String(),
            // Settings — camelCase for React
            'settings' => [
                'periodDuration'          => $profile->avg_period_duration,
                'averageCycleLength'      => $profile->custom_cycle_length ?? 28,
                'useCustomAverageCycle'   => (bool) $profile->use_custom_cycle,
                'lutealPhaseLength'       => $profile->luteal_phase_length,
                'predictionMonths'        => $profile->prediction_months,
                'fertileWindowDaysBefore' => $profile->fertile_window_days_before,
                'fertileWindowDaysAfter'  => $profile->fertile_window_days_after,
            ],
            // Period data
            'period_starts' => $profile->periodEntries
                ->pluck('period_start_date')
                ->map(fn($d) => $d->format('Y-m-d'))
                ->values()->toArray(),
            'period_entries' => $profile->periodEntries->map(fn($e) => [
                'id'               => $e->id,
                'period_start_date' => $e->period_start_date->format('Y-m-d'),
                'notes'            => $e->notes,
                'created_at'       => $e->created_at?->toIso8601String(),
            ])->values()->toArray(),
        ];
    }

    // Get or auto-create the authenticated user's cycle profile
    private function getOrCreateProfile(): CycleUser
    {
        $profile = CycleUser::firstOrCreate(['user_id' => auth()->id()]);
        $profile->last_seen_at = now();
        $profile->save();
        return $profile;
    }

    // GET /api/cycle/me — load or create profile
    public function me()
    {
        $profile = $this->getOrCreateProfile();
        $isNew   = $profile->wasRecentlyCreated;
        return ResponseHelper::success(
            $isNew ? 'Welcome! Your cycle profile has been created.' : 'Cycle data loaded.',
            ['is_new_profile' => $isNew, ...$this->buildPayload($profile)]
        );
    }

    // PUT /api/cycle/me — update health profile + cycle settings
    // BaseRequest converts camelCase -> snake_case automatically
    // validated() keys match DB columns directly — no manual mapping needed
    public function updateProfile(UpdateCycleUserRequest $request)
    {
        return $this->executeInTransaction(function () use ($request) {
            $profile = $this->getOrCreateProfile();

            // Map snake_case validated keys to DB columns
            // period_duration -> avg_period_duration (column name differs)
            // average_cycle_length -> custom_cycle_length (column name differs)
            // use_custom_average_cycle -> use_custom_cycle (column name differs)
            $data = $request->validated();
            $remap = [
                'period_duration'           => 'avg_period_duration',
                'average_cycle_length'      => 'custom_cycle_length',
                'use_custom_average_cycle'  => 'use_custom_cycle',
            ];
            $update = [];
            foreach ($data as $k => $v) {
                $update[$remap[$k] ?? $k] = $v;
            }

            $profile->update($update);
            return ResponseHelper::success('Profile updated.', $this->buildPayload($profile->fresh()));
        });
    }

    // POST /api/cycle/period — add one period date
    public function addPeriodDate(StorePeriodEntryRequest $request)
    {
        return $this->executeInTransaction(function () use ($request) {
            $profile = $this->getOrCreateProfile();
            $dateStr = $request->validated()['period_start_date'];
            $notes   = $request->validated()['notes'] ?? null;
            if (CyclePeriodEntry::where('cycle_user_id', $profile->id)->where('period_start_date', $dateStr)->exists()) {
                return ResponseHelper::error("Period date {$dateStr} already recorded.", null, 409);
            }
            CyclePeriodEntry::create(['cycle_user_id' => $profile->id, 'period_start_date' => $dateStr, 'notes' => $notes]);
            return ResponseHelper::success("Period date {$dateStr} added.", $this->buildPayload($profile->fresh()));
        });
    }

    // PUT /api/cycle/period/{date} — edit one period date
    public function editPeriodDate(Request $request, string $date)
    {
        return $this->executeInTransaction(function () use ($request, $date) {
            $request->validate([
                'period_start_date' => ['required', 'date_format:Y-m-d'],
                'notes'             => ['nullable', 'string', 'max:191'],
            ]);
            $profile = $this->getOrCreateProfile();
            $entry   = CyclePeriodEntry::where('cycle_user_id', $profile->id)->where('period_start_date', $date)->firstOrFail();
            $newDate = $request->period_start_date;
            if ($newDate !== $date && CyclePeriodEntry::where('cycle_user_id', $profile->id)->where('period_start_date', $newDate)->exists()) {
                return ResponseHelper::error("Date {$newDate} already exists.", null, 409);
            }
            $entry->update(['period_start_date' => $newDate, 'notes' => $request->notes ?? $entry->notes]);
            return ResponseHelper::success("Updated {$date} to {$newDate}.", $this->buildPayload($profile->fresh()));
        });
    }

    // DELETE /api/cycle/period/{date} — remove one period date
    public function deletePeriodDate(string $date)
    {
        $profile = $this->getOrCreateProfile();
        $deleted = CyclePeriodEntry::where('cycle_user_id', $profile->id)->where('period_start_date', $date)->delete();
        if (!$deleted) { return ResponseHelper::error("Period date {$date} not found.", null, 404); }
        return ResponseHelper::success("Period date {$date} removed.", $this->buildPayload($profile->fresh()));
    }

    // POST /api/cycle/periods/sync — bulk replace all period dates
    public function syncPeriodDates(Request $request)
    {
        return $this->executeInTransaction(function () use ($request) {
            $request->validate([
                'period_starts'   => ['required', 'array'],
                'period_starts.*' => ['string', 'date_format:Y-m-d'],
            ]);
            $profile = $this->getOrCreateProfile();
            $dates   = collect($request->period_starts)->unique()->sort()->values();
            CyclePeriodEntry::where('cycle_user_id', $profile->id)->delete();
            $rows = $dates->map(fn($d) => [
                'cycle_user_id'     => $profile->id,
                'period_start_date' => $d,
                'notes'             => null,
                'created_at'        => now(),
                'updated_at'        => now(),
            ])->toArray();
            if (!empty($rows)) { CyclePeriodEntry::insert($rows); }
            return ResponseHelper::success(count($rows) . ' period dates synced.', $this->buildPayload($profile->fresh()));
        });
    }

    // DELETE /api/cycle/periods — clear all period dates
    public function clearAllPeriods()
    {
        $profile = $this->getOrCreateProfile();
        CyclePeriodEntry::where('cycle_user_id', $profile->id)->delete();
        return ResponseHelper::success('All period history cleared.', $this->buildPayload($profile->fresh()));
    }
}
