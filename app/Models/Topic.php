<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    /** @use HasFactory<\Database\Factories\TopicFactory> */
    use HasFactory;
    protected $guarded = ['id'];
    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
   
    public function subject()
    {
        return $this->hasOneThrough(
            Subject::class,   // Final related model
            Chapter::class,   // Intermediate model
            'id',             // Foreign key on Chapters table...
            'id',             // Foreign key on Subjects table...
            'chapter_id',     // Local key on Topics table
            'subject_id'      // Local key on Chapters table
        );
    }
}
