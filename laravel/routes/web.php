<?php

use App\Http\Controllers\MovieController;

Route::get('/movies', [MovieController::class, 'index']);
