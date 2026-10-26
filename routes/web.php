<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\OperatorController;
use App\Http\Controllers\Admin\RekeningController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\BerandaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'index'])->name('beranda');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::prefix('admin')->name('admin.')->group(function () {
Route::resource('layanan', LayananController::class)->except('show');
Route::resource('operator', OperatorController::class)->except('show');
Route::resource('rekening', RekeningController::class)->except('show');
});



Route::get('/auth', [AuthController::class, 'index'])->name('login');
Route::post('/auth', [AuthController::class, 'login'])->name('login.proses');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerProses'])->name('register.proses');