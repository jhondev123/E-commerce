<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\ProductsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/validate/token', [AuthController::class, 'validateToken'])->name('validate.token');

// Products routes
Route::apiResource('products', ProductsController::class);
Route::get('product/search', [ProductsController::class, 'search']);

// Groups routes
Route::apiResource('groups', GroupsController::class);
