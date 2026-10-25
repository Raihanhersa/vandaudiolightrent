<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\BerandaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\OperatorController;
use App\Http\Controllers\Admin\RekeningController;

Route::get('/', [BerandaController::class, 'index'])->name('beranda');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::prefix('admin')->name('admin.')->group(function () {
Route::resource('layanan', LayananController::class)->except('show');
Route::resource('operator', OperatorController::class)->except('show');
Route::resource('rekening', RekeningController::class)->except('show');
});


