<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseStatusResource extends BaseResource
{
    public function toArray(Request $request): array
    {
        return [
            'courseStatusId' => $this->id,
            'courseStatusName' => $this->course_status_name,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
