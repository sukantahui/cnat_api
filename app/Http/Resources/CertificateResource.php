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
        $results = $admission->results;

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
                'photo' => $student->photo? asset('storage/' . $student->photo): asset('storage/students/default-avatar.png'),
                'email' => $this->maskEmail($student->email),
                'dateOfBirth' => $this->maskDateOfBirth($student->dob),
                'aadharNumber' => $this->maskAadhar($student->aadhar_number),
                'bloodGroup' => $student->blood_group,

                'fatherName' => $student->father_name,
                'motherName' => $student->mother_name,

                'guardianName' => $student->guardian_name,
                'guardianRelation' => $student->guardian_relation,
                'guardianPhone' => $student->guardian_phone,

                'phone1' => $this->maskPhone($student->phone1),
                'phone2' => $this->maskPhone($student->phone2),
                'whatsapp' => $this->maskPhone($student->whatsapp),

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
            'results' => $results->map(function ($result) {
                return [
                    'attemptNo'           => $result->attempt_no,
                    'theoryMarks'         => $result->theory_marks,
                    'practicalMarks'      => $result->practical_marks,
                    'totalTheoryMarks'    => $result->total_theory_marks,
                    'totalPracticalMarks' => $result->total_practical_marks,
                    'grade'               => $result->grade,
                    'isPassed'            => (bool) $result->is_passed,
                    'resultDate'          => $result->result_date,
                ];
            })->sortBy('attemptNo')->values(),
        ];
    }
    private function maskPhone(?string $phone): ?string
    {
        if (empty($phone) || strlen($phone) < 10) {
            return $phone;
        }

        return substr($phone, 0, 2) . '******' . substr($phone, -2);
    }
    private function maskEmail(?string $email): ?string
    {
        if (empty($email) || !str_contains($email, '@')) {
            return $email;
        }

        [$name, $domain] = explode('@', $email);

        if (strlen($name) <= 2) {
            return $email;
        }

        return substr($name, 0, 2)
            . str_repeat('*', strlen($name) - 2)
            . '@'
            . $domain;
    }
    private function maskAadhar(?string $aadhar): ?string
    {
        if (empty($aadhar)) {
            return null;
        }

        return preg_replace('/\d(?=\d{4})/', '*', $aadhar);
    }
    private function maskDateOfBirth(?string $dob): ?string
    {
        if (empty($dob)) {
            return null;
        }

        $year = date('Y', strtotime($dob));

        return "{$year}-XX-XX";
    }
}
