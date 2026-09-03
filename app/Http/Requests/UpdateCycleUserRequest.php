<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

/**
 * UpdateCycleUserRequest
 *
 * Extends BaseRequest which automatically converts camelCase keys from React
 * into snake_case before validation. So React can send either:
 *   periodDuration  OR  period_duration
 * and both will validate as 'period_duration' by the time rules() runs.
 *
 * validated() returns snake_case keys that map directly to DB columns.
 * No manual mapping needed in the controller.
 */
class UpdateCycleUserRequest extends BaseRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            // Health profile
            'date_of_birth'              => ['nullable', 'date_format:Y-m-d', 'before:today'],
            'weight_kg'                  => ['nullable', 'numeric', 'min:20', 'max:300'],
            'height_cm'                  => ['nullable', 'numeric', 'min:50', 'max:250'],
            'blood_group'                => ['nullable', 'string', 'in:A+,A-,B+,B-,AB+,AB-,O+,O-'],
            'medical_notes'              => ['nullable', 'string', 'max:255'],
            'goal'                       => ['nullable', Rule::in(['pregnancy', 'safe_period', 'general'])],

            // Cycle settings
            // camelCase from React → snake_case by BaseRequest (e.g. periodDuration → period_duration)
            'period_duration'             => ['nullable', 'integer', 'min:1', 'max:15'],
            'average_cycle_length'        => ['nullable', 'integer', 'min:15', 'max:60'],
            'use_custom_average_cycle'    => ['nullable', 'boolean'],
            'luteal_phase_length'         => ['nullable', 'integer', 'min:7', 'max:20'],
            'prediction_months'           => ['nullable', 'integer', 'in:3,6,12'],
            'fertile_window_days_before'  => ['nullable', 'integer', 'min:1', 'max:7'],
            'fertile_window_days_after'   => ['nullable', 'integer', 'min:0', 'max:3'],
        ];
    }
}
