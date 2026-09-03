<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Admission;
use App\Models\SimpleFeesReceipt;

class SimpleFeesReceiptResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        // 1. Fetch matching admission for student & course
        $admission = Admission::where('student_id', $this->student_id)
            ->where('course_id', $this->course_id)
            ->first();

        // 2. Sum of all previous payments for this student and course before this receipt
        $previousPaid = (float)SimpleFeesReceipt::where('student_id', $this->student_id)
            ->where('course_id', $this->course_id)
            ->where('id', '<', $this->id)
            ->sum('amount_paid');

        $amountPaid = (float)$this->amount_paid;
        $totalPaidToDate = $previousPaid + $amountPaid;

        $isMonthly = ($this->fee_type === 'monthly');

        $monthlyRate = (float)($this->monthly_fee_amount ?? ($isMonthly ? ($admission?->course_fees ?? $this->course?->course_fees ?? 0) : 0));
        $totalCourseFee = (float)($admission?->course_fees ?? $this->course?->course_fees ?? ($isMonthly ? 0 : ($this->monthly_fee_amount ?? $amountPaid)));

        $rawAdmissionDate = $admission?->admission_date ?? $this->period_from ?? $this->payment_date;
        $admissionDateStr = $rawAdmissionDate ? date('Y-m-d', strtotime($rawAdmissionDate)) : null;

        $coveredMonths = [];
        $coveragePeriodText = null;
        $nextDueMonth = null;
        $dueAmount = 0.0;
        $monthsCount = 0;
        $balanceDue = 0.0;
        $isPaidInFull = true;

        if ($isMonthly && $monthlyRate > 0 && $rawAdmissionDate) {
            $monthsPrior = (int)floor($previousPaid / $monthlyRate);
            $monthsCount = (int)floor($amountPaid / $monthlyRate);
            $totalMonthsCovered = (int)floor($totalPaidToDate / $monthlyRate);

            $admDateTime = new \DateTime($rawAdmissionDate);
            for ($i = $monthsPrior; $i < $totalMonthsCovered; $i++) {
                $mDate = clone $admDateTime;
                $mDate->modify("+$i months");
                $coveredMonths[] = $mDate->format('F Y');
            }

            if (!empty($coveredMonths)) {
                $count = count($coveredMonths);
                if ($count === 1) {
                    $coveragePeriodText = $coveredMonths[0];
                } else {
                    $first = $coveredMonths[0];
                    $last = end($coveredMonths);
                    $fp = explode(' ', $first);
                    $lp = explode(' ', $last);
                    $coveragePeriodText = (isset($fp[1]) && isset($lp[1]) && $fp[1] === $lp[1])
                        ? $fp[0] . ' to ' . $last
                        : $first . ' to ' . $last;
                }
            }

            $nextDueDate = clone $admDateTime;
            $nextDueDate->modify("+$totalMonthsCovered months");
            $nextDueMonth = $nextDueDate->format('F Y');
            $dueAmount = $monthlyRate;
            $isPaidInFull = true;
        } else {
            // Non-monthly / Lumpsum / Course Fee Plan
            $balanceDue = max(0, $totalCourseFee - $totalPaidToDate);
            $dueAmount = $balanceDue;
            $isPaidInFull = ($balanceDue <= 0);
            if ($balanceDue > 0) {
                $coveragePeriodText = "Part Payment";
            } else {
                $coveragePeriodText = ($previousPaid > 0) ? "Final Payment" : "Paid in Full";
            }
        }

        return [
            'id' => $this->id,
            'receiptNo' => $this->receipt_no,

            // Student Info
            'studentId' => $this->student_id,
            'studentName' => $this->student?->student_name,
            'registrationNumber' => $this->student?->registration_number,
            'whatsapp' => $this->student?->whatsapp,
            'studentPhone' => $this->student?->whatsapp ?? $this->student?->phone1,

            // Course & Admission Info
            'courseId' => $this->course_id,
            'courseName' => $this->course?->course_name,
            'admissionId' => $admission?->id,
            'admissionNumber' => $admission?->admission_number,
            'admissionDate' => $admissionDateStr,

            // Fee & Ledger Info
            'feeType' => $this->fee_type,
            'isMonthly' => $isMonthly,
            'amountPaid' => $this->amount_paid,
            'monthlyFeeAmount' => $isMonthly ? $monthlyRate : 0,
            'totalCourseFee' => $totalCourseFee,
            'previousPaid' => $previousPaid,
            'totalPaidToDate' => $totalPaidToDate,
            'balanceDue' => $balanceDue,
            'isPaidInFull' => $isPaidInFull,
            'coveredMonths' => $coveredMonths,
            'coveredMonthsText' => !empty($coveredMonths) ? implode(', ', $coveredMonths) : null,
            'coveragePeriodText' => $coveragePeriodText,
            'monthsCount' => $monthsCount,
            'nextDueMonth' => $nextDueMonth,
            'dueAmount' => $dueAmount,

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

