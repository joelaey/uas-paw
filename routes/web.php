<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\AspirasiController as UserAspirasiController;
use App\Http\Controllers\User\ProfileController as UserProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\AspirasiController as AdminAspirasiController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redirect root to login
Route::get('/', function () {
    return redirect('/auth/login');
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (Guest Only)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->prefix('auth')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Register
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // Forgot Password (shows admin contact info)
    Route::get('/forgot', function () {
        return view('auth.forgot');
    })->name('password.request');
});

// Logout (requires auth)
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

/*
|--------------------------------------------------------------------------
| USER ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

    // Pengaduan/Aspirasi
    Route::get('/pengaduan', [UserAspirasiController::class, 'create'])->name('pengaduan');
    Route::post('/pengaduan', [UserAspirasiController::class, 'store'])->name('pengaduan.store');

    // Riwayat
    Route::get('/riwayat', [UserAspirasiController::class, 'riwayat'])->name('riwayat');
    Route::get('/riwayat/{id}', [UserAspirasiController::class, 'show'])->name('riwayat.show');

    // Profile
    Route::get('/profile', [UserProfileController::class, 'edit'])->name('profile');
    Route::put('/profile', [UserProfileController::class, 'update'])->name('profile.update');
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Pengaduan/Aspirasi Management
    Route::get('/pengaduan', [AdminAspirasiController::class, 'index'])->name('pengaduan');
    Route::get('/pengaduan/{id}', [AdminAspirasiController::class, 'show'])->name('pengaduan.show');
    Route::post('/pengaduan/{id}/respond', [AdminAspirasiController::class, 'respond'])->name('pengaduan.respond');
    Route::patch('/pengaduan/{id}/status', [AdminAspirasiController::class, 'updateStatus'])->name('pengaduan.status');
    Route::delete('/pengaduan/{id}', [AdminAspirasiController::class, 'destroy'])->name('pengaduan.destroy');

    // User Management
    Route::get('/users', [AdminUserController::class, 'index'])->name('users');

    // Profile
    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile');
    Route::put('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
});
