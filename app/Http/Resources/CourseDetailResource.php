<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseDetailResource extends BaseResource
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
            'topicTitle' => $this->topic_title,
            'topicDescription' => $this->topic_description,
            'theoryDuration' => $this->theory_duration,
            'practicalDuration' => $this->practical_duration,
            'sequence' => $this->sequence,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
