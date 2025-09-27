<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\UnitController;

// test route
Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});

// auth routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


// units routes
Route::apiResource('units', UnitController::class);

// protected route
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
