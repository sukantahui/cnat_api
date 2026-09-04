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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'key' => 'nullable|string|max:255',
            'per_page' => 'nullable|integer|min:1|max:100',
            'year' => 'nullable|integer|min:2025|max:2040',
            'mobile' => 'nullable|string|max:20',
            'name' => 'nullable|string|max:255',
        ];
    }
    public function messages(): array
    {
        return [
            'key.required' => 'Please enter a key to search.',
            'key.max' => 'The search key may not be greater than 255 characters.',
            'per_page.integer' => 'The per_page value must be an integer.',
            'per_page.max' => 'The maximum allowed per_page value is 100.',
        ];
    }
    protected function prepareForValidation(): void
    {
        $this->merge([
            'key' => trim($this->key ?? ''),
        ]);
    }
}
