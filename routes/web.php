<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\MapsController::class, 'index']);
