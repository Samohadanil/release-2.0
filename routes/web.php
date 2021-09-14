<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// donatisons
Route::get('/donatisons', [App\Http\Controllers\DonationsController::class, 'index'])->name('donations');
Route::post('/donatisons/store', [App\Http\Controllers\DonationsController::class, 'store'])->name('donations_store');
Route::get('/', [App\Http\Controllers\GeneralController::class, 'showpage'])->name('home');




Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');
