<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CycleUser extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'date_of_birth'    => 'date:Y-m-d',
            'use_custom_cycle' => 'boolean',
            'last_seen_at'     => 'datetime',
            'weight_kg'        => 'float',
            'height_cm'        => 'float',
        ];
    }

    /** The authenticated user this profile belongs to. */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /** All period start date entries for this user. */
    public function periodEntries(): HasMany
    {
        return $this->hasMany(CyclePeriodEntry::class)->orderBy('period_start_date');
    }
}
