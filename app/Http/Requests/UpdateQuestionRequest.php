<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UpdateQuestionRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
         = ->route('question') ? (is_object(->route('question')) ? ->route('question')->id : ->route('question')) : ->input('question_id');

        return [
            'question_text' => ['sometimes', 'required', 'string'],
            'question_code' => ['nullable', 'string'],
            'question_image' => ['nullable', 'string'],

            'question_type_id' => ['sometimes', 'required', 'integer', 'exists:question_types,id'],
            'topic_id' => ['sometimes', 'required', 'integer', 'exists:topics,id'],
            'question_level_id' => ['sometimes', 'required', 'integer', 'exists:question_levels,id'],

            'question_tags' => ['nullable', 'array'],
            'question_tags.*' => ['string'],

            'applicable_to' => ['nullable', 'array'],
            'applicable_to.*' => ['string'],

            'inforce' => ['nullable', 'boolean'],

            'options' => ['nullable', 'array'],
            'options.*.id' => ['nullable', 'integer'],
            'options.*.option_text' => ['required_with:options', 'string'],
            'options.*.option_code' => ['nullable', 'string'],
            'options.*.option_image' => ['nullable', 'string'],
            'options.*.is_correct' => ['nullable', 'boolean'],
            'options.*.inforce' => ['nullable'],
        ];
    }
}
