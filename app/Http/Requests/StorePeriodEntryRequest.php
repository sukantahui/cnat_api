<?php

namespace App\Http\Requests;

/**
 * StorePeriodEntryRequest
 * BaseRequest auto-converts camelCase -> snake_case.
 * React can send periodStartDate or period_start_date — both work.
 */
class StorePeriodEntryRequest extends BaseRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'period_start_date' => ['required', 'date_format:Y-m-d'],
            'notes'             => ['nullable', 'string', 'max:191'],
        ];
    }

    public function messages(): array
    {
        return [
            'period_start_date.required'    => 'Period start date is required.',
            'period_start_date.date_format' => 'Date must be in YYYY-MM-DD format.',
        ];
    }
}
