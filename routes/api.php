<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PaymentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::get('/menus', [MenuController::class, 'index']);
// Route::get('/events', [EventController::class, 'index']);

/**
 * Payment
 */

Route::post('/payment', [PaymentController::class, 'payment']);
Route::post('/payment/notification', [PaymentController::class, 'handlerNotification']);
