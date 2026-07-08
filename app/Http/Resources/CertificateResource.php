<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CertificateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'certificateNumber' => $this->certificate_number,
            'issueDate' => $this->issue_date,
            'isValid' => $this->is_valid,

            'student' => [
                'registrationNumber' => $this->admission->student->registration_number,
                'studentName'        => $this->admission->student->student_name,
                'fatherName'         => $this->admission->student->father_name,
                'motherName'         => $this->admission->student->mother_name,
                'gender'             => $this->admission->student->gender->gender_name,
                'dateOfBirth'        => $this->admission->student->dob,
                'bloodGroup'         => $this->admission->student->blood_group,
                'phone'              => $this->admission->student->phone1,
                'whatsapp'           => $this->admission->student->whatsapp,
                'email'              => $this->admission->student->email,
                'address'            => $this->admission->student->address,
            ],

            'course' => [
                'courseCode' => $this->admission->course->course_code,
                'courseName' => $this->admission->course->course_name,
            ],

            'admission' => [
                'admissionNumber' => $this->admission->admission_number,
                'admissionDate'   => $this->admission->admission_date,
                'completionDate'  => $this->admission->completion_date,
                'courseFees'      => $this->admission->course_fees,
                'courseStatus'    => $this->admission->courseStatus->course_status_name,
            ],

            'result' => [
                'attemptNo'           => $this->admission->result?->attempt_no,
                'theoryMarks'         => $this->admission->result?->theory_marks,
                'practicalMarks'      => $this->admission->result?->practical_marks,
                'totalTheoryMarks'    => $this->admission->result?->total_theory_marks,
                'totalPracticalMarks' => $this->admission->result?->total_practical_marks,
                'grade'               => $this->admission->result?->grade,
                'isPassed'            => $this->admission->result?->is_passed,
                'resultDate'          => $this->admission->result?->result_date,
            ],
        ];
    }
}