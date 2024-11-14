<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AdminController::class, 'create'])
            ->name('login');

        Route::post('login', [AdminController::class, 'store']);
    });

    Route::middleware('authenticated:admin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])
            ->middleware(['verified'])->name('dashboard');

        Route::post('logout', [AdminController::class, 'destroy'])
            ->name('logout');
    });
});

Route::get('/products', [ProductsController::class, 'index']);
