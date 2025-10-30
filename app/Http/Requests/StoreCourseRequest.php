<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'course_code' => 'required|string|max:10|unique:courses,course_code',
            'course_name' => 'required|string|max:255|unique:courses,course_name',
        ];
    }
    public function messages(): array
    {
        return [
            'course_code.required' => 'The course code is required.',
            'course_code.string'   => 'The course code must be a valid string.',
            'course_code.max'      => 'The course code may not be greater than 10 characters.',
            'course_code.unique'   => 'This course code already exists.',

            'course_name.required' => 'The course name is required.',
            'course_name.string'   => 'The course name must be a valid string.',
            'course_name.max'      => 'The course name may not be greater than 255 characters.',
            'course_name.unique'   => 'This course name already exists.',
        ];
    }
}
