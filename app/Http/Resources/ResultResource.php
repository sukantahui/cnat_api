<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResultResource extends JsonResource
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

            'admissionId' => $this->admission_id,

            'theoryMarks' => $this->theory_marks,
            'practicalMarks' => $this->practical_marks,

            'totalTheoryMarks' => $this->total_theory_marks,
            'totalPracticalMarks' => $this->total_practical_marks,

            'grade' => $this->grade,

            'isPassed' => (bool) $this->is_passed,

            'resultDate' => $this->result_date,

            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
