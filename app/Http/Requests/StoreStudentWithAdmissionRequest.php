<?php

namespace App\Http\Requests;

use App\Traits\ConvertsCamelToSnake;
use Illuminate\Validation\Rule;

class StoreStudentWithAdmissionRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Apply request-specific default values.
     * BaseRequest already converts camelCase to snake_case.
     */
    protected function applyDefaultValues(): void
    {
        parent::applyDefaultValues();

        $student = $this->input('student', []);

        // Default district
        if (empty($student['district_id'])) {
            $student['district_id'] = 2;
        }

        // Default gender
        if (empty($student['gender_id'])) {
            $student['gender_id'] = 1;
        }

        $this->merge([
            'student' => $student,
            'admission' => $this->input('admission', []),
        ]);
    }

    /**
     * Validation Rules.
     */
    public function rules(): array
    {
        return [

            /*
            |--------------------------------------------------------------------------
            | Student
            |--------------------------------------------------------------------------
            */

            'student' => ['required', 'array'],

            // 'student.registration_number' => [
            //     'required',
            //     'string',
            //     'max:20',
            //     'unique:students,registration_number',
            // ],

            'student.student_name' => [
                'required',
                'string',
                'max:100',
            ],

            'student.nickname' => [
                'nullable',
                'string',
                'max:100',
                'unique:students,nickname',
            ],

            'student.email' => [
                'nullable',
                'email',
                'max:150',
                'unique:students,email',
            ],

            'student.dob' => [
                'nullable',
                'date',
                'before:today',
            ],

            'student.blood_group' => [
                'nullable',
                Rule::in([
                    'A+',
                    'A-',
                    'B+',
                    'B-',
                    'AB+',
                    'AB-',
                    'O+',
                    'O-',
                ]),
            ],

            'student.father_name' => [
                'nullable',
                'string',
                'max:100',
            ],

            'student.mother_name' => [
                'nullable',
                'string',
                'max:100',
            ],

            'student.guardian_name' => [
                'nullable',
                'string',
                'max:100',
            ],

            'student.guardian_relation' => [
                'nullable',
                'string',
                'max:50',
            ],

            'student.guardian_phone' => [
                'nullable',
                'digits_between:10,15',
            ],

            'student.phone1' => [
                'nullable',
                'digits_between:10,15',
                'unique:students,phone1',
            ],

            'student.phone2' => [
                'nullable',
                'digits_between:10,15',
                'unique:students,phone2',
                'different:student.phone1',
            ],

            'student.whatsapp' => [
                'required',
                'digits:10',
                'unique:students,whatsapp',
            ],

            'student.address' => [
                'nullable',
                'string',
                'max:255',
            ],

            'student.district_id' => [
                'required',
                'exists:districts,id',
            ],

            'student.city' => [
                'nullable',
                'string',
                'max:100',
            ],

            'student.pin' => [
                'nullable',
                'digits:6',
            ],

            'student.gender_id' => [
                'required',
                'exists:genders,id',
            ],

            /*
            |--------------------------------------------------------------------------
            | Admission
            |--------------------------------------------------------------------------
            */

            'admission' => ['required', 'array'],

            // 'admission.admission_number' => [
            //     'required',
            //     'string',
            //     'max:20',
            //     'unique:admissions,admission_number',
            // ],

            'admission.course_id' => [
                'required',
                'exists:courses,id',
            ],

            'admission.course_status_id' => [
                'required',
                'exists:course_statuses,id',
            ],

            'admission.course_fees' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'admission.admission_date' => [
                'required',
                'date',
            ],

            'admission.completion_date' => [
                'nullable',
                'date',
                'after_or_equal:admission.admission_date',
            ],
        ];
    }

    /**
     * Custom Validation Messages.
     */
    public function messages(): array
    {
        return [

            // Student
            'student.registration_number.required' => 'Registration number is required.',
            'student.registration_number.unique' => 'Registration number already exists.',

            'student.student_name.required' => 'Student name is required.',

            'student.nickname.unique' => 'Nickname already exists.',

            'student.email.email' => 'Please provide a valid email.',
            'student.email.unique' => 'Email already exists.',

            'student.dob.before' => 'Date of birth must be a past date.',

            'student.whatsapp.required' => 'WhatsApp number is required.',
            'student.whatsapp.digits' => 'WhatsApp number must be exactly 10 digits.',
            'student.whatsapp.unique' => 'WhatsApp number already exists.',

            'student.phone1.unique' => 'Phone 1 already exists.',
            'student.phone2.unique' => 'Phone 2 already exists.',
            'student.phone2.different' => 'Phone 2 must be different from Phone 1.',

            'student.district_id.required' => 'District is required.',
            'student.district_id.exists' => 'Invalid district selected.',

            'student.gender_id.required' => 'Gender is required.',
            'student.gender_id.exists' => 'Invalid gender selected.',

            'student.pin.digits' => 'PIN must be exactly 6 digits.',

            // Admission
            'admission.admission_number.required' => 'Admission number is required.',
            'admission.admission_number.unique' => 'Admission number already exists.',

            'admission.course_id.required' => 'Course is required.',
            'admission.course_id.exists' => 'Selected course is invalid.',

            'admission.course_status_id.required' => 'Course status is required.',
            'admission.course_status_id.exists' => 'Selected course status is invalid.',

            'admission.admission_date.required' => 'Admission date is required.',

            'admission.completion_date.after_or_equal' => 'Completion date must be after or equal to admission date.',
        ];
    }
}