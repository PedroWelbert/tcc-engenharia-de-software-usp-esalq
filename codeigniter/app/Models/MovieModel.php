<?php

namespace App\Models;

use CodeIgniter\Model;

class MovieModel extends Model
{
    protected $table = 'movie';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'plot', 'genre', 'director', 'duration', 'rating', 'poster'];
    protected $useTimestamps = false;
}
