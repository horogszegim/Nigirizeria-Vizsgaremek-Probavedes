<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TimeSlotController;

Route::apiResource('pizzas', PizzaController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('reservations', ReservationController::class);
Route::apiResource('time-slots', TimeSlotController::class);
Route::apiResource('orders', OrderController::class);
Route::apiResource('order-items', OrderItemController::class);
