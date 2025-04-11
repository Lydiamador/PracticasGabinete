<?php

//<<<<<<< HEAD
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\Pedidos_LineasController;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\User_support_details_Controller;
use App\Http\Controllers\Api\User_support_Controller;
use App\Http\Controllers\Api\User_log_Controller;
use App\Http\Controllers\Api\User_qanet_Controller;
use App\Http\Controllers\Api\User_gif_points_Controller;
use App\Http\Controllers\Api\q_tarifa_Controller;
use App\Http\Controllers\Api\q_ofertac_Controller;
use App\Http\Controllers\Api\q_marca_Controller;
use App\Http\Controllers\Api\q_etiqueta_Controller;
use App\Http\Controllers\Api\q_documento_Controller;
use App\Http\Controllers\Api\q_documento_fichero_Controller;
use App\Http\Controllers\Api\q_categoria_Controller;
use App\Http\Controllers\Api\q_articulo_Controller;
use App\Http\Controllers\Api\q_articulo_barra_Controller;
use App\Http\Controllers\Api\q_articulo_etiqueta_Controller;
use App\Http\Controllers\Api\q_articulo_precio_Controller;
use App\Http\Controllers\Api\q_articulo_imagen_Controller;
use App\Http\Controllers\Api\qanet_representante_Controller;
use App\Http\Controllers\Api\qanet_pedidos_Controller;
use App\Http\Controllers\Api\qanet_pedidos_lineas_Controller;
use App\Http\Controllers\Api\qanet_parametro2_Controller;
use App\Http\Controllers\Api\qanet_palet_Controller;
use App\Http\Controllers\Api\qanet_oferta_express_Controller;
use App\Http\Controllers\Api\qanet_listaprecios_Controller;
use App\Http\Controllers\Api\qanet_familiaqtpv_Controller;

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

//RUTAS DE LA TABLA USERS
Route::apiResource('users', UserController::class);

//RUTAS DE LA TABLA USERS_GIF_POINTS
Route::apiResource('users_gif_points', User_gif_points_Controller::class);

//RUTAS DE LA TABLA USERS_LOG
Route::apiResource('users_log', User_log_Controller::class);

//RUTA DE LA TABAL USERS_QANET
Route::apiResource('users_qanet', User_qanet_Controller::class);

//RUTAS DE LA TABLA USERS_SUPPORT
Route::apiResource('users_support', User_support_Controller::class);

//RUTAS DE LA TABLA USERS_SUPPORT_DETAILS
Route::apiResource('users_support_details', User_support_details_Controller::class);

//RUTAS DE LA TABLA QTARIFA
Route::apiResource('qtarifa', q_tarifa_Controller::class);

//RUTAS DE LA TABLA QOFERTAC
Route::apiResource('qofertac', q_ofertac_Controller::class);

//RUTAS DE LA TABLA QMARCA
Route::apiResource('qmarca', q_marca_Controller::class);

//RUTAS DE LA TABLA QETIQUETA
Route::apiResource('qetiqueta', q_etiqueta_Controller::class);

//RUTAS DE LA TABLA QDOCUMENTO_FICHERO
Route::apiResource('qdocumento_fichero', q_documento_fichero_Controller::class);

//RUTAS DE LA TABLA QDOCUMENTO
Route::apiResource('qdocumento', q_documento_Controller::class);

//RUTASDE LA TABLA QCATEGORIA
Route::apiResource('qcategoria', q_categoria_Controller::class);

//RUTAS DE LA TABLA QARTICULO
Route::apiResource('qarticulo', q_articulo_Controller::class);
//RUTAS DE LA TABLA QARTICULO_BARRA
Route::apiResource('qarticulo_barra', q_articulo_barra_Controller::class);
//RUTAS DE LA TABLA QARTICULO_ETIQUETA
Route::apiResource('qarticulo_etiqueta', q_articulo_etiqueta_Controller::class);

//RUTAS DE LA TABLA QARTICULO_IMAGEN
Route::apiResource('qarticulo_imagen', q_articulo_imagen_Controller::class);

//RUTAS DE LA TABLA QARTICULO_PRECIO
Route::apiResource('qarticulo_precio', q_articulo_precio_Controller::class);

//RUTAS DE LA TABLA QANET_REPRESENTANTES
Route::apiResource('qanet_representante', qanet_representante_Controller::class);
//RUTAS DE LA TABLA QANET_PEDIDOS
Route::apiResource('qanet_pedidos', qanet_pedidos_Controller::class);
//RUTAS DE LA TABLA QANET_PEDIDOS_LINEAS
Route::apiResource('qanet_pedidos_lineas', qanet_pedidos_lineas_Controller::class);
//RUTAS DE LA TABLA QANET_PARAMETRO2
Route::apiResource('qanet_parametro2',qanet_parametro2_Controller::class);

//RUTAS DE LA TABLA QANET_PALET
Route::apiResource('qanet_palet', qanet_palet_Controller::class);

//RUTAS DE LA TABLA QANET_OFERTAS_EXPRESS
Route::apiResource('qanet_oferta_express', qanet_oferta_express_Controller::class);
//RUTAS DE LA TABLA QANET_LISTAPRECIOS
Route::apiResource('qanet_listaprecios', qanet_listaprecios_Controller::class);
//RUTAS DE LA TABLA FAMILIAQTPV
Route::apiResource('qanet_familiaqtpv', qanet_familiaqtpv_Controller::class);