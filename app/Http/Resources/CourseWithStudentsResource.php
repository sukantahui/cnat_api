<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseWithStudentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'courseId' => $this->id,
            'courseCode' => $this->course_code,
            'courseName' => $this->course_name,

            'students' => StudentResource::collection(
                $this->whenLoaded('students')
            ),
        ];
    }
}
