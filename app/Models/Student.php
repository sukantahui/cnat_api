<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // ✅ Correct import
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;
    protected $guarded = ['id'];

    protected static function booted()
    {
        static::creating(function ($student) {

            $yearStart = now()->year % 100;
            $yearEnd = ($yearStart + 1) % 100;
            $prefix= 'CNAT';
            $academicYear = sprintf('%02d%02d', $yearStart, $yearEnd);

            $last = self::where('registration_number', 'like', "$prefix-%-$academicYear")
                ->latest('id')
                ->first();

            if ($last) {

                $lastNumber = intval(explode('-', $last->registration_number)[1]);
                $nextNumber = $lastNumber + 1;

            } else {

                $nextNumber = 10001;
            }

            $student->registration_number = $prefix . '-' . $nextNumber . '-' . $academicYear;
        });
    }
    function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }
    public function state(): HasOneThrough
    {
        return $this->hasOneThrough(
            State::class,    // Final related model
            District::class, // Intermediate model
            'id',            // Foreign key on Districts table...
            'id',            // Foreign key on States table...
            'district_id',   // Local key on Students table
            'state_id'       // Local key on Districts table
        );
    }
    public function admissions()
    {
        return $this->hasMany(Admission::class);
    }
    
}
