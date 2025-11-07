<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdmissionResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'admissionId' => $this->id,
            'student' => new StudentResource($this->whenLoaded('student')),
            'course' => new CourseResource($this->whenLoaded('course')),
            'courseStatus' => new CourseStatusResource($this->whenLoaded('courseStatus')),
            'courseFees' => $this->course_fees,
            'admissionDate' => $this->admission_date,
            'completionDate' => $this->completion_date,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
