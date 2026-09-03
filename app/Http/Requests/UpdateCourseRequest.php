<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UpdateCourseRequest extends BaseRequest
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
        $courseId = $this->route('courseId') ?? $this->route('course');
        if (is_object($courseId)) {
            $courseId = $courseId->id;
        }

        return [
            'course_code' => [
                'sometimes',
                'required',
                'string',
                'max:20',
                Rule::unique('courses', 'course_code')->ignore($courseId),
            ],
            'course_name' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('courses', 'course_name')->ignore($courseId),
            ],
            'course_fees' => 'nullable|integer|min:0',
            'fee_modes_id' => 'nullable|integer|exists:fee_modes,id',
            'fees_valid_up_to' => 'nullable|date',
            'upcoming_fees' => 'nullable|integer|min:0',

            'topics' => 'nullable|array',
            'topics.*.topic_title' => 'required_with:topics|string|max:150',
            'topics.*.topic_description' => 'nullable|string',
            'topics.*.theory_duration' => 'nullable|numeric',
            'topics.*.practical_duration' => 'nullable|numeric',
            'topics.*.sequence' => 'nullable|integer',
        ];
    }
}
