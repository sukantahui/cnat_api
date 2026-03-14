<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * --------------------------------------------------------------------------
 * Result Model
 * --------------------------------------------------------------------------
 *
 * This model represents the exam result for a student's admission.
 *
 * Features:
 * - Automatic attempt number generation
 * - Automatic percentage calculation
 * - Automatic grade assignment
 * - Automatic pass/fail detection
 * - Query scope for latest attempt
 *
 * System: Coder & AccoTax Training Management System
 * Author: Sukanta Hui
 *
 */

class Result extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * -------------------------------------------------------------
     * Automatically assign attempt number
     * -------------------------------------------------------------
     */
    protected static function booted()
    {
        static::creating(function ($result) {

            $maxAttempt = self::where('admission_id', $result->admission_id)
                ->max('attempt_no');

            $result->attempt_no = $maxAttempt ? $maxAttempt + 1 : 1;

            /**
             * Automatically calculate grade and pass status
             */
            $percentage = $result->percentage();

            if ($percentage !== null) {

                $result->grade = self::calculateGrade($percentage);

                $result->is_passed = $percentage >= 40;
            }
        });
    }

    /**
     * -------------------------------------------------------------
     * Relationship: Result belongs to Admission
     * -------------------------------------------------------------
     */
    public function admission()
    {
        return $this->belongsTo(Admission::class);
    }

    /**
     * -------------------------------------------------------------
     * Relationship: Result has one Certificate
     * -------------------------------------------------------------
     */
    public function certificate()
    {
        return $this->hasOne(Certificate::class);
    }

    /**
     * -------------------------------------------------------------
     * Calculate Percentage
     * -------------------------------------------------------------
     *
     * Uses theory + practical marks
     */
    public function percentage()
    {
        if (
            $this->total_theory_marks &&
            $this->total_practical_marks &&
            $this->theory_marks !== null &&
            $this->practical_marks !== null
        ) {

            $totalObtained = $this->theory_marks + $this->practical_marks;

            $totalMarks = $this->total_theory_marks + $this->total_practical_marks;

            return ($totalObtained / $totalMarks) * 100;
        }

        return null;
    }

    /**
     * -------------------------------------------------------------
     * Grade Calculation
     * -------------------------------------------------------------
     */
    public static function calculateGrade($percentage)
    {
        return match (true) {

            $percentage >= 90 => 'A+',
            $percentage >= 80 => 'A',
            $percentage >= 70 => 'B+',
            $percentage >= 60 => 'B',
            $percentage >= 50 => 'C',
            $percentage >= 40 => 'D',
            default => 'F'
        };
    }

    /**
     * -------------------------------------------------------------
     * Scope: Latest Attempt
     * -------------------------------------------------------------
     *
     * Example:
     * Result::latestAttempt()->get();
     */
    public function scopeLatestAttempt($query)
    {
        return $query->orderByDesc('attempt_no');
    }

    /**
     * -------------------------------------------------------------
     * Get Latest Result for an Admission
     * -------------------------------------------------------------
     *
     * Example:
     * Result::latestForAdmission(5)->first();
     */
    public function scopeLatestForAdmission($query, $admissionId)
    {
        return $query->where('admission_id', $admissionId)
            ->orderByDesc('attempt_no');
    }
}
