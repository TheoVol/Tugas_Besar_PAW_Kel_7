<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Kantin;
use App\Models\User;
use App\Http\Controllers\Api\MenuApiController;
use App\Http\Controllers\Admin\StallController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/kantins', function () {
    return response()->json([
        'status' => 'success',
        'data' => Kantin::all()
    ]);
});

Route::get('/users', function () {
    return response()->json([
        'status' => 'success',
        'data' => User::all()
    ]);
});

Route::prefix('admin')->group(function () {
    Route::apiResource('stalls', StallController::class);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/menus', [MenuApiController::class, 'index']);       
    Route::get('/menus/{id}', [MenuApiController::class, 'show']); 
    Route::post('/menus', [MenuApiController::class, 'store']);
    Route::put('/menus/{id}', [MenuApiController::class, 'update']);
    Route::delete('/menus/{id}', [MenuApiController::class, 'destroy']);
});