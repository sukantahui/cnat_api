<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
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
        $student = $this->route('student');

        return [
            'registration_number' => [
                'required',
                'string',
                'max:20',
                Rule::unique('students')->ignore($student),
            ],
            'student_name' => 'required|string|max:100',

            'nickname' => [
                'required',
                'string',
                'max:100',
                Rule::unique('students')->ignore($student),
            ],

            'email' => [
                'required',
                'email',
                'max:150',
                Rule::unique('students')->ignore($student),
            ],

            'dob' => 'required|date',
            'blood_group' => 'required|string|max:3',

            'father_name' => 'nullable|string|max:100',
            'mother_name' => 'nullable|string|max:100',

            'guardian_name' => 'nullable|string|max:100',
            'guardian_relation' => 'nullable|string|max:50',
            'guardian_phone' => 'nullable|string|max:11',

            'phone1' => [
                'nullable',
                'string',
                'max:11',
                Rule::unique('students')->ignore($student),
            ],

            'phone2' => [
                'nullable',
                'string',
                'max:11',
                Rule::unique('students')->ignore($student),
            ],

            'whatsapp' => [
                'nullable',
                'string',
                'max:10',
                Rule::unique('students')->ignore($student),
            ],

            'address' => 'nullable|string|max:100',
            'district_id' => 'required|exists:districts,id',
            'city' => 'nullable|string|max:100',
            'pin' => 'nullable|string|max:6',
            'gender_id' => 'required|exists:genders,id',
        ];
    }
}
