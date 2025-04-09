<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidosController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pedidos', [PedidosController::class, 'index']);
Route::get('/pedidos/cliente/{cliente_id}', [PedidosController::class, 'pedidosPorCliente']);



