<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimpleFeesReceipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'receipt_no',
        'student_id',
        'course_id',
        'fee_type',
        'amount_paid',
        'monthly_fee_amount',
        'period_from',
        'period_to',
        'payment_date',
        'payment_mode',
        'collected_by',
    ];

    protected $casts = [
        'payment_date' => 'date',
        'period_from' => 'date',
        'period_to' => 'date',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function collector()
    {
        return $this->belongsTo(User::class, 'collected_by');
    }
}