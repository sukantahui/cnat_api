<?php

namespace App\Http\Requests;

use App\Traits\ConvertsCamelToSnake;

class StoreSimpleFeesReceiptRequest extends BaseRequest
{
    use ConvertsCamelToSnake;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',

            'fee_type' => 'required|in:monthly,non_monthly',
            'amount_paid' => 'required|numeric|min:0',

            // Monthly fields (conditionally required)
            'monthly_fee_amount' => 'nullable|numeric|min:0',
            'period_from' => 'nullable|date',
            'period_to' => 'nullable|date|after_or_equal:period_from',

            'payment_date' => 'required|date',
            'payment_mode' => 'required|string|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'student_id.required' => 'Student is required.',
            'student_id.exists' => 'Invalid student selected.',

            'course_id.required' => 'Course is required.',
            'course_id.exists' => 'Invalid course selected.',

            'fee_type.in' => 'Invalid fee type.',

            'amount_paid.required' => 'Amount is required.',
            'amount_paid.numeric' => 'Amount must be numeric.',

            'payment_date.required' => 'Payment date is required.',
            'payment_mode.required' => 'Payment mode is required.',

            'period_to.after_or_equal' => 'Period end must be after start date.',
        ];
    }

    protected function prepareForValidation(): void
    {
        // Convert camelCase → snake_case
        $this->merge(
            $this->convertCamelToSnake($this->all())
        );
    }

    /**
     * Custom validation after rules
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            if ($this->fee_type === 'monthly') {

                if (!$this->period_from || !$this->period_to) {
                    $validator->errors()->add('period', 'Period is required for monthly fees.');
                }

                if (!$this->monthly_fee_amount) {
                    $validator->errors()->add('monthly_fee_amount', 'Monthly fee amount is required.');
                }
            }
        });
    }
}