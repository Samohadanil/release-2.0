<?php

use Illuminate\Support\Facades\Route;

// Donations

Route::get('/home', [App\Http\Controllers\DonationsController::class, 'index'])->name('home');
Route::get('/donations', [App\Http\Controllers\DonationsController::class, 'index'])->name('donations');
Route::post('/donations/store', [App\Http\Controllers\DonationsController::class, 'store'])->name('donations_store');
Route::get('/', [App\Http\Controllers\DonationsController::class, 'showpage'])->name('home');




