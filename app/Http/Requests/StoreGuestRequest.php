<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuestRequest extends FormRequest
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
            'guest_name' => 'required|string|max:200',
            'mobile' => 'required|string|max:20|unique:guests,mobile',
            'wp_number' => 'nullable|string|max:20|unique:guests,wp_number',
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:guests,email',
            'gender_id' => 'required|exists:genders,id',
            'food_preference_id' => 'required|exists:food_preferences,id',
        ];
    }
}
