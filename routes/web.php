<?php

use Illuminate\Support\Facades\Route;

// ── Client routes ─────────────────────────────────────────────
Route::name('client.')->group(function () {
    Route::livewire('/',         'client.home')->name('home');
    Route::livewire('/services', 'client.services')->name('services');
    Route::livewire('/team',     'client.team')->name('team');
    Route::livewire('/booking',  'client.booking')->name('booking');
});

// ── Admin routes ──────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::livewire('/',             'admin.dashboard')->name('dashboard');
    Route::livewire('/appointments', 'admin.appointments')->name('appointments');
    Route::livewire('/services',     'admin.services')->name('services');
    Route::livewire('/team',         'admin.team')->name('team');
});
