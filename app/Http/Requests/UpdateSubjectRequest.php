<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UpdateSubjectRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'subject_name' => [
                'required',
                'string',
                'max:100',

                Rule::unique('subjects', 'subject_name')
                    ->ignore(optional($this->route('subject'))->id),
            ],

            'subject_code' => [
                'required',
                'string',
                'max:100',

                Rule::unique('subjects', 'subject_code')
                    ->ignore(optional($this->route('subject'))->id),
            ],

            'subject_description' => [
                'nullable',
                'string',
                'max:100',
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'subject_name' => 'subject name',
            'subject_code' => 'subject code',
            'subject_description' => 'description',
            'Inforce' => 'status',
        ];
    }

    public function messages(): array
    {
        return [
            'subject_name.unique' => 'This subject name already exists.',
            'subject_code.unique' => 'This subject code already exists.',
            'Inforce.boolean' => 'Status must be active or inactive.',
        ];
    }
}
