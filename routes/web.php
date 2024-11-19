<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/reservations', function () {
        return view('reservations');
    })->name('reservations');
    Route::prefix('forum')->name('forum.')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::prefix('post')->name('post.')->group(function () {
            Route::get('create', [PostController::class, 'create'])->name('create');
            Route::post('store', [PostController::class, 'store'])->name('store');
            Route::get('edit/{post}', [PostController::class, 'edit'])->name('edit');
            Route::put('update/{post}', [PostController::class, 'update'])->name('update');
            Route::delete('delete/{post}', [PostController::class, 'destroy'])->name('delete');
        });
    });
});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest:admin')->group(function () {

        Route::get('login', [AdminController::class, 'create'])
            ->name('login');

        Route::post('login', [AdminController::class, 'store']);
    });

    Route::middleware('authenticated:admin')->group(function () {

        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        });

        Route::get('dashboard', [AdminController::class, 'dashboard'])
            ->middleware(['verified'])->name('dashboard');

        Route::prefix('users')->name('users.')->group(function () {

            Route::get('/', [UserController::class, 'index'])
                ->name('index');

            Route::get('create', [UserController::class, 'create'])
                ->name('create');

            Route::post('store', [UserController::class, 'store'])
                ->name('store');

            Route::get('edit/{user}', [UserController::class, 'edit'])
                ->name('edit');

            Route::put('update/{user}', [UserController::class, 'update'])
                ->name('update');

            Route::delete('delete/{user}', [UserController::class, 'destroy'])
                ->name('delete');
        });

        Route::prefix('store')->name('store.')->group(function () {

            Route::get('/', [AdminController::class, 'shop'])
                ->name('index');

            Route::prefix('categories')->name('categories.')->group(function () {

                Route::get('/', [CategoryController::class, 'index'])
                    ->name('index');

                Route::get('create', [CategoryController::class, 'create'])
                    ->name('create');

                Route::post('store', [CategoryController::class, 'store'])
                    ->name('store');

                Route::get('edit/{category}', [CategoryController::class, 'edit'])
                    ->name('edit');

                Route::put('update/{category}', [CategoryController::class, 'update'])
                    ->name('update');

                Route::delete('delete/{category}', [CategoryController::class, 'destroy'])
                    ->name('delete');
            });

            Route::prefix('products')->name('products.')->group(function () {

                Route::get('/', [ProductController::class, 'admin'])
                    ->name('index');

                Route::get('create', [ProductController::class, 'create'])
                    ->name('create');

                Route::post('store', [ProductController::class, 'store'])
                    ->name('store');

                Route::get('edit/{product}', [ProductController::class, 'edit'])
                    ->name('edit');

                Route::put('update/{product}', [ProductController::class, 'update'])
                    ->name('update');

                Route::delete('delete/{product}', [ProductController::class, 'destroy'])
                    ->name('delete');
            });
        });

        Route::prefix('reservation')->name('reservation.')->group(function () {

            Route::prefix('products')->name('products.')->group(function () {

                Route::get('/', [AdminController::class, 'products'])
                    ->name('index');
            });
        });

        Route::prefix('forum')->name('forum.')->group(function () {

            Route::get('/', [PostController::class, 'admin'])
                ->name('index');

            Route::delete('delete/{post}', [PostController::class, 'destroy'])
                ->name('delete');
        });

        Route::post('logout', [AdminController::class, 'destroy'])
            ->name('logout');
    });
});
