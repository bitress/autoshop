<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::post('/book', [BookingController::class, 'store']);
