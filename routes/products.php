<?php

use App\Api\Products\Controllers\BreadController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')
    ->group(function () {
        Route::apiResource('breads', BreadController::class);
    });
