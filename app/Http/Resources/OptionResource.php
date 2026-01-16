<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'questionId' => $this->question_id,

            'optionText' => $this->option_text,
            'optionCode' => $this->option_code,
            'optionImage' => $this->option_image,

            'isCorrect' => (bool) $this->is_correct,
            'inforce' => (int) $this->inforce,

            'createdAt' => $this->created_at?->toISOString(),
            'updatedAt' => $this->updated_at?->toISOString(),
        ];
    }
}
