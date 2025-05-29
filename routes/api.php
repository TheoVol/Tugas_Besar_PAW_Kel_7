<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Kantin;
use App\Models\User;

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