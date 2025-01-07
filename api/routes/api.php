<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

Route::apiResource('category', CategoryController::class)->except(
    'create', 'show', 'edit'
);

Route::apiResource('task', TaskController::class)->except(
    'create', 'show', 'edit'
);

