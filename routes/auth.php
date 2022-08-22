<?php

use App\Api\Auth\Controllers\LoginController;
use App\Api\Auth\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);
