<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CourseDetailResource;

class CourseResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function raw(Request $request): array
    {
        return [
            'id' => $this->id,
            'courseCode' => $this->course_code,
            'courseName' => $this->course_name,
            'courseFees' => (int) ($this->course_fees ?? 0),
            'course_fees' => (int) ($this->course_fees ?? 0),
            'feesValidUpTo' => $this->fees_valid_up_to,
            'fees_valid_up_to' => $this->fees_valid_up_to,
            'upcomingFees' => $this->upcoming_fees ? (int) $this->upcoming_fees : null,
            'upcoming_fees' => $this->upcoming_fees ? (int) $this->upcoming_fees : null,
            'feeModesId' => (int) ($this->fee_modes_id ?? 1),
            'fee_modes_id' => (int) ($this->fee_modes_id ?? 1),
            'feeMode' => $this->feeMode ? $this->feeMode->fee_modes_name : ($this->fee_modes_id == 2 ? 'Course Fees' : 'Monthly'),
            'fee_mode' => $this->feeMode ? $this->feeMode->fee_modes_name : ($this->fee_modes_id == 2 ? 'Course Fees' : 'Monthly'),
            'details' => CourseDetailResource::collection($this->whenLoaded('details')),
        ];
    }
}
