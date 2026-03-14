<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    /** @use HasFactory<\Database\Factories\CertificateFactory> */
    use HasFactory;
    protected $guarded = ['id'];
    public function result()
    {
        return $this->belongsTo(Result::class);
    }
}
