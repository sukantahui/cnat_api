<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchGuestRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules for guest search.
     *
     * Supported query parameters:
     *  key            → general full-text search across name, mobile, email, token
     *  name           → partial match on guest_name
     *  year           → exact match on the year column
     *  mobile         → partial match on mobile or wp_number
     *  email          → partial match on email
     *  address        → partial match on address
     *  is_attending   → boolean filter (1 / 0)
     *  gender_id      → exact match on gender_id
     *  food_preference_id → exact match on food_preference_id
     *  token          → exact match on CNAT token (e.g. CNAT-1023)
     *  date_from      → created_at >= date (YYYY-MM-DD)
     *  date_to        → created_at <= date (YYYY-MM-DD)
     *  sort_by        → column to sort by (default: guest_name)
     *  sort_dir       → asc | desc (default: asc)
     *  per_page       → results per page (default: 20, max: 100)
     */
    public function rules(): array
    {
        return [
            // General full-text
            'key'               => 'nullable|string|max:255',

            // Specific field filters
            'name'              => 'nullable|string|max:255',
            'year'              => 'nullable|integer|min:2000|max:2100',
            'mobile'            => 'nullable|string|max:20',
            'email'             => 'nullable|string|max:191',
            'address'           => 'nullable|string|max:191',
            'is_attending'      => 'nullable|boolean',
            'gender_id'         => 'nullable|integer|min:1',
            'food_preference_id'=> 'nullable|integer|min:1',
            'token'             => 'nullable|string|max:50',

            // Date range (based on created_at)
            'date_from'         => 'nullable|date_format:Y-m-d',
            'date_to'           => 'nullable|date_format:Y-m-d|after_or_equal:date_from',

            // Sorting & pagination
            'sort_by'           => 'nullable|string|in:guest_name,year,mobile,email,created_at',
            'sort_dir'          => 'nullable|string|in:asc,desc',
            'per_page'          => 'nullable|integer|min:1|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'key.max'              => 'The search key may not be greater than 255 characters.',
            'per_page.integer'     => 'The per_page value must be an integer.',
            'per_page.max'         => 'The maximum allowed per_page value is 100.',
            'date_to.after_or_equal' => 'date_to must be on or after date_from.',
            'sort_by.in'           => 'sort_by must be one of: guest_name, year, mobile, email, created_at.',
            'sort_dir.in'          => 'sort_dir must be asc or desc.',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'key' => trim($this->key ?? ''),
        ]);
    }
}
