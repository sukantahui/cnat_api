<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ConvertsCamelToSnake;
use Illuminate\Validation\Rule;

class StoreGuestRequest extends FormRequest
{
    use ConvertsCamelToSnake;

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

            // must be unique in combination with guest_name
            'mobile' => [
                'required',
                'string',
                'max:20',
                Rule::unique('guests')->where(
                    fn($query) =>
                    $query->where('guest_name', $this->guest_name)
                ),
            ],

            // must be unique in combination with guest_name (if provided)
            'wp_number' => [
                'nullable',
                'string',
                'max:20',
                Rule::unique('guests')->where(
                    fn($query) =>
                    $query->where('guest_name', $this->guest_name)
                ),
            ],

            'address' => ['nullable', 'string', 'max:191'],

            // not globally unique anymore (since removed from migration),
            // but still you may want to validate format
            'email' => ['nullable', 'email', 'max:191'],

            'gender_id' => ['required', 'exists:genders,id'],
            'food_preference_id' => ['required', 'exists:food_preferences,id'],
            'inforce' => ['boolean'],
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Convert camelCase to snake_case before validation
        $this->merge(
            $this->convertCamelToSnake($this->all())
        );

        // Ensure inforce has a default value if not set
        if (!$this->has('inforce')) {
            $this->merge(['inforce' => true]);
        }
    }
}
