<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Models\Chapter;

class UpdateChapterRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        parent::prepareForValidation();

        // Alias 'name' to 'chapter_name' if provided
        if ($this->has('name') && !$this->has('chapter_name')) {
            $this->merge([
                'chapter_name' => $this->input('name'),
            ]);
        }
    }

    public function rules(): array
    {
        $chapter = $this->route('chapter');
        $chapterId = $chapter instanceof Chapter ? $chapter->id : $chapter;
        $existingSubjectId = $chapter instanceof Chapter ? $chapter->subject_id : (is_numeric($chapterId) ? Chapter::find($chapterId)?->subject_id : null);
        $subjectId = $this->input('subject_id', $existingSubjectId);

        return [
            'subject_id' => [
                'sometimes',
                'required',
                'integer',
                Rule::exists('subjects', 'id'),
            ],

            'chapter_name' => [
                'sometimes',
                'required',
                'string',
                'max:100',
                Rule::unique('chapters', 'chapter_name')
                    ->where(fn ($query) =>
                        $subjectId ? $query->where('subject_id', $subjectId) : $query
                    )
                    ->ignore($chapterId),
            ],
        ];
    }
}
