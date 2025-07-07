<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\AboutController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::get('/menus', [MenuController::class, 'index']);
Route::get('/menus/recommended', [MenuController::class, 'recommended']);
Route::post('/menus', [MenuController::class, 'store']);
Route::put('/menus/{id}', [MenuController::class, 'update']);
Route::get('/events', [EventController::class, 'index']);

/**
 * Payment
 */

Route::post('/payment', [PaymentController::class, 'payment']);
Route::post('/payment/notification', [PaymentController::class, 'handlerNotification']);
Route::get('/abouts', [AboutController::class, 'index']);
