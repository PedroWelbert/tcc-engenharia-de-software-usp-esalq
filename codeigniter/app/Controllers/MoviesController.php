<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MovieModel;

class MoviesController extends Controller
{
    public function index()
    {
        $startTime = microtime(true);

        $model = new MovieModel();
        
        $movies = $model->findAll();

        $loadAvg = sys_getloadavg();
        $memoryUsage = round(memory_get_usage() / 1024, 2);  // em KB
        $executionTime = round(microtime(true) - $startTime, 4);

        return view('movies_view', [
            'movies' => $movies,
            'loadAvg' => $loadAvg,
            'memoryUsage' => $memoryUsage,
            'executionTime' => $executionTime,
        ]);
    }
}

