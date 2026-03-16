<?php

use Illuminate\Support\Facades\Route;

// ── Admin routes (Livewire) ───────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::livewire('/',             'admin.dashboard')->name('dashboard');
    Route::livewire('/appointments', 'admin.appointments')->name('appointments');
    Route::livewire('/services',     'admin.services')->name('services');
    Route::livewire('/team',         'admin.team')->name('team');
});

// ── React SPA catch-all ───────────────────────────────────────
Route::get('/{any?}', function () {
    return view('layouts.app');
})->where('any', '.*')->name('spa');
