<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CyclePeriodEntry extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'period_start_date' => 'date:Y-m-d',
        ];
    }

    /**
     * The user this entry belongs to.
     */
    public function cycleUser(): BelongsTo
    {
        return $this->belongsTo(CycleUser::class);
    }
}
