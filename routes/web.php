<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;             // CONTROLADOR DE PRODUCTOS
use App\Http\Controllers\AdminController;               // CONTROLADOR DEL PANEL ADMINISTRATIVO
use App\Http\Controllers\CategoryController;            // CONTROLADOR DE CATEGORIAS
use App\Http\Controllers\PostController;                // CONTROLADOR DE FORO
use App\Http\Controllers\UserController;                // CONTROLADOR DE USUARIOS
use App\Http\Controllers\FooterController;              // CONTROLADOR DE PIE DE PAGINA
use App\Http\Controllers\ReservationController;         // CONTROLADOR DE RESERVACIONES
use App\Http\Controllers\BookController;                // CONTROLADOR DE LIBROS
use App\Http\Controllers\CategorybookController;        // CONTROLADOR DE LIBROS
use App\Http\Controllers\LibraryController;             // CONTROLADOR DE BIBLIOTECA
use App\Http\Controllers\BookCommentController;         // CONTROLADOR DE COMENTARIOS
use App\Http\Controllers\EquipoController;              // CONTROLADOR DE EQUIPO

// Ruta principal de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Ruta pública para la biblioteca
Route::get('/biblioteca', [LibraryController::class, 'index'])->name('biblioteca.index');
Route::get('book/{book}', [BookController::class, 'show'])->name('book.show');
Route::get('books/{book}', [BookController::class, 'show'])->name('books.show');
Route::get('book/{book}', [BookController::class, 'show'])->name('book.show');

Route::get('/book/{id}/download', [BookController::class, 'download'])->name('book.download');
// routes/web.php

Route::post('/books/{book}/comments', [BookCommentController::class, 'store'])->name('book.comment.store');

// Ruta pública para consultar equipos disponibles
Route::get('/equipos', [EquipoController::class, 'index'])->name('equipos.index');

// Ruta pública para reservaciones
Route::get('/reservaciones', [ReservationController::class, 'ReservationsPage'])->name('reservaciones');

// Ruta pública para productos
Route::get('/products', [ProductController::class, 'index'])->name('products');

// Ruta pública para mostrar publicaciones del foro
Route::get('/forum/posts', [PostController::class, 'guest'])->name('forum.guest');

// Rutas protegidas por autenticación
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Ruta para el dashboard principal
    Route::get('/Inicio', function () {
        return view('dashboard');
    })->name('Inicio');

    // Ruta para la página de reservaciones
    Route::get('/user/reservations', [ReservationController::class, 'index'])->name('reservations');
    
    // Mostrar los equipos y cubiculos disponibles
    Route::get('/equipos/disponibles', [ReservationController::class, 'showAvailableEquipments'])->name('equipos.disponibles');
    Route::get('/cubiculos/disponibles', [ReservationController::class, 'showAvailableCubicles'])->name('cubiculos.disponibles');

    // Ruta para buscar reservaciones
    Route::post('/buscar-reservas', [ReservationController::class, 'buscarReservas'])->name('buscar.reservas');

    // Rutas para gestionar reservaciones
    Route::prefix('reservations')->name('reservations.')->group(function () {
        Route::get('/', [ReservationController::class, 'index'])->name('index'); // Mostrar
        Route::get('/create', [ReservationController::class, 'create'])->name('create'); // Crear
        Route::post('/store', [ReservationController::class, 'store'])->name('store'); // Guardar
        Route::delete('/{reservation}', [ReservationController::class, 'destroy'])->name('destroy'); // Eliminar
        Route::get('/{reservation}/edit', [ReservationController::class, 'edit'])->name('edit');
        Route::put('/{reservation}', [ReservationController::class, 'update'])->name('update');

    });

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

//Grupo de rutas para biblioteca

    Route::prefix('user/library')->name('user.library.')->group(function () {
        // Ruta para la biblioteca (página principal)
        Route::get('/', [LibraryController::class, 'index'])->name('index');
        
        // Ruta para ver el libro
        Route::get('book/{book}', [BookController::class, 'show'])->name('show');
    });

    // Ruta protegida por autenticación
    Route::get('/user/products', [ProductController::class, 'index'])->name('user.products.index');

});

