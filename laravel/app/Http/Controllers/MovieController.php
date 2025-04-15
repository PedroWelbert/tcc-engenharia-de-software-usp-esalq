<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();

        return view('movies.index', [
            'movies' => $movies,
            'loadAvg' => sys_getloadavg()[0],
            'memoryUsage' => round(memory_get_usage() / 1024, 2),
            'executionStart' => microtime(true)
        ]);
    }
}

