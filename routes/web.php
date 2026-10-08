<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\BerandaController;
use App\Http\Controllers\Admin\DashboardController;



Route::get('/', [BerandaController::class, 'index'])->name('beranda');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
