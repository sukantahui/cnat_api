<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends BaseRequest
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
            'question_text' => ['required', 'string'],
            'question_code' => ['nullable', 'string'],
            'question_image' => ['nullable', 'string'],

            'question_type_id' => ['required', 'integer', 'exists:question_types,id'],
            'topic_id' => ['required', 'integer', 'exists:topics,id'],
            'question_level_id' => ['required', 'integer', 'exists:question_levels,id'],

            'question_tags' => ['nullable', 'array'],
            'question_tags.*' => ['string'],

            'applicable_to' => ['nullable', 'array'],
            'applicable_to.*' => ['string'],

            'inforce' => ['nullable', 'boolean']
        ];
    }
    public function messages(): array
    {
        return [
            'question_text.required' => 'Question text is required.',
            'question_type_id.exists' => 'Invalid question type.',
            'topic_id.exists' => 'Invalid topic.',
            'question_level_id.exists' => 'Invalid question level.',
        ];
    }
}
