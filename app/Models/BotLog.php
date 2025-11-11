<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BotLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'user_agent',
        'page_url',
        'referrer',
        'payload',
    ];
}
