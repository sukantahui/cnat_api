<?php

namespace App\Http\Requests;

use App\Traits\ConvertsCamelToSnake;
use Illuminate\Support\Facades\DB;
class StoreAdmissionRequest extends BaseRequest
{
    use ConvertsCamelToSnake;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check(); // Ensure the user is authenticated
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
         return [
            'student_id' => [
                'bail', 'required', 'integer', 'exists:students,id'
            ],
            'course_id' => [
            'bail', 'required', 'integer', 'exists:courses,id',
            function ($attribute, $value, $fail) {
                $exists = DB::table('admissions')
                    ->where('student_id', $this->student_id)
                    ->where('course_id', $value)
                    ->where('course_status_id', 1) // 1 = Ongoing
                    ->exists();

                if ($exists) {
                    $fail('This student already has an ongoing admission for the selected course.');
                }
            },
        ],
            'course_status_id' => [
                'bail', 'required', 'integer', 'exists:course_statuses,id'
            ],
            'fee_modes_id' => [
                'bail', 'required', 'integer', 'exists:fee_modes,id'
            ],
            'course_fees' => [
                'bail', 'required', 'integer', 'min:0'
            ],
            'admission_date' => [
                'bail', 'required', 'date_format:Y-m-d'
            ],
            'completion_date' => [
                'nullable', 'date_format:Y-m-d', 'after_or_equal:admission_date'
            ],
            'initial_fee' => ['nullable', 'array'],
            'initial_fee.amount_paid' => ['nullable', 'numeric', 'min:0'],
            'initial_fee.payment_date' => ['nullable', 'date'],
            'initial_fee.payment_mode' => ['nullable', 'string', 'max:50'],
            'initial_fee.receipt_no' => ['nullable', 'string', 'max:255'],
            'initial_fee.remarks' => ['nullable', 'string', 'max:255'],
        ];
    }


    public function attributes(): array
    {
        return [
            'student_id'       => 'student',
            'course_id'        => 'course',
            'course_status_id' => 'course status',
            'course_fees'      => 'course fee',
            'admission_date'   => 'admission date',
            'completion_date'  => 'completion date',
        ];
    }

    /**
     * Custom error messages for better user feedback.
     */
    public function messages(): array
    {
        return [
            '*.required' => 'The :attribute field is required.',
            '*.exists' => 'The selected :attribute is invalid.',
            '*.integer' => 'The :attribute must be a valid number.',
            '*.date_format' => 'The :attribute must be in YYYY-MM-DD format.',
            'course_fees.min' => 'Course fee cannot be negative.',
            'completion_date.after_or_equal' => 'Completion date cannot be before admission date.'
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge(
            $this->convertCamelToSnake($this->all())
        );

        if (!$this->has('fee_modes_id') || empty($this->fee_modes_id)) {
            $this->merge(['fee_modes_id' => 1]);
        }
        if (!$this->has('course_status_id') || empty($this->course_status_id)) {
            $this->merge(['course_status_id' => 1]);
        }
        if (!$this->has('admission_date') || empty($this->admission_date)) {
            $this->merge(['admission_date' => date('Y-m-d')]);
        }
    }
}
