<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ConvertsCamelToSnake;
class StoreStudentRequest extends FormRequest
{
    use ConvertsCamelToSnake;
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
            'registration_number' => 'required|string|max:20|unique:students,registration_number',
            'student_name'        => 'required|string|max:100',
            'nickname'            => 'required|string|max:100|unique:students,nickname',
            'email'               => 'required|email|max:150|unique:students,email',
            'dob'                 => 'required|date|before:today',
            'blood_group'         => 'required|string|max:3',
            'father_name'         => 'nullable|string|max:100',
            'mother_name'         => 'nullable|string|max:100',
            'guardian_name'       => 'nullable|string|max:100',
            'guardian_relation'   => 'nullable|string|max:50',
            'guardian_phone'      => 'nullable|digits_between:10,11',

            // ✅ Ensure uniqueness and difference
            'phone1' => [
                'nullable',
                'digits_between:10,11',
                'unique:students,phone1',
                'different:phone2'
            ],
            'phone2' => [
                'nullable',
                'digits_between:10,11',
                'unique:students,phone2',
                'different:phone1'
            ],

            'whatsapp'    => 'nullable|digits:10|unique:students,whatsapp',
            'address'     => 'nullable|string|max:100',
            'district_id' => 'required|exists:districts,id',
            'city'        => 'nullable|string|max:100',
            'pin'         => 'nullable|digits:6',
            'gender_id'   => 'required|exists:genders,id',
        ];

        
    }
    public function messages(): array
    {
        return [
            'registration_number.required' => 'Registration number is required.',
            'registration_number.unique'   => 'This registration number already exists.',
            'nickname.unique'              => 'This nickname is already taken.',
            'email.unique'                 => 'This email is already registered.',
            'dob.before'                   => 'Date of birth must be a past date.',
            'district_id.exists'           => 'Invalid district selected.',
            'gender_id.exists'             => 'Invalid gender selected.',
            'whatsapp.digits'              => 'WhatsApp number must be exactly 10 digits.',
            'pin.digits'                   => 'PIN code must be exactly 6 digits.',
        ];
    }

    protected function prepareForValidation(): void
    {
        // Convert camelCase to snake_case before validation
        $this->merge(
            $this->convertCamelToSnake($this->all())
        );

        // Ensure inforce has a default value if not set
        if (!$this->has('inforce')) {
            $this->merge(['inforce' => true]);
        }
    }
}
