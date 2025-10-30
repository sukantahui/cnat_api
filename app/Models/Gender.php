<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    /** @use HasFactory<\Database\Factories\GenderFactory> */
    use HasFactory;
    protected $guarded = ['id'];
    function guests()
    {
        return $this->hasMany(Guest::class);
    }
    function students()
    {
        return $this->hasMany(Student::class);
    }
}

