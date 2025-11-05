<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStatus extends Model
{
    /** @use HasFactory<\Database\Factories\CourseStatusFactory> */
    use HasFactory;
    protected $guarded = ['id'];

    public function admissions()
    {
        return $this->hasMany(Admission::class);
    }
}
