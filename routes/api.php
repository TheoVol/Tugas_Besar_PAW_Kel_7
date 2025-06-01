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

Route::post('/login', function(Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    // Hapus token lama jika perlu
    $user->tokens()->delete();

    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json([
        'status' => 'success',
        'token' => $token,
        'user' => $user,
    ]);
});

Route::prefix('admin')->group(function () {
    Route::apiResource('stalls', StallController::class);
});


Route::get('/menus', [MenuApiController::class, 'index']);       
Route::get('/menus/{id}', [MenuApiController::class, 'show']); 
Route::post('/menus', [MenuApiController::class, 'store']);
Route::put('/menus/{id}', [MenuApiController::class, 'update']);
Route::delete('/menus/{id}', [MenuApiController::class, 'destroy']);
