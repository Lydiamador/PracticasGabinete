<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\Pedidos_LineasController;
use App\Http\Controllers\AgentesController;
use App\Http\Controllers\CaracteristicasArticulosController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatCategoriasController;

// RUTAS PARA EL FUNCIONAMIENTO DE PEDIDOS
// MOSTRAR TODOS LOS PEDIDOS
Route::get('/pedidos', [PedidosController::class, 'index']);
// MOSTRAR UN PEDIDO EN PARTICULAR
Route::get('/pedidos/{id}', [PedidosController::class, 'show']);
// CREAR UN NUEVO PEDIDO
Route::post('/pedidos', [PedidosController::class, 'store']);
// EDITAR UN PEDIDO EXISTENTE
Route::put('/pedidos/{id}', [PedidosController::class, 'update']);
// ELIMINAR UN PEDIDO
Route::delete('/pedidos/{id}', [PedidosController::class, 'destroy']);
// OBTENER TODOS LOS PEDIDOS DE UN CLIENTE
Route::get('/pedidos/cliente/{cliente_id}', [PedidosController::class, 'pedidosPorCliente']);

// RUTAS PARA EL FUNCIONAMIENTO DE LÍNEAS DE PEDIDOS
// MOSTRAR TODAS LAS LÍNEAS DE PEDIDOS
Route::get('/lineas', [Pedidos_LineasController::class, 'index']);
// MOSTRAR UNA LÍNEA DE PEDIDO EN PARTICULAR
Route::get('/lineas/{id}', [Pedidos_LineasController::class, 'show']);
// CREAR UNA NUEVA LÍNEA DE PEDIDO
Route::post('/lineas', [Pedidos_LineasController::class, 'store']);
// EDITAR UNA LÍNEA DE PEDIDO EXISTENTE
Route::put('/lineas/{id}', [Pedidos_LineasController::class, 'update']);
// ELIMINAR UNA LÍNEA DE PEDIDO
Route::delete('/lineas/{id}', [Pedidos_LineasController::class, 'destroy']);
// OBTENER TODAS LAS LÍNEAS DE PEDIDOS DE UN CLIENTE
Route::get('/lineas/cliente/{cliente_id}', [Pedidos_LineasController::class, 'lineasPedidoCliente']);
// OBTENER TODAS LAS LÍNEAS DE PEDIDOS DE UN PRODUCTO
Route::get('/lineas/producto/{producto_id}', [Pedidos_LineasController::class, 'lineasPedidoProducto']);
// OBTENER TODAS LAS LÍNEAS DE PEDIDOS DE UN PEDIDO EN PARTICULAR    
Route::get('/lineas/pedido/{id}', [Pedidos_LineasController::class, 'lineasPedido']);

// RUTAS PARA EL FUNCIONAMIENTO DE AGENTES
// MOSTRAR TODOS LOS AGENTES
Route::get('/agentes', [AgentesController::class, 'index']);
// MOSTRAR UN AGENTE EN PARTICULAR
Route::get('/agentes/{id}', [AgentesController::class, 'show']);
// CREAR UN NUEVO AGENTE
Route::post('/agentes', [AgentesController::class, 'store']);
// EDITAR UN AGENTE EXISTENTE
Route::put('/agentes/{id}', [AgentesController::class, 'update']);
// ELIMINAR UN AGENTE
Route::delete('/agentes/{id}', [AgentesController::class, 'destroy']);

// RUTAS PARA EL FUNCIONAMIENTO DE LAS CARACTERISTICAS DE ARTICULOS
// MOSTRAR TODAS LAS CARACTERISTICAS DE ARTICULOS
Route::get('/caracteristicas_articulos', [CaracteristicasArticulosController::class, 'index']);
// MOSTRAR UN ARTICULO EN PARTICULAR
Route::get('/caracteristicas_articulos/{id}', [CaracteristicasArticulosController::class, 'show']);
// CREAR UNA CARACTERISTICA DE ARTICULO
Route::post('/caracteristicas_articulos', [CaracteristicasArticulosController::class, 'store']);
// EDITAR UNA CARACTERISTICA DE ARTICULO
Route::put('/caracteristicas_articulos/{id}', [CaracteristicasArticulosController::class, 'update']);
// ELIMINAR UN ARTICULO 
Route::delete('/caracteristicas_articulos/{id}', [CaracteristicasArticulosController::class, 'destroy']);

// RUTAS PARA EL FUNCIONAMIENTO DEL CARRITO
// MOSTRAR TODOS LOS PRODUCTOS DEL CARRITO
Route::get('/cart', [CartController::class, 'index']);
// MOSTRAR UN PRODUCTO DEL CARRITO
Route::get('/cart/{id}', [CartController::class, 'show']);
// CREAR UN NUEVO PRODUCTO DEL CARRITO
Route::post('/cart', [CartController::class, 'store']);
// ACTUALIZAR UN PRODUCTO DEL CARRITO
Route::put('/cart/{id}', [CartController::class, 'update']);
// ELIMINAR UN PRODUCTO DEL CARRITO
Route::delete('/cart/{id}', [CartController::class, 'destroy']);

// RUTAS PARA EL FUNCIONAMIENTO DE LAS CATEGORIAS DEl CARRO
// LISTAR TODAS LAS CATEGORIAS DEL CARRO
Route::get('/cat_categorias', [CatCategoriasController::class, 'index']);
// LISTAR UNA CATEGORÍA SOLA DEL CARRO
Route::get('/cat_categorias/{id}', [CatCategoriasController::class, 'show']);
// CREAR UNA CATEGORÍA
Route::post('/cat_categorias', [CatCategoriasController::class, 'store']);
// ACTUALIZAR UNA CATEGORÍA
Route::put('/cat_categorias/{id}', [CatCategoriasController::class, 'update']);
// ELIMINAR UNA CATEGORÍA
Route::delete('/cat_categorias/{id}', [CatCategoriasController::class, 'destroy']);
// BUSCAR UNA CATEGORÍA ESPECIFICA EN TODOS LOS CARRITOS    
Route::get('/cat_categorias/search/{id}', [CatCategoriasController::class, 'search']);