<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Models\Topic;

class UpdateTopicRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        parent::prepareForValidation();

        // Alias 'name' to 'topic_name' if provided
        if ($this->has('name') && !$this->has('topic_name')) {
            $this->merge([
                'topic_name' => $this->input('name'),
            ]);
        }
    }

    public function rules(): array
    {
        $topic = $this->route('topic');
        $topicId = $topic instanceof Topic ? $topic->id : $topic;
        $existingChapterId = $topic instanceof Topic ? $topic->chapter_id : (is_numeric($topicId) ? Topic::find($topicId)?->chapter_id : null);
        $chapterId = $this->input('chapter_id', $existingChapterId);

        return [
            'chapter_id' => [
                'sometimes',
                'required',
                'integer',
                Rule::exists('chapters', 'id'),
            ],

            'topic_name' => [
                'sometimes',
                'required',
                'string',
                'max:100',

                Rule::unique('topics', 'topic_name')
                    ->where(fn ($query) =>
                        $chapterId ? $query->where('chapter_id', $chapterId) : $query
                    )
                    ->ignore($topicId),
            ],
        ];
    }
}
