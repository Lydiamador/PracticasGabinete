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
//Muestra todas las líneas de la tabla users.
Route::get('/users', [UserController::class, 'index'] );
//Creas un nuevo cliente.
Route::post('/users', [UserController::class, 'store'] );
//Modifica a un cliente en especifico.
Route::put('/users/{name}', [UserController::class, 'update'] );
//Elimina a un cliente de la tabla users en especifico
Route::delete('/users/{name}', [UserController::class, 'destroy'] );
//Busca a un cliente por nombre o usuclicod en la tabla users
Route::get('/users/search', [UserController::class, 'search'] );

//RUTAS DE LA TABLA USERS_GIF_POINTS
Route::get('/users_gif_points', [User_gif_points_Controller::class, 'index']);
Route::post('/users_gif_points', [User_gif_points_Controller::class, 'store']);
Route::put('/users_gif_points/{usuclicod}', [User_gif_points_Controller::class, 'update']);
Route::delete('/users_gif_points/{usuclicod}', [User_gif_points_Controller::class, 'destroy']);
Route::get('users_gif_points/search', [User_gif_points_Controller::class, 'search']);


//RUTAS DE LA TABLA USERS_LOG
Route::get('/users_log', [User_log_Controller::class, 'index']);
Route::post('/users_log',[User_log_Controller::class, 'store']);
Route::put('/users_log/{usuclicod}', [User_log_Controller::class, 'update']);
Route::delete('/users_log/{usuclicod',[User_log_Controller::class, 'destroy']);
Route::get('/users_log/search', [User_log_Controller::class, 'search']);

//RUTA DE LA TABAL USERS_QANET
Route::get('/users_qanet', [User_qanet_Controller::class, 'index']);
Route::post('/users_qanet',  [User_qanet_Controller::class, 'store']);
Route::put('/users_qanet/{ususclicod}', [User_qanet_Controller::class, 'update']);
Route::delete('/users_qanet/{usuclicod}', [User_qanet_Controller::class,'destroy']);
Route::get('/users_qanet/search', [User_qanet_Controller::class, 'search']);

//RUTAS DE LA TABLA USERS_SUPPORT
Route::get('/users_support', [User_support_Controller::class, 'index']);
Route::post('/users_support', [User_support_Controller::class, 'store']);
Route::put('/users_support', [User_support_Controller::class, 'update']);
Route::delete('/users_support', [User_support_Controller::class, 'destroy']);
Route::get('/users_support/search',[User_support_Controller::class, 'search']);
Route::get('/users_support/searchByEmpresaEstadoPendientes',[User_support_Controller::class, 'searchByEmpresaEstadoPendientes']);
Route::get('/users_support/searchByEmpresaEstadoRevision',[User_support_Controller::class, 'searchByEmpresaEstadoRevision']);
Route::get('/users_support/searchByEmpresaEstadoAtendido',[User_support_Controller::class, 'searchByEmpresaEstadoAtendido']);


//RUTAS DE LA TABLA USERS_SUPPORT_DETAILS
Route::get('/users_support_details', [User_support_details_Controller::class, 'index']);
Route::post('/users_support_details',[User_support_details_Controller::class, 'store']);
Route::put('/users_support_details', [User_support_details_Controller::class, 'update']);
Route::delete('/users_support_details', [User_support_details_Controller::class, 'destroy']);
Route::get('/users_support_details/search', [User_support_details_Controller::class , 'search']);

//RUTAS DE LA TABLA QTARIFA
Route::get('/qtarifa', [q_tarifa_Controller::class, 'index']);
Route::post('/qtarifa', [q_tarifa_Controller::class, 'strore']);
Route::put('/qtarifa/{tarnom}', [q_tarifa_Controller::class, 'update']);
Route::delete('/qtaifa/{tarnom}', [q_tarifa_Controller::class, 'destroy']);
Route::get('/qtarifa/search', [q_tarifa_Controller::class, 'search']);

//RUTAS DE LA TABLA QOFERTAC
Route::get('/qofertac', [q_ofertac_Controller::class, 'index']);
Route::post('/qofertac', [q_ofertac_Controller::class, 'store']);
Route::put('/qofertac/{ofccod}', [q_ofertac_Controller::class, 'update']);
Route::delete('/qofertac/{ofccod}',[q_ofertac_Controller::class, 'destroy']);
Route::get('/qofertac/search', [q_ofertac_Controller::class,'search']);

//RUTAS DE LA TABLA QMARCA
Route::get('/qmarca',[q_marca_Controller::class, 'index']);
Route::post('/qmarca',[q_marca_Controller::class, 'store']);
Route::put('/qmarca/{name}', [q_marca_Controller::class, 'update']);
Route::delete('/qmarca/{name}', [q_marca_Controller::class, 'destroy']);
Route::get('/qmarca/search', [q_marca_Controller::class , 'search']);

//RUTAS DE LA TABLA QETIQUETA
Route::get('/qetiqueta', [q_etiqueta_Controller::class, 'index']);
Route::post('/qetiqueta', [q_etiqueta_Controller::class, 'strore']);
Route::put('/qetiqueta/{tagnom}', [q_etiqueta_Controller::class, 'update']);
Route::delete('/qetiqueta/{tagnom}', [q_etiqueta_Controller::class, 'destroy']);
Route::get('/qetiqueta/search', [q_etiqueta_Controller::class, 'search']);

//RUTAS DE LA TABLA QDOCUMENTO_FICHERO
Route::apiResource('qdocumento_fichero', q_documento_fichero_Controller::class);

//RUTAS DE LA TABLA QDOCUMENTO
Route::apiResource('qdocumento', q_documento_Controller::class);

//RUTASDE LA TABLA QCATEGORIA
Route::apiResource('qcategoria', q_categoria_Controller::class);

//RUTAS DE LA TABLA QARTICULO
Route::get('/qarticulo', [q_articulo_Controller::class, 'index']);
Route::post('/qarticulo', [q_articulo_Controller::class, 'store']);
Route::put('/qarticulo/{artnom}', [q_articulo_Controller::class, 'update']);
Route::delete('/qarticulo/{artnom}', [q_articulo_Controller::class, 'destroy']);
Route::get('/qarticulo/search', [q_articulo_Controller::class, 'search']);




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