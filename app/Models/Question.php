<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /** @use HasFactory<\Database\Factories\QuestionFactory> */
    use HasFactory;

    protected $guarded = ['id'];
    public function options()
    {
        return $this->hasMany(Option::class);
    }
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
    public function questionType()
    {
        return $this->belongsTo(QuestionType::class);
    }
    public function questionLevel()
    {
        return $this->belongsTo(QuestionLevel::class);
    }
    public function chapter()
    {
        return $this->hasOneThrough(
            Chapter::class,   // Final related model
            Topic::class,   // Intermediate model
            'id',             // Foreign key on Topics table...
            'id',             // Foreign key on Chapters table...
            'topic_id',     // Local key on Topics table
            'chapter_id'      // Local key on Chapters table
        );
    }
    public function getSubjectAttribute()
    {
        return $this->topic?->chapter?->subject;
    }
}
