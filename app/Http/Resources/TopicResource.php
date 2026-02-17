<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TopicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'topicId'=>$this->id,
            'chapterId'=>$this->chapter_id,
            'topicName'=>$this->topic_name,
            'topicDescription'=>$this->topic_description,
            'createdAt'=>$this->created_at,
            'updatedAt'=>$this->updated_at

        ];
    }
}
//