<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'time',
        'title',
        'stage', // Add stage
        'short_description',
        'long_description',
        'speaker',
        'speaker_link',
        'image'
    ];
}





