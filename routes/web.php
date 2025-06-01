<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\Admin\KantinController;


Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/pesan', [PesananController::class, 'index']);
Route::get('/pesanan',[PesananController::class, 'create'])->name('pesanan.create');
Route::post('/pesanan', [PesananController::class, 'store'])->name('pesanan.store');
Route::get('/kantin', [KantinController::class, 'index'])->name('kantins.index');
Route::get('/kantin', [KantinController::class, 'index'])->name('kantins.index');

Route::get('dashboard', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    if (!session('user_id')) return redirect('/login');
    return view('dashboard');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/penjual/dashboard', function () {
    return view('penjual.dashboard');
});

Route::prefix('admin')->group(function () {
    Route::resource('users', UserController::class);
});

Route::resource('menus', MenuController::class);
