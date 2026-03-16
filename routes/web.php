<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// ── Client routes (Livewire Volt) ─────────────────────────────
Route::name('client.')->group(function () {
    Volt::route('/',         'client.home')->name('home');
    Volt::route('/services', 'client.services')->name('services');
    Volt::route('/team',     'client.team')->name('team');
    Volt::route('/booking',  'client.booking')->name('booking');
});

// ── Admin routes (Livewire Volt) ──────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Volt::route('/',             'admin.dashboard')->name('dashboard');
    Volt::route('/appointments', 'admin.appointments')->name('appointments');
    Volt::route('/services',     'admin.services')->name('services');
    Volt::route('/team',         'admin.team')->name('team');
});
