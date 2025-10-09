<?php
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Container\Attributes\Auth;

Route::prefix('v1')->group(function () {
    // Public routes
    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::post('register', [AuthController::class, 'register']);
        // Protected routes
        Route::middleware('auth:api')->group(function () {
            Route::post('logout', [AuthController::class, 'logout']);
            Route::get('users', AuthController::class, 'user');

            Route::prefix('products')->group(function () {
                Route::get('/', [ProductController::class, 'index']);
                Route::post('/', [ProductController::class, 'store']);
                Route::prefix('{product}')->group(function () {
                    Route::get('/', [ProductController::class, 'show']);
                    Route::put('/', [ProductController::class, 'update']);
                    Route::delete('/', [ProductController::class, 'destroy']);
                });
            });
        });
    });
});

