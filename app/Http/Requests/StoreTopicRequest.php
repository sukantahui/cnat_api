<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTopicRequest extends BaseRequest
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
            'chapter_id'=> ['required','numeric'],
            'topic_name'=> ['required','string','max:255','unique:topics,topic_name']
        ];
    }
    public function messages(): array
    {
        return [
            'topic_name.required' => 'Topic name is required.',
            'topic_name.max' => 'Topic name may not be greater than 255 characters.',
            'topic_name.unique' => 'Topic name must be unique.',
            'chapter_id.required' =>'Chapter id is required.'
           
        ];
    }
}
