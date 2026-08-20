<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UpdateGuestRequest extends BaseRequest
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
            "guest_name" => [
                'required',
                'string',
                'max:255',

                Rule::unique('guests', 'guest_name')
                    ->ignore(optional($this->route('guest'))->id),
            ],
            "mobile" => [
                'required',
                'string',
                'max:20',

                Rule::unique('guests', 'mobile')
                    ->ignore(optional($this->route('guest'))->id),
            ],
            "wp_number" => [
                'nullable',
                'string',
                'max:20',

                Rule::unique('guests', 'wp_number')
                    ->ignore(optional($this->route('guest'))->id),
            ],
            "email" => [
                'nullable',
                'string',
                'max:255',

                Rule::unique('guests', 'email')
                    ->ignore(optional($this->route('guest'))->id),
            ],
            "gender_id" => [
                'nullable',
                'integer',
                
                Rule::exists('genders', 'id'),
            ],
            "food_preference_id" => [
                'nullable',
                'integer',
                Rule::exists('food_preferences', 'id'),
            ],
            "is_attending" => [
                'nullable',
                'boolean',
                Rule::in([0, 1]),
            ],
        ];
    }
}
