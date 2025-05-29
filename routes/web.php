<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\KantinController;
use App\Http\Admin\Controllers\StallController;
use App\Http\Controllers\Admin\StallController as AdminStallController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;


Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', function () {
    if (!session('user_id')) return redirect('/login');
    return view('dashboard');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::prefix('admin')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('kantins', KantinController::class);
    Route::resource('stalls', AdminStallController::class);
});

Route::resource('menus', MenuController::class);
