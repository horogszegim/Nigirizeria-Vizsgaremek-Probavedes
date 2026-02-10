<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TimeSlotController;

Route::apiResource('reservations', ReservationController::class);
Route::apiResource('pizzas', PizzaController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('time-slots', TimeSlotController::class);
