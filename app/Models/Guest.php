<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // ✅ Correct import

class Guest extends Model
{
    /** @use HasFactory<\Database\Factories\GuestFactory> */
    use HasFactory;
    protected $guarded = ['id'];
    function foodPreference(): BelongsTo
    {
        return $this->belongsTo(FoodPreference::class);
    }

    function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }
}
