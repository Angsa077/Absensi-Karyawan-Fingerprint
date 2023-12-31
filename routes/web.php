<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Dashboard
Route::get('/', [DashboardController::class, 'welcome'])->name('welcome');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// setting
Route::post('/restart', [DashboardController::class, 'restart'])->name('restart');
Route::post('/poweroff', [DashboardController::class, 'poweroff'])->name('poweroff');

// Absensi
Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
Route::get('/absensi/filtered', [AbsensiController::class, 'filtered'])->name('absensi.filtered');

// User
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/user/filtered', [UserController::class, 'filtered'])->name('user.filtered');

// Template
Route::get('/template/create', [TemplateController::class, 'create'])->name('template.create');
Route::post('/template', [TemplateController::class, 'store'])->name('template.store');

// Date
Route::get('/date/create', [DateController::class, 'create'])->name('date.create');
Route::post('/date', [DateController::class, 'store'])->name('date.store');