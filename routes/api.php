<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\FeedbackController;
use App\Http\Controllers\Api\PromoController;
use App\Http\Controllers\Api\TransaksiController;
use App\Http\Controllers\Api\QueueController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->post('/checkout', [TransaksiController::class, 'checkout']);
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
Route::post('/feedback', [FeedbackController::class, 'store']);
Route::get('/feedback', [FeedbackController::class, 'index']);
Route::get('/promo', [PromoController::class, 'index']);
// Route::post('/checkout', [TransaksiController::class, 'checkout']);
Route::get('/transactions/history/{customer_id}', [TransaksiController::class, 'history']);
Route::get('/antrian', [QueueController::class, 'current']);
// routes/api.php
Route::post('/reset-antrian', [QueueController::class, 'resetToday']);



