<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChapterRequest extends BaseRequest
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
            'subject_id'=> ['required','numeric'],
            'chapter_name'=> ['required','string','max:255','unique:chapters,chapter_name']
          
        ];
    }
     public function messages(): array
    {
        return [
            'chapter_name.required' => 'Chapter name is required.',
            'chapter_name.max' => 'Chapter name may not be greater than 255 characters.',
            'chapter_name.unique' => 'Chapter name must be unique.',
            'subject_id.required' =>'subject id is required.'
           
        ];
    }
}
