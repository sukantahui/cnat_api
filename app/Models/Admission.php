<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    /** @use HasFactory<\Database\Factories\AdmissionFactory> */
    use HasFactory;
    protected $guarded = ['id'];
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
