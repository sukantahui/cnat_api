<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SimpleFeesReceiptResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'receiptNo' => $this->receipt_no,

            // Student Info
            'studentId' => $this->student_id,
            'studentName' => $this->student?->student_name,
            'registrationNumber' => $this->student?->registration_number,

            // Course Info
            'courseId' => $this->course_id,
            'courseName' => $this->course?->course_name,

            // Fee Info
            'feeType' => $this->fee_type,
            'amountPaid' => $this->amount_paid,
            'monthlyFeeAmount' => $this->monthly_fee_amount,

            // Period
            'periodFrom' => $this->period_from,
            'periodTo' => $this->period_to,

            // Payment
            'paymentDate' => $this->payment_date,
            'paymentMode' => $this->payment_mode,

            // Collector
            'collectedBy' => $this->collector?->userName,

            // Timestamps
            'createdAt' => $this->created_at,
        ];
    }
}