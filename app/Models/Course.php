<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;
    protected $guarded = ['id'];
    function details()
    {
        return $this->hasMany(CourseDetail::class);
    }
    public function admissions()
    {
        return $this->hasMany(Admission::class);
    }
    public function students()
    {
        return $this->belongsToMany(
            Student::class,
            'admissions',
            'course_id',
            'student_id'
        );
    }
}
