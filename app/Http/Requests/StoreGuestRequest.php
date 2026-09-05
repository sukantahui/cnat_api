<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class StoreGuestRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'guest_name' => ['required', 'string', 'max:100'],
            'age'        => ['nullable', 'integer', 'min:1', 'max:120'],

            'mobile' => [
                'nullable',
                'string',
                'max:20',
            ],

            // wp_number is NOT NULL in database and has composite unique with guest_name
            'wp_number' => [
                'required',
                'string',
                'max:20',
                Rule::unique('guests')->where(
                    fn($query) =>
                    $query->where('guest_name', $this->guest_name)
                ),
            ],

            'address' => ['nullable', 'string', 'max:191'],
            'email'   => ['nullable', 'email', 'max:191'],
            'pin'     => ['required', 'string', 'min:4', 'max:4'],
            'token'   => ['nullable', 'string', 'max:50'],
            'year'    => ['nullable', 'integer', 'min:2000', 'max:2100'],

            'gender_id'          => ['required', 'exists:genders,id'],
            'food_preference_id' => ['required', 'exists:food_preferences,id'],
            'is_attending'       => ['nullable', 'boolean'],
            'is_present'         => ['nullable', 'boolean'],
            'comment'            => ['nullable', 'string', 'max:191'],
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        parent::prepareForValidation();

        // Normalize is_present to is_attending
        $isAttending = $this->has('is_attending')
            ? $this->boolean('is_attending')
            : ($this->has('is_present') ? $this->boolean('is_present') : true);

        // Auto-fallback wp_number to mobile if wp_number is not provided
        $wpNumber = $this->filled('wp_number')
            ? $this->wp_number
            : ($this->filled('mobile') ? $this->mobile : null);

        $this->merge([
            'is_attending' => $isAttending,
            'wp_number'    => $wpNumber,
            'mobile'       => $this->filled('mobile') ? $this->mobile : null,
            'email'        => $this->filled('email') ? $this->email : null,
            'address'      => $this->filled('address') ? $this->address : null,
            'comment'      => $this->filled('comment') ? $this->comment : null,
            'year'         => $this->filled('year') ? (int) $this->year : (int) date('Y'),
        ]);
    }
}

