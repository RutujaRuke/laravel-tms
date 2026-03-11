<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FormDataController;

// Route::middleware('auth:sanctum')->group(function () {
//     Route::apiResource('form-data', FormDataController::class);
// });

Route::apiResource('form-data', FormDataController::class);
// Route::apiResource('form-data', [FormDataController::class, 'store']);