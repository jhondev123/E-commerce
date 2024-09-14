<?php

use App\Facades\DbConfig;
use Illuminate\Http\Request;
use App\Domain\Enums\PaymentMethods;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\OrdersController;
use App\Infra\Repositories\OrderRepository;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ToppingsController;
use App\Http\Middleware\CheckAdminMiddleware;

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/validate/token', [AuthController::class, 'validateToken'])->name('validate.token');

Route::prefix('user')->middleware('auth:sanctum', CheckAdminMiddleware::class)->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/address', [UserController::class, 'storeAddress'])->name('store.address');
    Route::delete('/address/{id}', [UserController::class, 'removeAddress'])->name('remove.address');
});

Route::prefix('admin')->middleware('auth:sanctum', CheckAdminMiddleware::class)->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    // trazes os dados do dashboard geral
    // trazer os pedidos
});

Route::apiResource('products', ProductsController::class);
Route::get('product/search', [ProductsController::class, 'search']);

Route::apiResource('groups', GroupsController::class);

Route::apiResource('toppings', ToppingsController::class);

Route::get('/teste', function () {});

Route::post('/order', [OrdersController::class, 'store']);
Route::get('/order/{id}', [OrdersController::class, 'getProductByUserId']);
