<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UpdateChapterRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'subject_id' => [
                'required',
                'integer',
                Rule::exists('subjects', 'id'),
            ],

            'chapter_name' => [
                'required',
                'string',
                'max:100',

                Rule::unique('chapters', 'chapter_name')
                    ->where(fn ($query) =>
                        $query->where('subject_id', $this->subject_id)
                    )
                    ->ignore(optional($this->route('chapter'))->id),
            ],
        ];
    }
}
