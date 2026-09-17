<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $topic = $this->topic;
        $chapter = $topic?->chapter;
        $subject = $chapter?->subject;

        return [
            'id' => $this->id,
            'questionId' => $this->id,

            'questionText' => $this->question_text,
            'questionCode' => $this->question_code,
            'questionImage' => $this->question_image,

            'questionTypeId' => $this->question_type_id,
            'questionType' => $this->questionType ? [
                'id' => $this->questionType->id,
                'questionTypeId' => $this->questionType->id,
                'questionTypeName' => $this->questionType->question_type_name,
                'defaultMarks' => $this->questionType->default_marks,
            ] : null,

            'questionLevelId' => $this->question_level_id,
            'questionLevel' => $this->questionLevel ? [
                'id' => $this->questionLevel->id,
                'questionLevelId' => $this->questionLevel->id,
                'questionLevelName' => $this->questionLevel->question_level_name,
            ] : null,

            'topicId' => $this->topic_id,
            'topic' => $topic ? [
                'id' => $topic->id,
                'topicId' => $topic->id,
                'topicName' => $topic->topic_name,
                'topicDescription' => $topic->topic_description,
            ] : null,

            'chapterId' => $chapter?->id,
            'chapter' => $chapter ? [
                'id' => $chapter->id,
                'chapterId' => $chapter->id,
                'chapterName' => $chapter->chapter_name,
            ] : null,

            'subjectId' => $subject?->id,
            'subject' => $subject ? [
                'id' => $subject->id,
                'subjectId' => $subject->id,
                'subjectCode' => $subject->subject_code,
                'subjectName' => $subject->subject_name,
            ] : null,

            'questionTags' => $this->question_tags ?? [],
            'applicableTo' => $this->applicable_to ?? [],

            'inforce' => (bool) $this->inforce,

            'options' => OptionResource::collection($this->whenLoaded('options', $this->options, $this->options)),

            'createdAt' => $this->created_at?->toISOString(),
            'updatedAt' => $this->updated_at?->toISOString(),
        ];
    }
}
