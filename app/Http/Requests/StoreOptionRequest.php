<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOptionRequest extends BaseRequest
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
            'question_id' => ['required', 'exists:questions,id'],
            'option_text' => ['required', 'string','unique:options,option_text'],
            'option_code' => ['nullable', 'string'],
            'option_image' => ['nullable', 'string'],
            'inforce' => ['nullable', 'boolean']
        ];
    }

    public function messages(): array
    {
        return [
            'option_text.required' => 'Option text is required.',
            'option_code.unique' => 'Option code must be unique.',
        ];
    }
}
