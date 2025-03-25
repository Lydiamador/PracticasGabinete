<?php
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;


// RUTA PRINCIPAL
Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

// RUTAS PARA AUTENTICACIÓN
Route::get('/login', [UsuarioController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UsuarioController::class, 'login'])->name('login.submit');
Route::post('/logout', [UsuarioController::class, 'logout'])->name('logout');

// RUTAS PARA REGISTRO
Route::get('/register', [UsuarioController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UsuarioController::class, 'store'])->name('register.submit');

// Ruta pública para ver el menú del día
Route::get('/menu-del-dia', [MenuController::class, 'menuDelDia'])->name('menu.dia');
Route::get('/menu/{date}', [MenuController::class, 'showMenuByDate'])->name('menu.date');


Route::prefix('pedido')->group(function () {
    // Ver carrito
    Route::get('carrito', [PedidoController::class, 'carrito'])->name('pedido.carrito');
    
    // Agregar producto al carrito
    Route::get('/agregar-al-carrito/{id}/{tipo}', [PedidoController::class, 'agregarAlCarrito'])->name('pedido.agregar');
    
    // Eliminar producto del carrito
    Route::get('eliminar/{id}', [PedidoController::class, 'eliminarDelCarrito'])->name('pedido.eliminar');
    
    // Realizar pedido
    Route::post('realizar', [PedidoController::class, 'realizarPedido'])->name('pedido.realizar');
    
    // Ver todos los pedidos
    Route::get('pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
});

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    // Página de Inicio para Usuarios
    Route::get('/Inicio', function () {
        if (auth()->user()->rol === 'Admin') {
            return redirect()->route('admin.admin');
        }
        return view('Inicio');
    })->name('Inicio');

    // Ruta para mostrar los productos (vista pública)
    Route::get('/productos', [ProductoController::class, 'index'])->name('productos');
    
    // Ruta para mostrar los platos (vista pública)
    Route::get('/platos', [PlatoController::class, 'index'])->name('platos');


    // Ruta para mostrar el menú del día (vista pública)
    Route::get('/menu', [MenuController::class, 'showPublicMenu'])->name('menu');

    
    // Rutas de administración
    Route::middleware(['auth'])->group(function () {
        Route::get('/admin', function () {
            if (auth()->user()->rol === 'Admin') {
                return view('admin.admin');
            }
            return redirect()->route('Inicio');
        })->name('admin.admin');

        // RUTAS DE GESTIÓN PARA LOS ADMINISTRADORES
        Route::group(['middleware' => function ($request, $next) {
            if (auth()->user()->rol !== 'Admin') {
                return redirect()->route('Inicio');
            }
            return $next($request);
        }], function () {
            // Rutas para gestión de productos
            Route::get('/gestion-productos', [ProductoController::class, 'adminIndex'])->name('gestion-productos');
            Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create'); // Crear nuevo producto
            Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store'); // Guardar nuevo producto
            Route::get('/productos/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit'); // Editar producto
            Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update'); // Actualizar producto
            Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy'); // Eliminar producto

            // Rutas para gestión de platos
            Route::get('/gestion-platos', [PlatoController::class, 'adminIndex'])->name('gestion-platos');
            Route::get('/platos/create', [PlatoController::class, 'create'])->name('platos.create'); // Crear nuevo plato
            Route::post('/platos', [PlatoController::class, 'store'])->name('platos.store'); // Guardar nuevo plato
            Route::get('/platos/{id}/edit', [PlatoController::class, 'edit'])->name('platos.edit'); // Editar plato
            Route::put('/platos/{id}', [PlatoController::class, 'update'])->name('platos.update'); // Actualizar plato
            Route::delete('/platos/{id}', [PlatoController::class, 'destroy'])->name('platos.destroy'); // Eliminar plato

            // Rutas para gestión de menús
            Route::get('/gestion-menu', [MenuController::class, 'index'])->name('admin.menu');
            Route::post('/menu', [MenuController::class, 'store'])->name('admin.menu.store');
            Route::put('/menu/{menu}', [MenuController::class, 'update'])->name('admin.menu.update');
            Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])->name('admin.menu.destroy');
        });
    });
});