/*
----------------------------------------------------------------
----------------------------------------------------------------
                GRUPO DEL ADMINISTRADPR
----------------------------------------------------------------
----------------------------------------------------------------
*/

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
        Route::get('Inicio', [AdminController::class, 'dashboard'])
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

        // Rutas para manejar la biblioteca

        Route::prefix('books')->name('books.')->group(function () {


            Route::get('/', [BookController::class, 'index'])->name('index'); // Listado de libros
            Route::get('create', [BookController::class, 'create'])->name('create'); // Crear libro
            Route::post('store', [BookController::class, 'store'])->name('store'); // Guardar libro
            Route::get('edit/{id}', [BookController::class, 'edit'])->name('edit');
            Route::put('update/{id}', [BookController::class, 'update'])->name('update'); // Actualizar libro
            Route::delete('delete/{id}', [BookController::class, 'destroy'])->name('delete'); // Eliminar libro

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


        // Rutas para manejo de reservaciones


        Route::prefix('reservations')->name('reservations.')->group(function () {
            Route::get('/', [AdminController::class, 'index'])->name('index'); // admin.reservations.index
            Route::get('/create', [ReservationController::class, 'create'])->name('create'); // admin.reservations.create
            Route::post('/', [ReservationController::class, 'store'])->name('store'); // admin.reservations.store
        });
        /*
        Route::prefix('reservation')->name('reservations.')->group(function () {
            Route::prefix('products')->name('products.')->group(function () {
                Route::get('/', [AdminController::class, 'products'])->name('index'); // Productos en reservaciones
            });
        });
        */

        // Rutas para el manejo de los equipos y cubiculos
        /*Route::resource('equipos', EquipoController::class);
          Route::resource('cubiculos', CubiculoController::class);*/

        // Rutas para manejar el foro en el panel administrativo
        Route::prefix('forum')->name('forum.')->group(function () {
            Route::get('/', [PostController::class, 'admin'])->name('index'); // Listar publicaciones del foro
            Route::delete('post/delete/{post}', [PostController::class, 'destroy'])->name('delete'); // Eliminar publicación del foro
        });

        // Logout del administrador
        Route::post('logout', [BookController::class, 'destroy'])->name('logout');
        Route::post('logout', [AdminController::class, 'destroy'])->name('logout');
    });
});


/*
----------------------------------------------------------------
----------------------------------------------------------------
                Rutas Publica del Footer
----------------------------------------------------------------
----------------------------------------------------------------
*/

Route::prefix('/')->group(function () {
    Route::get('/acercaDe', [FooterController::class, 'acercaDe'])->name('acercaDe'); // Página Acerca de
    Route::get('/privacidad', [FooterController::class, 'privacidad'])->name('privacidad'); // Página de privacidad
    Route::get('/reglamento', [FooterController::class, 'reglamento'])->name('reglamento'); // Reglamento
    Route::get('/terminosCondiciones', [FooterController::class, 'terminosCondiciones'])->name('terminos'); // Términos y condiciones
    Route::get('/contactanos', [FooterController::class, 'contactanos'])->name('contactanos'); // Contacto
    Route::get('/preguntas', [FooterController::class, 'preguntas'])->name('preguntas'); // Preguntas frecuentes
    Route::get('/ubicacion', [FooterController::class, 'mapa'])->name('ubicacion'); // Mapa de ubicación
});

/*
----------------------------------------------------------------
----------------------------------------------------------------
            Rutas relacionadas con las publicaciones
----------------------------------------------------------------
----------------------------------------------------------------
*/

Route::post('/posts/{post}/react', [PostController::class, 'react'])->name('posts.react'); // Reaccionar a una publicación
Route::post('/posts/{post}/comments', [PostController::class, 'storeComment'])->name('comments.store'); // Guardar comentario
Route::delete('/posts/{post}/comments/{comment}', [PostController::class, 'destroyComment'])->name('posts.destroyComment'); // Eliminar comentario
Route::get('posts/{post}/comments/{comment}/edit', [PostController::class, 'editComment'])->name('posts.editComment'); // Editar comentario
Route::put('/comments/{comment}', [PostController::class, 'updateComment'])->name('comments.update'); // Actualizar comentario
Route::delete('admin/comments/{comment}', [PostController::class, 'destroyComment'])->name('admin.comments.delete'); // Eliminar comentario desde admin
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show'); // Mostrar publicación
Route::post('admin/comments/{post_id}', [PostComment::class, 'store'])->name('admin.comments.store'); // Guardar comentario desde admin

