<?php

use App\Http\Controllers\AbsensiController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('absensi', [AbsensiController::class, 'index'])->name('absensi.index');
Route::get('absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
Route::post('absensi', [AbsensiController::class, 'store'])->name('absensi.store');
Route::delete('absensi/{pin}', [AbsensiController::class, 'destroy'])->name('absensi.destroy');

