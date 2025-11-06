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
            'course_fees' => [
                'bail', 'required', 'integer', 'min:0'
            ],
            'admission_date' => [
                'bail', 'required', 'date_format:Y-m-d'
            ],
            'completion_date' => [
                'nullable', 'date_format:Y-m-d', 'after_or_equal:admission_date'
            ],
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

    

}
