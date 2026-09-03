<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
         return [
            'id'                  => $this->id,
            'studentId'           => $this->id,
            'student_id'          => $this->id,
            'registration_number' => $this->registration_number,
            'registrationNumber'  => $this->registration_number,
            'student_name'        => $this->student_name,
            'studentName'         => $this->student_name,
            'nickname'            => $this->nickname,
            'photo'               => $this->photo,
            'email'               => $this->email,
            'dob'                 => $this->dob,
            'blood_group'         => $this->blood_group,
            'bloodGroup'          => $this->blood_group,
            'father_name'         => $this->father_name,
            'fatherName'          => $this->father_name,
            'mother_name'         => $this->mother_name,
            'motherName'          => $this->mother_name,
            'guardian_name'       => $this->guardian_name,
            'guardianName'        => $this->guardian_name,
            'guardian_relation'   => $this->guardian_relation,
            'guardianRelation'    => $this->guardian_relation,
            'guardian_phone'      => $this->guardian_phone,
            'guardianPhone'       => $this->guardian_phone,
            'phone1'              => $this->phone1,
            'phone2'              => $this->phone2,
            'whatsapp'            => $this->whatsapp,
            'address'             => $this->address,
            'district_id'         => $this->district_id,
            'districtId'          => $this->district_id,
            'city'                => $this->city,
            'pin'                 => $this->pin,
            'gender_id'           => $this->gender_id,
            'genderId'            => $this->gender_id,
            'created_at'          => $this->created_at,
            'updated_at'          => $this->updated_at,
        ];
    }
}
