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
        $admission = $this->admission;
        $student = $admission->student;
        $course = $admission->course;
        $result = $admission->result;

        return [

            // Certificate
            'certificateNumber' => $this->certificate_number,
            'issueDate' => $this->issue_date,
            'isValid' => $this->is_valid,

            // Student
            'student' => [
                'registrationNumber' => $student->registration_number,
                'studentName' => $student->student_name,
                'nickName' => $student->nickname,
                'email' => $student->email,
                'dateOfBirth' => $student->dob,
                'aadharNumber'=>$student->aadhar_number,
                'bloodGroup' => $student->blood_group,

                'fatherName' => $student->father_name,
                'motherName' => $student->mother_name,

                'guardianName' => $student->guardian_name,
                'guardianRelation' => $student->guardian_relation,
                'guardianPhone' => $student->guardian_phone,

                'phone1' => $student->phone1,
                'phone2' => $student->phone2,
                'whatsapp' => $student->whatsapp,

                'address' => $student->address,
                'city' => $student->city,
                'pin' => $student->pin,

                'gender' => $student->gender?->gender_name,
            ],

            // Admission
            'admission' => [
                'admissionNumber' => $admission->admission_number,
                'admissionDate' => $admission->admission_date,
                'completionDate' => $admission->completion_date,
                'courseFees' => $admission->course_fees,
                'courseStatus' => $admission->courseStatus?->course_status_name,
            ],

            // Course
            'course' => [
                'courseCode' => $course->course_code,
                'courseName' => $course->course_name,

                'courseDetails' => $course->details->map(function ($detail) {
                    return [
                        'id' => $detail->id,
                        'topicTitle' => $detail->topic_title,
                        'topicDescription' => $detail->topic_description,
                        'theoryDuration' => $detail->theory_duration,
                        'practicalDuration' => $detail->practical_duration,
                        'sequence' => $detail->sequence,
                    ];
                })->values(),
            ],

            // Result
            'result' => $result ? [
                'attemptNo' => $result->attempt_no,
                'theoryMarks' => $result->theory_marks,
                'practicalMarks' => $result->practical_marks,
                'totalTheoryMarks' => $result->total_theory_marks,
                'totalPracticalMarks' => $result->total_practical_marks,
                'grade' => $result->grade,
                'isPassed' => $result->is_passed,
                'resultDate' => $result->result_date,
            ] : null,
        ];
    }
}