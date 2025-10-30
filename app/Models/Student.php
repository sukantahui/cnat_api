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
    
}
