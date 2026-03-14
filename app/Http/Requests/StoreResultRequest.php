<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResultRequest extends BaseRequest
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
            'admission_id' => [
                'required',
                'integer',
                'exists:admissions,id'
            ],

            'theory_marks' => [
                'nullable',
                'numeric',
                'min:0'
            ],

            'practical_marks' => [
                'nullable',
                'numeric',
                'min:0'
            ],

            'total_theory_marks' => [
                'nullable',
                'numeric',
                'min:0'
            ],

            'total_practical_marks' => [
                'nullable',
                'numeric',
                'min:0'
            ],

            'grade' => [
                'nullable',
                'string',
                'max:10'
            ],

            'is_passed' => [
                'boolean'
            ],

            'result_date' => [
                'nullable',
                'date'
            ],
        ];
    }
}
