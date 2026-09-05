<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // ✅ Correct import

class Guest extends Model
{
    /** @use HasFactory<\Database\Factories\GuestFactory> */
    use HasFactory;

    protected $fillable = [
        'year',
        'guest_name',
        'age',
        'mobile',
        'wp_number',
        'address',
        'email',
        'pin',
        'token',
        'gender_id',
        'food_preference_id',
        'previous_guest_id',
        'is_attending',
        'comment',
    ];

    public function foodPreference(): BelongsTo
    {
        return $this->belongsTo(FoodPreference::class);
    }

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public function previousGuest(): BelongsTo
    {
        return $this->belongsTo(Guest::class, 'previous_guest_id');
    }

    protected function casts(): array
    {
        return [
            'age'          => 'integer',
            'year'         => 'integer',
            'is_attending' => 'boolean',
        ];
    }
}
