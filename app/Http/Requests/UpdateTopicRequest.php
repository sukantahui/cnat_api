<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UpdateTopicRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'chapter_id' => [
                'required',
                'integer',
                Rule::exists('chapters', 'id'),
            ],

            'topic_name' => [
                'required',
                'string',
                'max:100',

                Rule::unique('topics', 'topic_name')
                    ->where(fn ($query) =>
                        $query->where('chapter_id', $this->chapter_id)
                    )
                    ->ignore(optional($this->route('topic'))->id),
            ],
        ];
    }
}
