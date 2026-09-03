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
            'admissionNumber' => $this->admission_number,

            'student' => StudentResource::make($this->whenLoaded('student')),

            'course' => CourseResource::make($this->whenLoaded('course')),

            'courseStatus' => CourseStatusResource::make(
                $this->whenLoaded('courseStatus')
            ),

            'feeModesId' => $this->fee_modes_id,
            'feeModeName' => $this->fee_modes_id == 1 ? 'Monthly' : 'Course Fee / Lumpsum',
            'courseFees' => $this->course_fees,
            'admissionDate' => $this->admission_date,
            'completionDate' => $this->completion_date,
        ];
    }
}
