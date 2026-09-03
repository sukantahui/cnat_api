<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Traits\ConvertsCamelToSnake;

class StoreSimpleFeesReceiptRequest extends BaseRequest
{
    /**
     * Authorize request
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Validation rules
     */
    public function rules(): array
    {
        return [
            'receipt_no' => 'bail|nullable|string|max:255|unique:simple_fees_receipts,receipt_no',

            'student_id' => 'bail|required|exists:students,id',
            'course_id' => 'bail|required|exists:courses,id',

            'fee_type' => 'bail|required|in:monthly,non_monthly',
            'amount_paid' => 'bail|required|numeric|min:1',

            'monthly_fee_amount' => 'bail|nullable|numeric|min:1|required_if:fee_type,monthly',

            'period_from' => 'bail|nullable|date|required_if:fee_type,monthly',
            'period_to' => 'bail|nullable|date|after_or_equal:period_from|required_if:fee_type,monthly',

            'payment_date' => 'bail|required|date|before_or_equal:today',
            'payment_mode' => 'bail|required',

            'collected_by' => 'bail|nullable|exists:users,id',
        ];
    }

    /**
     * Custom messages (optional but useful)
     */
    public function messages(): array
    {
        return [
            'receipt_no.unique' => 'Receipt number already exists.',

            'student_id.exists' => 'Selected student is invalid.',
            'course_id.exists' => 'Selected course is invalid.',

            'fee_type.in' => 'Fee type must be monthly or non_monthly.',

            'period_from.required_if' => 'Period from is required for monthly fees.',
            'period_to.required_if' => 'Period to is required for monthly fees.',
            'period_to.after_or_equal' => 'Period to must be after or equal to period from.',

            'collected_by.exists' => 'Collector user is invalid.',
        ];
    }

    protected function prepareForValidation(): void
    {
        $data = $this->convertCamelToSnake($this->all());

        $data['collected_by'] = Auth::id() ?? 1;

        // 1. Auto-generate sequential receipt_no if empty
        $yearStart = now()->year % 100;
        $yearEnd = ($yearStart + 1) % 100;
        $academicYear = sprintf('%02d%02d', $yearStart, $yearEnd);
        $prefix = 'REC';

        if (empty($data['receipt_no'])) {
            $last = \App\Models\SimpleFeesReceipt::where('receipt_no', 'like', "$prefix-%-$academicYear")
                ->latest('id')
                ->first();

            if ($last) {
                $parts = explode('-', $last->receipt_no);
                $lastNumber = isset($parts[1]) ? intval($parts[1]) : 10000;
                $nextNumber = $lastNumber + 1;
            } else {
                $nextNumber = 10001;
            }
            $data['receipt_no'] = "{$prefix}-{$nextNumber}-{$academicYear}";
        }

        // 2. Handle non-monthly cleanup
        if (($data['fee_type'] ?? null) === 'non_monthly') {
            $data['monthly_fee_amount'] = null;
            $data['period_from'] = null;
            $data['period_to'] = null;
        }

        // 3. Auto-calculate period_from & period_to for monthly fees if omitted
        if (($data['fee_type'] ?? null) === 'monthly' && !empty($data['student_id']) && !empty($data['course_id'])) {
            $admission = \App\Models\Admission::where('student_id', $data['student_id'])
                ->where('course_id', $data['course_id'])
                ->first();

            if (empty($data['monthly_fee_amount'])) {
                $data['monthly_fee_amount'] = (float)($admission?->course_fees ?? 600);
            }

            if (empty($data['period_from']) || empty($data['period_to'])) {
                $monthlyRate = (float)($data['monthly_fee_amount'] ?? 600);
                $previousPaid = (float)\App\Models\SimpleFeesReceipt::where('student_id', $data['student_id'])
                    ->where('course_id', $data['course_id'])
                    ->sum('amount_paid');
                $amountPaid = (float)($data['amount_paid'] ?? $monthlyRate);

                $admDateRaw = $admission?->admission_date ?? now()->toDateString();
                $admDate = new \DateTime($admDateRaw);

                $monthsPrior = $monthlyRate > 0 ? (int)floor($previousPaid / $monthlyRate) : 0;
                $monthsPaid = $monthlyRate > 0 ? max(1, (int)floor($amountPaid / $monthlyRate)) : 1;

                $fromDt = (clone $admDate)->modify("+{$monthsPrior} months");
                $toDt = (clone $fromDt)->modify("+{$monthsPaid} months")->modify("-1 day");

                $data['period_from'] = $fromDt->format('Y-m-d');
                $data['period_to'] = $toDt->format('Y-m-d');
            }
        }

        $this->merge($data);
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->fee_type === 'monthly') {
                if ($this->amount_paid < $this->monthly_fee_amount) {
                    $validator->errors()->add(
                        'amount_paid',
                        'Amount paid cannot be less than monthly fee.'
                    );
                }

                if ($this->period_from && $this->period_to) {
                    if ($this->period_from > $this->period_to) {
                        $validator->errors()->add(
                            'period_to',
                            'Invalid period range.'
                        );
                    }
                }
            }
        });
    }
}
