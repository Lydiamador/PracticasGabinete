<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

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

// RUTAS PROTEGIDAS POR AUTENTICACIÓN
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

        // RUTAS DE GESTION PARA LOS ADMINISTRADORES
        Route::group(['middleware' => function ($request, $next) {
            if (auth()->user()->rol !== 'Admin') {
                return redirect()->route('Inicio');
            }
            return $next($request);
        }], function () {
            Route::get('/gestion-productos', [ProductoController::class, 'adminIndex'])->name('gestion-productos');
            Route::post('/productos', [ProductoController::class, 'store']);
            Route::put('/productos/{id}', [ProductoController::class, 'update']);
            Route::delete('/productos/{id}', [ProductoController::class, 'destroy']);

            // Rutas para gestión de menús
            Route::get('/gestion-menu', [MenuController::class, 'index'])->name('admin.menu');
            Route::post('/menu', [MenuController::class, 'store'])->name('admin.menu.store');
            Route::put('/menu/{menu}', [MenuController::class, 'update'])->name('admin.menu.update');
            Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])->name('admin.menu.destroy');
        });
    });
});

// Ruta pública para ver el menú del día
Route::get('/menu-del-dia', [MenuController::class, 'menuDelDia'])->name('menu.dia');
Route::get('/menu/{date}', [MenuController::class, 'showMenuByDate'])->name('menu.date');
