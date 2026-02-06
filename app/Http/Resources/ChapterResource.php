<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChapterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'chapterId'=>$this->id,
            'subjectId'=>$this->subject_id,
            'chapterName'=>$this->chapter_name,
            'inforce'=>$this->Inforce,
            'createdAt'=>$this->created_at,
            'updatedAt'=>$this->updated_at

        ];
    }
}
