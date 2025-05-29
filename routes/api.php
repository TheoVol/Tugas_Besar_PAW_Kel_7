<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Kantin;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/kantins', function () {
    return response()->json([
        'status' => 'success',
        'data' => Kantin::all()
    ]);
}); 
