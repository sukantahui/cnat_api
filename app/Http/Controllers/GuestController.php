<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Http\Requests\StoreGuestRequest;
use App\Http\Requests\SearchGuestRequest;
use App\Http\Requests\UpdateGuestRequest;
use App\Helper\ResponseHelper;
use App\Http\Resources\GuestResource;
use App\Traits\HandlesTransactions;
use Illuminate\Http\Request;


class GuestController extends Controller
{
    use HandlesTransactions;
    /**
     * Display a listing of the resource.
     */
    

    private function maskMobile($mobile)
    {
        if (!$mobile || strlen($mobile) < 4) {
            return $mobile; // fallback if invalid number
        }

        $firstTwo = substr($mobile, 0, 2);
        $lastTwo  = substr($mobile, -2);
        $masked   = str_repeat('X', strlen($mobile) - 4);

        return $firstTwo . $masked . $lastTwo;
    }

    
    public function index(Request $request)
    {
        $perPage = $request->integer('per_page', 10); // Default to 10 if not provided
        $guests = Guest::orderBy('guest_name')->paginate($perPage);

        if ($guests->isEmpty()) {
            return ResponseHelper::error("No guests found", null, 404);
        }

        return ResponseHelper::success("Guests retrieved successfully", GuestResource::collection($guests));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGuestRequest $request)
    {
        return $this->executeInTransaction(function () use ($request) {
            $data = $request->validated();

            // Check if a guest already exists with the same mobile
            $previousGuest = Guest::where('mobile', $data['mobile'])->first();

            if ($previousGuest) {
                $data['previous_guest_id'] = $previousGuest->id;
            }

            $guest = Guest::create($data);
            $guest->token = "CNAT-" . ($guest->id + 1000);
            $guest->save();

            return ResponseHelper::success("Guest created successfully", $guest);
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(Guest $guest)
    {
        
        return ResponseHelper::success("Guest retrieved successfully", new GuestResource($guest));
    }
    public function search(SearchGuestRequest $request)
    {
        $results = Guest::query()

            // ── General keyword ─────────────────────────────────────────────
            // ?key=ravi  →  matches guest_name, mobile, wp_number, email, token
            ->when($request->filled('key'), function ($query) use ($request) {
                $k = $request->key;
                $query->where(function ($q) use ($k) {
                    $q->where('guest_name', 'like', "%{$k}%")
                      ->orWhere('mobile',     'like', "%{$k}%")
                      ->orWhere('wp_number',  'like', "%{$k}%")
                      ->orWhere('email',      'like', "%{$k}%")
                      ->orWhere('token',      'like', "%{$k}%");
                });
            })

            // ── Name ─────────────────────────────────────────────────────────
            // ?name=ravi  →  partial match on guest_name
            ->when($request->filled('name'), function ($query) use ($request) {
                $query->where('guest_name', 'like', "%{$request->name}%");
            })

            // ── Year ─────────────────────────────────────────────────────────
            // ?year=2026  →  exact match on year column
            ->when($request->filled('year'), function ($query) use ($request) {
                $query->where('year', $request->year);
            })

            // ── Mobile ───────────────────────────────────────────────────────
            // ?mobile=9800  →  partial match on mobile OR wp_number
            ->when($request->filled('mobile'), function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('mobile',    'like', "%{$request->mobile}%")
                      ->orWhere('wp_number', 'like', "%{$request->mobile}%");
                });
            })

            // ── Email ─────────────────────────────────────────────────────────
            // ?email=gmail  →  partial match on email
            ->when($request->filled('email'), function ($query) use ($request) {
                $query->where('email', 'like', "%{$request->email}%");
            })

            // ── Address ───────────────────────────────────────────────────────
            // ?address=mumbai  →  partial match on address
            ->when($request->filled('address'), function ($query) use ($request) {
                $query->where('address', 'like', "%{$request->address}%");
            })

            // ── Attending status ──────────────────────────────────────────────
            // ?is_attending=1   →  only guests who are attending
            // ?is_attending=0   →  only guests who are not attending
            ->when($request->has('is_attending') && $request->is_attending !== null, function ($query) use ($request) {
                $query->where('is_attending', filter_var($request->is_attending, FILTER_VALIDATE_BOOLEAN));
            })

            // ── Gender ────────────────────────────────────────────────────────
            // ?gender_id=2  →  exact match
            ->when($request->filled('gender_id'), function ($query) use ($request) {
                $query->where('gender_id', $request->gender_id);
            })

            // ── Food Preference ───────────────────────────────────────────────
            // ?food_preference_id=1  →  exact match
            ->when($request->filled('food_preference_id'), function ($query) use ($request) {
                $query->where('food_preference_id', $request->food_preference_id);
            })

            // ── Token ─────────────────────────────────────────────────────────
            // ?token=CNAT-1023  →  exact match on CNAT token
            ->when($request->filled('token'), function ($query) use ($request) {
                $query->where('token', $request->token);
            })

            // ── Date range (by created_at) ────────────────────────────────────
            // ?date_from=2026-01-01&date_to=2026-12-31
            ->when($request->filled('date_from'), function ($query) use ($request) {
                $query->whereDate('created_at', '>=', $request->date_from);
            })
            ->when($request->filled('date_to'), function ($query) use ($request) {
                $query->whereDate('created_at', '<=', $request->date_to);
            })

            // ── Sorting ───────────────────────────────────────────────────────
            // ?sort_by=year&sort_dir=desc  (default: guest_name asc)
            ->orderBy(
                in_array($request->sort_by, ['guest_name', 'year', 'mobile', 'email', 'created_at'])
                    ? $request->sort_by
                    : 'guest_name',
                $request->sort_dir === 'desc' ? 'desc' : 'asc'
            )

            ->paginate($request->integer('per_page', 20));

        return ResponseHelper::success('Search completed successfully.', GuestResource::collection($results));
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($guestId, Request $request)
    {
        // return $guestId;
        $guest = Guest::findOrFail($guestId);
        return ResponseHelper::success("Guest retrieved successfully", new GuestResource($guest));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuestRequest $request, Guest $guest)
    {
        $guest->update($request->validated());
        return ResponseHelper::success("Guest Updated successfully", $guest);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guest $guest)
    {
        $guest->delete();
        return ResponseHelper::success("Guest deleted successfully");
    }
}
