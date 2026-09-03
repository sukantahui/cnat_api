<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\UserTypeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'userName'    => $this->email,
            'name'        => $this->student?->student_name ?? $this->employee?->employee_name ?? $this->email,
            'email'       => $this->student?->email ?? $this->employee?->email ?? $this->email,
            'role'        => $this->role_name,
            'mobile'      => $this->student?->whatsapp ?? $this->student?->phone1 ?? $this->employee?->mobile,
            'department'  => $this->employee?->department?->department_name ?? ($this->student ? 'Academics' : 'General'),
            'designation' => $this->employee?->designation?->designation_name ?? ($this->student ? 'Student' : 'Staff'),
            'studentId'   => $this->student_id,
            'employeeId'  => $this->employee_id,
        ];
    }
}
