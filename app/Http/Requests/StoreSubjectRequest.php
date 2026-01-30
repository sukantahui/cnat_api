<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubjectRequest extends FormRequest
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
            'subject_name' => ['required', 'string', 'max:255', 'unique:subjects,subject_name'],
            'subject_code' => ['required', 'string', 'max:100', 'unique:subjects,subject_code'],
            'description' => ['nullable', 'string']
        ];
    }
    public function messages(): array
    {
        return [
            'subject_name.required' => 'Subject name is required.',
            'subject_name.max' => 'Subject name may not be greater than 255 characters.',
            'subject_code.max' => 'Subject code may not be greater than 100 characters.',
            'subject_name.unique' => 'Subject name must be unique.',
            'subject_code.unique' => 'Subject code must be unique.'
        ];
    }
}
