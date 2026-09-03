<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UpdateStudentRequest extends BaseRequest
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
        if (is_object($student)) {
            $studentId = $student->id;
        } else {
            $studentId = $student;
        }

        return [
            'registration_number' => [
                'sometimes',
                'required',
                'string',
                'max:20',
                Rule::unique('students', 'registration_number')->ignore($studentId),
            ],
            'student_name' => 'sometimes|required|string|max:100',

            'nickname' => [
                'nullable',
                'string',
                'max:100',
                Rule::unique('students', 'nickname')->ignore($studentId),
            ],

            'email' => [
                'nullable',
                'email',
                'max:150',
                Rule::unique('students', 'email')->ignore($studentId),
            ],

            'dob' => 'nullable|date',
            'blood_group' => 'nullable|string|max:5',

            'father_name' => 'nullable|string|max:100',
            'mother_name' => 'nullable|string|max:100',

            'guardian_name' => 'nullable|string|max:100',
            'guardian_relation' => 'nullable|string|max:50',
            'guardian_phone' => 'nullable|string|max:15',

            'phone1' => [
                'nullable',
                'string',
                'max:15',
                Rule::unique('students', 'phone1')->ignore($studentId),
            ],

            'phone2' => [
                'nullable',
                'string',
                'max:15',
                Rule::unique('students', 'phone2')->ignore($studentId),
            ],

            'whatsapp' => [
                'sometimes',
                'required',
                'digits:10',
                            ],

            'address' => 'nullable|string|max:255',
            'district_id' => 'nullable|exists:districts,id',
            'city' => 'nullable|string|max:100',
            'pin' => 'nullable|string|max:10',
            'gender_id' => 'nullable|exists:genders,id',
        ];
    }
}

