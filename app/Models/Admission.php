<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    /** @use HasFactory<\Database\Factories\AdmissionFactory> */
    use HasFactory;
    protected $guarded = ['id'];
    protected static function booted()
    {
        static::creating(function ($admission) {

            $yearStart = now()->year % 100;
            $yearEnd = ($yearStart + 1) % 100;

            $academicYear = sprintf('%02d%02d', $yearStart, $yearEnd);

            $last = self::where('admission_number', 'like', "REGN-%-$academicYear")
                ->latest('id')
                ->first();

            if ($last) {

                $lastNumber = intval(explode('-', $last->admission_number)[1]);
                $nextNumber = $lastNumber + 1;

            } else {

                $nextNumber = 10001;
            }

            $admission->admission_number =
                'CNATA-' . $nextNumber . '-' . $academicYear;
        });
    }



    /** 🔗 Relations **/
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function courseStatus()
    {
        return $this->belongsTo(CourseStatus::class);
    }

    public function result()
    {
        return $this->hasOne(Result::class);
    }

    // ✅ New relation to access course details directly through course
    public function courseDetails()
    {
        return $this->hasManyThrough(
            CourseDetail::class, // Final model
            Course::class,       // Intermediate model
            'id',                // Foreign key on courses table
            'course_id',         // Foreign key on course_details table
            'course_id',         // Local key on admissions table
            'id'                 // Local key on courses table
        );
    }
}
