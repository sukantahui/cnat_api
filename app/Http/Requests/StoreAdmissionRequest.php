<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdmissionRequest extends FormRequest
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
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'course_status_id' => 'required|exists:course_statuses,id',
            'course_fees' => 'required|integer|min:0',
            'admission_date' => 'required|date',
            'completion_date' => 'nullable|date|after_or_equal:admission_date',
            'status' => 'required|in:0,1',
        ];
    }
}
