<?php

use App\Http\Controllers\Backend\DashboardController as BackendDashboardController;
use App\Http\Controllers\Backend\PendidikanController;
use App\Http\Controllers\Backend\PengalamanKerjaController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::redirect('/', 'login')->name('index');

Route::get('home', [HomeController::class, 'index'])->name('home');

Route::middleware(['ceklogin'])->group(function () {
    Route::get('dashboard', [BackendDashboardController::class, 'index'])->name('dashboard');
    Route::resource('pengalaman-kerja', PengalamanKerjaController::class);
    Route::resource('pendidikan', PendidikanController::class);
});


// Route::get('foo', function () {
//     return "hello world";
// });
