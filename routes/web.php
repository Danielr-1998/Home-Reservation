<?php

use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TariffController;

Route::resource('apartments', ApartmentController::class);
Route::resource('clients', ClientController::class);
Route::resource('reservations', ReservationController::class);
Route::resource('tariffs', TariffController::class);
Route::get('/check-email', [ClientController::class, 'checkEmail']);
Route::get('/check-availability', [ReservationController::class, 'checkAvailability']);
Route::view('/task', 'task.index')->name('task.index');
Route::resource('clients', ClientController::class);
