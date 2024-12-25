<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\CustomerController;
use App\Http\Controllers\Api\V1\ProfessionalController;
use App\Http\Controllers\Api\V1\RequestController;
use App\Http\Controllers\Api\V1\TransactionController;
use App\Http\Controllers\Api\V1\ReviewController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/firebase-token', [AuthController::class, 'updateFirebaseToken']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('professionals', ProfessionalController::class);
    Route::apiResource('requests', RequestController::class);
    Route::apiResource('transactions', TransactionController::class);
    Route::apiResource('reviews', ReviewController::class);

});
