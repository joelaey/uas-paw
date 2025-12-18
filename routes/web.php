<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::view('/login', 'auth.login');
    Route::view('/register', 'auth.register');
    Route::view('/forgot', 'auth.forgot');
    Route::view('/verify', 'auth.verify');
    Route::view('/new-password', 'auth.new-password');
});

/*
|--------------------------------------------------------------------------
| USER DASHBOARD
|--------------------------------------------------------------------------
*/
Route::prefix('user')->group(function () {

    Route::get('/dashboard', fn () => view('user.dashboard'))->name('user.dashboard');
    Route::get('/pengaduan', fn () => view('user.pengaduan'))->name('user.pengaduan');
    Route::get('/riwayat', fn () => view('user.riwayat'))->name('user.riwayat');
    Route::get('/profile', fn () => view('user.profile'))->name('user.profile');

});

/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    Route::view('/dashboard', 'admin.dashboard');
    Route::view('/pengaduan', 'admin.pengaduan');
    Route::view('/pengaduan/detail', 'admin.pengaduan-show');
    Route::view('/users', 'admin.users');
    Route::view('/profile', 'admin.profile');
});
