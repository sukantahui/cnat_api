<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    /** @use HasFactory<\Database\Factories\ChapterFactory> */
    use HasFactory;
    protected $guarded = ['id'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
    public function questions()
    {
        return $this->hasManyThrough(
            Question::class,  // Final model
            Topic::class,     // Intermediate model
            'chapter_id',     // FK on topics table
            'topic_id',       // FK on questions table
            'id',             // PK on chapters table
            'id'              // PK on topics table
        );
    }
}
