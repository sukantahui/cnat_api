<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'studentId' => $this->id,
            'registrationNumber' => $this->registration_number,
            'studentName' => $this->student_name,
            'nickname' => $this->nickname,
            'email' => $this->email,
            'dob' => $this->dob,
            'bloodGroup' => $this->blood_group,
            'fatherName' => $this->father_name,
            'motherName' => $this->mother_name,
            'guardianName' => $this->guardian_name,
            'guardianRelation' => $this->guardian_relation,
            'guardianPhone' => $this->guardian_phone,
            'phone1' => $this->phone1,
            'phone2' => $this->phone2,
            'whatsapp' => $this->whatsapp,
            'address' => $this->address,
            'district' => new DistrictResource($this->whenLoaded('district')),
            'city' => $this->city,
            'pin' => $this->pin,
            'gender' => new GenderResource($this->whenLoaded('gender')),
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
