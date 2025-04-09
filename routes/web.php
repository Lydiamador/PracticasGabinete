<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\Pedidos_LineasController;
Route::get('/', function () {
    return view('welcome');
});

// RUTAS PARA EL FUNCIONAMINETO DE PEDIDOS
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

// RUTAS PARA EL FUNCIONAMINETO DE LINEAS DE PEDIDOS
// MOSTRAR TODOS LAS LINEAS DE PEDIDOS
Route::get('/lineas', [Pedidos_LineasController::class, 'index']);
// MOSTRAR UNA LINEA DE PEDIDO EN PARTICULAR
Route::get('/lineas/{id}', [Pedidos_LineasController::class, 'show']);
// CREAR UNA NUEVA LINEA DE PEDIDO
Route::post('/lineas', [Pedidos_LineasController::class, 'store']);
// EDITAR UNA LINEA DE PEDIDO EXISTENTE
Route::put('/lineas/{id}', [Pedidos_LineasController::class, 'update']);
// ELIMINAR UNA LINEA DE PEDIDO
Route::delete('/lineas/{id}', [Pedidos_LineasController::class, 'destroy']);
// OBTENER TODOS LAS LINEAS DE PEDIDOS DE UN CLIENTE
Route::get('/lineas/cliente/{cliente_id}', [Pedidos_LineasController::class, 'lineasPedidoCliente']);
// OBTENER TODOS LAS LINEAS DE PEDIDOS DE UN PRODUCTO
Route::get('/lineas/producto/{producto_id}', [Pedidos_LineasController::class, 'lineasPedidoProducto']);
// OBTENER TODOS LAS LINEAS DE PEDIDOS DE UN PEDIDO EN PARTICULAR    
Route::get('/lineas/pedido/{id}', [Pedidos_LineasController::class, 'lineasPedido']);



