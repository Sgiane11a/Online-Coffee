<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\BibliotecaController;
use App\Http\Controllers\ReservacionesController;
use App\Http\Controllers\ForoController;

// Ruta principal de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Ruta pública para la biblioteca
Route::get('/biblioteca', [bibliotecaController::class, 'index'])->name('biblioteca');

// Ruta pública para las reservaciones
Route::get('/reservaciones', [ReservacionesController::class, 'index'])->name('reservaciones');

// Ruta pública para productos
Route::get('/products', [ProductController::class, 'index'])->name('products');

// Ruta pública para el foro
Route::get('/foro', [ForoController::class, 'index'])->name('foro');

// Ruta pública para mostrar publicaciones del foro
Route::get('/forum/posts', [PostController::class, 'guest'])->name('forum.guest');

// Rutas protegidas por autenticación
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Ruta para el dashboard principal
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Ruta para la página de reservaciones
    Route::get('/reservations', function () {
        return view('reservations');
    })->name('reservations');

    // Grupo de rutas para el foro autenticado
    Route::prefix('forum')->name('forum.')->group(function () {
        // Página principal del foro
        Route::get('/', [PostController::class, 'index'])->name('index');

        // Subgrupo para manejar publicaciones
        Route::prefix('post')->name('post.')->group(function () {
            Route::get('create', [PostController::class, 'create'])->name('create'); // Crear publicación
            Route::post('store', [PostController::class, 'store'])->name('store'); // Guardar publicación
            Route::get('edit/{post}', [PostController::class, 'edit'])->name('edit'); // Editar publicación
            Route::put('update/{post}', [PostController::class, 'update'])->name('update'); // Actualizar publicación
            Route::delete('delete/{post}', [PostController::class, 'destroy'])->name('delete'); // Eliminar publicación
        });
    });
});

// Grupo de rutas para el administrador
Route::prefix('admin')->name('admin.')->group(function () {

    // Rutas de administrador invitado (login)
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AdminController::class, 'create'])->name('login'); // Formulario de login
        Route::post('login', [AdminController::class, 'store']); // Proceso de login
    });

    // Rutas para administrador autenticado
    Route::middleware('authenticated:admin')->group(function () {

        // Redirección al dashboard del administrador
        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        });

        // Dashboard del administrador
        Route::get('dashboard', [AdminController::class, 'dashboard'])
            ->middleware(['verified'])->name('dashboard');

        // Panel principal del administrador
        Route::get('index', [AdminController::class, 'index'])->name('index');

        // Rutas para manejar usuarios
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index'); // Listado de usuarios
            Route::get('create', [UserController::class, 'create'])->name('create'); // Crear usuario
            Route::post('store', [UserController::class, 'store'])->name('store'); // Guardar usuario
            Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit'); // Editar usuario
            Route::put('update/{user}', [UserController::class, 'update'])->name('update'); // Actualizar usuario
            Route::delete('delete/{user}', [UserController::class, 'destroy'])->name('delete'); // Eliminar usuario
        });

        // Rutas para manejar la tienda
        Route::prefix('store')->name('store.')->group(function () {

            // Tienda principal
            Route::get('/', [AdminController::class, 'shop'])->name('index');

            // Rutas para categorías
            Route::prefix('categories')->name('categories.')->group(function () {
                Route::get('/', [CategoryController::class, 'index'])->name('index'); // Listar categorías
                Route::get('create', [CategoryController::class, 'create'])->name('create'); // Crear categoría
                Route::post('store', [CategoryController::class, 'store'])->name('store'); // Guardar categoría
                Route::get('edit/{category}', [CategoryController::class, 'edit'])->name('edit'); // Editar categoría
                Route::put('update/{category}', [CategoryController::class, 'update'])->name('update'); // Actualizar categoría
                Route::delete('delete/{category}', [CategoryController::class, 'destroy'])->name('delete'); // Eliminar categoría
            });

            // Rutas para productos
            Route::prefix('products')->name('products.')->group(function () {
                Route::get('/', [ProductController::class, 'admin'])->name('index'); // Listar productos
                Route::get('create', [ProductController::class, 'create'])->name('create'); // Crear producto
                Route::post('store', [ProductController::class, 'store'])->name('store'); // Guardar producto
                Route::get('edit/{product}', [ProductController::class, 'edit'])->name('edit'); // Editar producto
                Route::put('update/{product}', [ProductController::class, 'update'])->name('update'); // Actualizar producto
                Route::delete('delete/{product}', [ProductController::class, 'destroy'])->name('delete'); // Eliminar producto
            });
        });

        // Rutas para manejo de reservaciones
        Route::prefix('reservation')->name('reservation.')->group(function () {
            Route::prefix('products')->name('products.')->group(function () {
                Route::get('/', [AdminController::class, 'products'])->name('index'); // Productos en reservaciones
            });
        });

        // Rutas para manejar el foro en el panel administrativo
        Route::prefix('forum')->name('forum.')->group(function () {
            Route::get('/', [PostController::class, 'admin'])->name('index'); // Listar publicaciones del foro
            Route::delete('post/delete/{post}', [PostController::class, 'destroy'])->name('delete'); // Eliminar publicación del foro
        });

        // Logout del administrador
        Route::post('logout', [AdminController::class, 'destroy'])->name('logout');
    });
});

// Rutas públicas del footer
Route::prefix('/')->group(function () {
    Route::get('/acercaDe', [FooterController::class, 'acercaDe'])->name('acercaDe'); // Página Acerca de
    Route::get('/privacidad', [FooterController::class, 'privacidad'])->name('privacidad'); // Página de privacidad
    Route::get('/reglamento', [FooterController::class, 'reglamento'])->name('reglamento'); // Reglamento
    Route::get('/terminosCondiciones', [FooterController::class, 'terminosCondiciones'])->name('terminos'); // Términos y condiciones
    Route::get('/contactanos', [FooterController::class, 'contactanos'])->name('contactanos'); // Contacto
    Route::get('/preguntas', [FooterController::class, 'preguntas'])->name('preguntas'); // Preguntas frecuentes
    Route::get('/ubicacion', [FooterController::class, 'mapa'])->name('ubicacion'); // Mapa de ubicación
});

// Rutas relacionadas con las publicaciones
Route::post('/posts/{post}/react', [PostController::class, 'react'])->name('posts.react'); // Reaccionar a una publicación
Route::post('/posts/{post}/comments', [PostController::class, 'storeComment'])->name('comments.store'); // Guardar comentario
Route::delete('/posts/{post}/comments/{comment}', [PostController::class, 'destroyComment'])->name('posts.destroyComment'); // Eliminar comentario
Route::get('posts/{post}/comments/{comment}/edit', [PostController::class, 'editComment'])->name('posts.editComment'); // Editar comentario
Route::put('/comments/{comment}', [PostController::class, 'updateComment'])->name('comments.update'); // Actualizar comentario
Route::delete('admin/comments/{comment}', [PostController::class, 'destroyComment'])->name('admin.comments.delete'); // Eliminar comentario desde admin
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show'); // Mostrar publicación
Route::post('admin/comments/{post_id}', [PostComment::class, 'store'])->name('admin.comments.store'); // Guardar comentario desde admin
