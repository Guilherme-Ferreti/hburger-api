<?php

use App\Auth\Controllers\LoginController;
use App\Auth\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);
