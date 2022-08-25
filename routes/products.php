<?php

use App\Api\Products\Controllers\BreadController;
use App\Api\Products\Controllers\IngredientController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')
    ->group(function () {
        Route::apiResource('breads', BreadController::class)->except('show');
        Route::apiResource('ingredients', IngredientController::class)->except('show');
    });
