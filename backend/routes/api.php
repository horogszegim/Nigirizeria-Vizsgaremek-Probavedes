<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TimeSlotController;

Route::apiResource('pizzas', PizzaController::class)
    ->only(['index', 'show']);

Route::apiResource('categories', CategoryController::class)
    ->only(['index', 'show']);

Route::apiResource('time-slots', TimeSlotController::class)
    ->only(['index', 'show']);

Route::apiResource('order-items', OrderItemController::class)
    ->only(['index', 'show']);

Route::apiResource('reservations', ReservationController::class);
Route::apiResource('orders', OrderController::class);
