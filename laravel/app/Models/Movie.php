<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movie';
    public $timestamps = false;

    protected $fillable = [
        'name', 'plot', 'genre', 'duration', 'director', 'rating', 'poster'
    ];
}

