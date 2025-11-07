<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Student;
use App\Models\Course;
use App\Models\CourseStatus;

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
            'student' => $this->whenLoaded('student')
                        ? new StudentResource($this->student)
                        : new StudentResource(Student::find($this->student_id)), // return empty resource if not loaded
            'course' => $this->whenLoaded('course')
                        ? new CourseResource($this->course)
                        : new CourseResource(Course::find($this->course_id)),
            'courseStatus' => $this->whenLoaded('courseStatus')
                        ? new CourseStatusResource($this->courseStatus)
                        : new CourseStatusResource(CourseStatus::find($this->course_status_id)),
            'courseFees' => $this->course_fees,
            'admissionDate' => $this->admission_date,
            'completionDate' => $this->completion_date,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
