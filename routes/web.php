<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\BerandaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LayananController;


Route::get('/', [BerandaController::class, 'index'])->name('beranda');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::prefix('admin')->name('admin.')->group(function () {
Route::resource('layanan', LayananController::class)->except('show');
});

