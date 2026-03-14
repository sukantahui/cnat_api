<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends BaseRequest
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
            'course_code' => 'required|string|max:10|unique:courses,course_code',
            'course_name' => 'required|string|max:255|unique:courses,course_name',

            'topics' => 'required|array|min:1',

            'topics.*.topic_title' => 'required|string|max:150',
            'topics.*.topic_description' => 'nullable|string',

            'topics.*.theory_duration' => 'nullable|numeric',
            'topics.*.practical_duration' => 'nullable|numeric',

            'topics.*.sequence' => 'nullable|integer'
        ];
    }
    
}
