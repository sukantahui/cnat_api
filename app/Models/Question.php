<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $question_text
 * @property bool $inforce
 * @property Topic $topic
 * @property Chapter|null $chapter
 */

class Question extends Model
{
    /** @use HasFactory<\Database\Factories\QuestionFactory> */
    use HasFactory;

    protected $guarded = ['id'];
    protected $appends = ['subject'];
    
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
            Chapter::class,   // Final model
            Topic::class,     // Intermediate model
            'id',             // FK on topics table referencing chapters.id
            'id',             // PK on chapters table
            'topic_id',       // FK on questions table
            'chapter_id'      // FK on topics table
        );
    }
    public function getSubjectAttribute()
    {
        return $this->topic?->chapter?->subject;
    }

    //local scope
    public function scopeActive($query)
    {
        return $query->where('inforce', 1);
    }
    //Attribute Casting (Auto Data Conversion)
    protected $casts = [
        'inforce' => 'boolean',
        'question_tags' => 'array',
        'applicable_to' => 'array'
    ];
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
