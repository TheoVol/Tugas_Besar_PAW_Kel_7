<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;

// Public Routes
Route::view('/', 'welcome');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login');
    Route::get('/register', 'showRegister');
    Route::post('/register', 'register');
    Route::get('/logout', 'logout');
});

// Protected Route
Route::get('/dashboard', function () {
    if (!session('user_id')) {
        return redirect('/login');
    }
    return view('dashboard');
});

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::view('/dashboard', 'admin.dashboard');
    Route::resource('users', UserController::class);
});
