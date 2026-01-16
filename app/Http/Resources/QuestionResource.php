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
        return [
            'questionId' => $this->id,

            'questionText' => $this->question_text,
            'questionCode' => $this->question_code,
            'questionImage' => $this->question_image,

            'questionTypeId' => $this->question_type_id,
            'topicId' => $this->topic_id,
            'questionLevelId' => $this->question_level_id,

            'questionTags' => $this->question_tags ?? [],
            'applicableTo' => $this->applicable_to ?? [],

            'inforce' => (bool) $this->inforce,

            'createdAt' => $this->created_at?->toISOString(),
            'updatedAt' => $this->updated_at?->toISOString(),
        ];
    }
}
