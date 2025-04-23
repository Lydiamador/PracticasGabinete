<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\Pedidos_LineasController;
use App\Http\Controllers\AgentesController;
use App\Http\Controllers\CaracteristicasArticulosController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatCategoriasController;
use App\Http\Controllers\CatProductosController;
use App\Http\Controllers\CatProdVariantesController;
use App\Http\Controllers\CatTarifaController;
use App\Http\Controllers\ClientesDireccionesController;
use App\Http\Controllers\FavoritosController;
use App\Http\Controllers\GiftPointsController;
use App\Http\Controllers\PasswordResetTokenController;
use App\Http\Controllers\Qanet_ArticuloController;
use App\Http\Controllers\Qanet_ArticuloBarController;
use App\Http\Controllers\Qanet_ArticuloIdiController;
use App\Http\Controllers\Qanet_ArticuloingController;
use App\Http\Controllers\Qanet_ArticuloqtpvController;
use App\Http\Controllers\QanetCajaController;
use App\Http\Controllers\QanetClienteController;
use App\Http\Controllers\QanetCliente_AgendaController;
use App\Http\Controllers\Qanet_ClienteArticuloController;
use App\Http\Controllers\Qanet_ClienteCategoriaController;
use App\Http\Controllers\Qanet_ClienteGrupoController;
use App\Http\Controllers\Qanet_DelegacionController;
use App\Http\Controllers\Qanet_EstadisticaController;
use App\Http\Controllers\Qanet_ExtraController;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User_support_details_Controller;
use App\Http\Controllers\User_support_Controller;
use App\Http\Controllers\User_log_Controller;
use App\Http\Controllers\User_qanet_Controller;
use App\Http\Controllers\User_gif_points_Controller;
use App\Http\Controllers\q_tarifa_Controller;
use App\Http\Controllers\q_marca_Controller;
use App\Http\Controllers\q_etiqueta_Controller;
use App\Http\Controllers\q_documento_Controller;
use App\Http\Controllers\q_documento_fichero_Controller;
use App\Http\Controllers\q_categoria_Controller;
use App\Http\Controllers\q_articulo_Controller;
use App\Http\Controllers\q_articulo_barra_Controller;
use App\Http\Controllers\q_articulo_etiqueta_Controller;
use App\Http\Controllers\q_articulo_precio_Controller;
use App\Http\Controllers\q_articulo_imagen_Controller;
use App\Http\Controllers\qanet_representante_Controller;
use App\Http\Controllers\qanet_pedidos_Controller;
use App\Http\Controllers\qanet_pedidos_lineas_Controller;
use App\Http\Controllers\qanet_parametro2_Controller;
use App\Http\Controllers\qanet_palet_Controller;
use App\Http\Controllers\qanet_oferta_express_Controller;
use App\Http\Controllers\qanet_listaprecios_Controller;
use App\Http\Controllers\qanet_familiaqtpv_Controller;
use App\Http\Controllers\AuthController;

// RUTAS PARA EL FUNCIONAMIENTO DE PEDIDOS
// MOSTRAR TODOS LOS PEDIDOS
Route::get('/pedidos', [PedidosController::class, 'index']);
// MOSTRAR UN PEDIDO EN PARTICULAR
Route::get('/pedidos/{id}', [PedidosController::class, 'show']);
Route::get('/pedidos/cliente/{cliente_id}', [PedidosController::class, 'showByCliente']);
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
Route::get('/lineas/{pedido_id}', [Pedidos_LineasController::class, 'showByPedido']);
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
Route::get('/agentes/{name}', [AgentesController::class, 'showByName']);
Route::get('/agentes/{email}', [AgentesController::class, 'showByEmail']);
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
Route::get('/caracteristicas_articulos/{articulo_artcod}', [CaracteristicasArticulosController::class, 'showByCodArticulo']);
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
Route::get('/cart/{cartcod}', [CartController::class, 'show']);
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
Route::get('/cat_categorias/{nombre_es}', [CatCategoriasController::class, 'showbyNombre']);

// CREAR UNA CATEGORÍA
Route::post('/cat_categorias', [CatCategoriasController::class, 'store']);
// ACTUALIZAR UNA CATEGORÍA
Route::put('/cat_categorias/{id}', [CatCategoriasController::class, 'update']);
// ELIMINAR UNA CATEGORÍA
Route::delete('/cat_categorias/{id}', [CatCategoriasController::class, 'destroy']);
// BUSCAR UNA CATEGORÍA ESPECIFICA EN TODOS LOS CARRITOS    
Route::get('/cat_categorias/search/{id}', [CatCategoriasController::class, 'search']);

// RUTAS PARA EL FUNCIONAMIENTO DE LOS PRODUCTOS EN EL CARRO
// LISTAR TODOS LOS PRODUCTOS DEL CARRO
Route::get('/Cat_productos', [CatProductosController::class, 'index']);
// LISTAR UN PRODUCTO SOLA DEL CARRO
Route:: get('/Cat_productos/{id}', [CatProductosController::class, 'show']);
// CREAR UN PRODUCTO EN EL CARRO
Route::post('/Cat_productos', [CatProductosController::class, 'store']);
// ACTUALIZAR UN PRODUCTO EN EL CARRO
Route::put('/Cat_productos/{id}', [CatProductosController::class, 'update']);
// ELIMINAR UN PRODUCTO EN EL CARRO
Route::delete('/Cat_productos/{id}', [CatProductosController::class, 'destroy']);

// RUTAS PARA EL FUNCIONAMIENTO DE LAS VARIANTES DE PRODUCTOS
// MOSTRAR TODOS LOS VARIANTES DEL PRODUCTO
Route::get('/Cat_productos_variantes/{id}', [CatProdVariantesController::class, 'index']);
// MOSTRAR UNA VARIANTE DEL PRODUCTO
Route::get('/Cat_productos_variantes/{id}/{variante}', [CatProdVariantesController::class, 'show']);
Route::get('/Cat_productos_variantes/{id_producto}', [CatProdVariantesController::class, 'showbyProducto']);

// CREAR UNA VARIANTE DE PRODUCTO    
Route::post('/Cat_productos_variantes/{id}', [CatProdVariantesController::class, 'store']);
// ACTUALIZAR UNA VARIANTE DE PRODUCTO
Route::put('/Cat_productos_variantes/{id}/{variante}', [CatProdVariantesController::class, 'update']);
// ELIMINAR UNA VARIANTE DE PRODUCTO
Route::delete('/Cat_productos_variantes/{id}/{variante}', [CatProdVariantesController::class, 'destroy']);

// RUTAS PARA EL FUNCIONAMIENTO DE LAS TARIFAS
// MOSTRAR TODAS LAS TARIFAS
Route::get('/Cat_tarifas', [CatTarifaController::class, 'index']);
// MOSTRAR UNA TARIFA
Route::get('/Cat_tarifas/{id}', [CatTarifaController::class, 'show']);
Route::get('/Cat_tarifas/{Nombre}', [CatTarifaController::class, 'showByName']);
// CREAR UNA TARIFA
Route::post('/Cat_tarifas', [CatTarifaController::class, 'store']);
// ACTUALIZAR UNA TARIFA
Route::put('/Cat_tarifas/{id}', [CatTarifaController::class, 'update']);
// ELIMINAR UNA TARIFA
Route::delete('/Cat_tarifas/{id}', [CatTarifaController::class, 'destroy']);

// RUTAS PARA EL FUNCIONAMIENTO DE LAS DIRECCIONES DE CLIENTES
// MOSTRAR TODAS LAS DIRECCIONES DE CLIENTES
Route::get('/Clientes_direcciones', [ClientesDireccionesController::class, 'index']);
// MOSTRAR UNA DIRECCIÓN DE CLIENTE
Route::get('/Clientes_direcciones/{id}', [ClientesDireccionesController::class, 'show']);
Route::get('/Clientes_direcciones/{dirtfno1}', [ClientesDireccionesController::class, 'showByTelefono']);
// CREAR UNA DIRECCIÓN DE CLIENTE
Route::post('/Clientes_direcciones', [ClientesDireccionesController::class, 'store']);
// ACTUALIZAR UNA DIRECCIÓN DE CLIENTE
Route::put('/Clientes_direcciones/{id}', [ClientesDireccionesController::class, 'update']);
// ELIMINAR UNA DIRECCIÓN DE CLIENTE
Route::delete('/Clientes_direcciones/{id}', [ClientesDireccionesController::class, 'destroy']);

// RUTAS PARA EL FUNCIONAMIENTO DE LOS FAVORITOS
// MOSTRAR TODOS LOS FAVORITOS DE TODOS LOS USUARIOS
Route::get('/Favoritos', [FavoritosController::class, 'index']);
// MOSTRAR LOS FAVORITOS DE UN USUARIO ESPECIFICO
Route::get('/Favoritos/{id}', [FavoritosController::class, 'show']);
// CREAR UN NUEVO FAVORITO
Route::post('/Favoritos', [FavoritosController::class, 'store']);
// ACTUALIZAR UN FAVORITO
Route::put('/Favoritos/{id}', [FavoritosController::class, 'update']);
// ELIMINAR UN FAVORITO
Route::delete('/Favoritos/{id}', [FavoritosController::class, 'destroy']);

// RUTAS PARA EL FUNCIONAMIENTO DE LOS GIFTPOINTS
// MOSTRAR TODOS LOS GIFTPOINTS
Route::get('/GiftPoints', [GiftPointsController::class, 'index']);
// MOSTRAR UN GIFTPOINT
Route::get('/GiftPoints/{id}', [GiftPointsController::class, 'show']);
Route::get('/GiftPoints/{codigo}', [GiftPointsController::class, 'showByCodigo']);
// CREAR UN GIFTPOINT
Route::post('/GiftPoints', [GiftPointsController::class, 'store']);
// ACTUALIZAR UN GIFTPOINT
Route::put('/GiftPoints/{id}', [GiftPointsController::class, 'update']);
// ELIMINAR UN GIFTPOINT
Route::delete('/GiftPoints/{id}', [GiftPointsController::class, 'destroy']);

// RUTAS PARA EL FUNCIONAMIENTO DE LOS TOKENS DE RECUPERACION DE CONTRASEÑA
// MOSTRAR TODOS LOS TOKENS DE RECUPERACION DE CONTRASEÑA
Route::get('/PasswordResetToken', [PasswordResetTokenController::class, 'index']);
// MOSTRAR UN TOKEN DE RECUPERACION DE CONTRASEÑA
Route::get('/PasswordResetToken/{id}', [PasswordResetTokenController::class, 'show']);
// CREAR UN TOKEN DE RECUPERACION DE CONTRASEÑA
Route::post('/PasswordResetToken', [PasswordResetTokenController::class, 'store']);
// ACTUALIZAR UN TOKEN DE RECUPERACION DE CONTRASEÑA    
Route::put('/PasswordResetToken/{id}', [PasswordResetTokenController::class, 'update']);
// ELIMINAR UN TOKEN DE RECUPERACION DE CONTRASEÑA
Route::delete('/PasswordResetToken/{id}', [PasswordResetTokenController::class, 'destroy']);

//RUTAS PARA EL CONTROLADOR DE ARTICULOS
//MOSTRAR TODOS LOS ARTICULOS
Route::get('/Qanet_Articulo', [Qanet_ArticuloController::class, 'index']);
//MOSTRAR UN ARTICULO
Route::get('/Qanet_Articulo/{id}', [Qanet_ArticuloController::class, 'show']);
//CREAR ARTICULO
Route::post('/Qanet_Articulo', [Qanet_ArticuloController::class, 'store']);
//ACTUALIZAR ARTICULO    
Route::put('/Qanet_Articulo/{id}', [Qanet_ArticuloController::class, 'update']);
//ELIMINAR ARTICULO     
Route::delete('/Qanet_Articulo/{id}', [Qanet_ArticuloController::class, 'destroy']);

// RUTAS PARA EL CONTROLADOR DE ARTICULOS BAR
// MOSTRAR TODOS LOS ARTICULOS BAR
Route::get('/Qanet_ArticuloBar', [Qanet_ArticuloBarController::class, 'index']);
// MOSTRAR UN ARTICULO BAR
Route::get('/Qanet_ArticuloBar/{id}', [Qanet_ArticuloBarController::class, 'show']);
// CREAR ARTICULO BAR
Route::post('/Qanet_ArticuloBar', [Qanet_ArticuloBarController::class, 'store']);
// ACTUALIZAR ARTICULO BAR
Route::put('/Qanet_ArticuloBar/{id}', [Qanet_ArticuloBarController::class, 'update']);
// ELIMINAR ARTICULO BAR
Route::delete('/Qanet_ArticuloBar/{id}', [Qanet_ArticuloBarController::class, 'destroy']);

// RUTAS PARA EL CONTROLADOR DE ARTICULOS IDI
// MOSTRAR TODOS LOS ARTICULOS IDI
Route::get('/Qanet_ArticuloIdi', [Qanet_ArticuloIdiController::class, 'index']);
// MOSTRAR UN ARTICULO IDI
Route::get('/Qanet_ArticuloIdi/{id}', [Qanet_ArticuloIdiController::class, 'show']);
// CREAR ARTICULO IDI   
Route::post('/Qanet_ArticuloIdi', [Qanet_ArticuloIdiController::class, 'store']);
// ACTUALIZAR ARTICULO IDI  
Route::put('/Qanet_ArticuloIdi/{id}', [Qanet_ArticuloIdiController::class, 'update']);
// ELIMINAR ARTICULO IDI   
Route::delete('/Qanet_ArticuloIdi/{id}', [Qanet_ArticuloIdiController::class, 'destroy']);

// RUTAS PARA EL CONTROLADOR DE ARTICULOS ING
// MOSTRAR TODOS LOS ARTICULOS ING
Route::get('/Qanet_Articuloing', [Qanet_ArticuloingController::class, 'index']);
// MOSTRAR UN ARTICULO ING
Route::get('/Qanet_Articuloing/{id}', [Qanet_ArticuloingController::class, 'show']);
// CREAR ARTICULO ING
Route::post('/Qanet_Articuloing', [Qanet_ArticuloingController::class, 'store']);
// ACTUALIZAR ARTICULO ING
Route::put('/Qanet_Articuloing/{id}', [Qanet_ArticuloingController::class, 'update']);
// ELIMINAR ARTICULO ING
Route::delete('/Qanet_Articuloing/{id}', [Qanet_ArticuloingController::class, 'destroy']);

// RUTAS PARA EL CONTROLADOR DE ARTICULOS QTPV
// MOSTRAR TODOS LOS ARTICULOS QTPV
Route::get('/Qanet_Articuloqtpv', [Qanet_ArticuloqtpvController::class, 'index']);
// MOSTRAR UN ARTICULO QTPV
Route::get('/Qanet_Articuloqtpv/{id}', [Qanet_ArticuloqtpvController::class, 'show']);
// CREAR ARTICULO QTPV
Route::post('/Qanet_Articuloqtpv', [Qanet_ArticuloqtpvController::class, 'store']);
// ACTUALIZAR ARTICULO QTPV
Route::put('/Qanet_Articuloqtpv/{id}', [Qanet_ArticuloqtpvController::class, 'update']);
// ELIMINAR ARTICULO QTPV   
Route::delete('/Qanet_Articuloqtpv/{id}', [Qanet_ArticuloqtpvController::class, 'destroy']);

// RUTAS PARA EL CONTROLADOR DE CAJAS
// MOSTRAR TODOS LOS CAJAS
Route::get('/Qanet_Caja', [QanetCajaController::class, 'index']);
// MOSTRAR UN CAJA
Route::get('/Qanet_Caja/{id}', [QanetCajaController::class, 'show']);
Route::get('/Qanet_Caja/{cajcod}', [QanetCajaController::class, 'showByCodigoCaj']);
// CREAR CAJA
Route::post('/Qanet_Caja', [QanetCajaController::class, 'store']);
// ACTUALIZAR CAJA
Route::put('/Qanet_Caja/{id}', [QanetCajaController::class, 'update']);
// ELIMINAR CAJA
Route::delete('/Qanet_Caja/{id}', [QanetCajaController::class, 'destroy']);

// RUTAS PARA EL CONTROLADOR DE CLIENTES QANET
// MOSTRAR TODOS LOS CLIENTES QANET
Route::get('/Qanet_Cliente', [QanetClienteController::class, 'index']);
// MOSTRAR UN CLIENTE QANET
Route::get('/Qanet_Cliente/{id}', [QanetClienteController::class, 'show']);
Route::get('/Qanet_Cliente/{clicod}', [QanetClienteController::class, 'showByCodigoCliente']);
// CREAR CLIENTE QANET
Route::post('/Qanet_Cliente', [QanetClienteController::class, 'store']);
// ACTUALIZAR CLIENTE QANET
Route::put('/Qanet_Cliente/{id}', [QanetClienteController::class, 'update']);
// ELIMINAR CLIENTE QANET
Route::delete('/Qanet_Cliente/{id}', [QanetClienteController::class, 'destroy']);

// RUTAS PARA EL CONTROLADOR DE AGENDA DE CLIENTES QANET
// MOSTRAR TODOS LA AGENDA DE CLIENTES QANET
Route::get('/QanetCliente_Agenda', [QanetCliente_AgendaController::class, 'index']);
// MOSTRAR LA AGENDA DE CLIENTES QANET
Route::get('/QanetCliente_Agenda/{id}', [QanetCliente_AgendaController::class, 'show']);
Route::get('/QanetCliente_Agenda/{ageclicod}', [QanetCliente_AgendaController::class, 'showByCodigoCliente']);

// CREAR AGENDA DE CLIENTES QANET
Route::post('/QanetCliente_Agenda', [QanetCliente_AgendaController::class, 'store']);
// ACTUALIZAR AGENDA DE CLIENTES QANET
Route::put('/QanetCliente_Agenda/{id}', [QanetCliente_AgendaController::class, 'update']);
// ELIMINAR AGENDA DE CLIENTES QANET
Route::delete('/QanetCliente_Agenda/{id}', [QanetCliente_AgendaController::class, 'destroy']);

// RUTAS PARA EL CONTROLADOR DE ARTICULOS DE CLIENTES QANET
// MOSTRAR TODOS LOS ARTICULOS DE CLIENTES QANET
Route::get('/Qanet_Cliente_Articulo', [Qanet_ClienteArticuloController::class, 'index']);
// MOSTRAR ARTICULO DE CLIENTES QANET
Route::get('/Qanet_Cliente_Articulo/{id}', [Qanet_ClienteArticuloController::class, 'show']);
// CREAR ARTICULO DE CLIENTES QANET
Route::post('/Qanet_Cliente_Articulo', [Qanet_ClienteArticuloController::class, 'store']);
// ACTUALIZAR ARTICULO DE CLIENTES QANET
Route::put('/Qanet_Cliente_Articulo/{id}', [Qanet_ClienteArticuloController::class, 'update']);
// ELIMINAR ARTICULO DE CLIENTES QANET
Route::delete('/Qanet_Cliente_Articulo/{id}', [Qanet_ClienteArticuloController::class, 'destroy']);

//RUTAS PARA EL CONTROLADOR DE CATEGORIAS DE CLIENTES QANET
// MOSTRAR TODOS LAS QANET CATEGORIAS DE LOS CLIENTES
Route::get('/Qanet_Cliente_Categoria', [Qanet_ClienteCategoriaController::class, 'index']);
// MOSTRAR UNA CATEGORIA DE CLIENTES QANET
Route::get('/Qanet_Cliente_Categoria/{id}', [Qanet_ClienteCategoriaController::class, 'show']);
// CREAR UNA CATEGORIA DE CLIENTES QANET
Route::post('/Qanet_Cliente_Categoria', [Qanet_ClienteCategoriaController::class, 'store']);
// ACTUALIZAR UNA CATEGORIA DE CLIENTES QANET
Route::put('/Qanet_Cliente_Categoria/{id}', [Qanet_ClienteCategoriaController::class, 'update']);
// ELIMINAR UNA CATEGORIA DE CLIENTES QANET
Route::delete('/Qanet_Cliente_Categoria/{id}', [Qanet_ClienteCategoriaController::class, 'destroy']);

// RUTAS PARA EL CONTROLADOR DE GRUPOS DE CLIENTES QANET
// MOSTRAR TODOS LOS GRUPOS DE CLIENTES QANET
Route::get('/Qanet_Cliente_Grupo', [Qanet_ClienteGrupoController::class, 'index']);
// MOSTRAR UN GRUPO DE CLIENTES QANET
Route::get('/Qanet_Cliente_Grupo/{id}', [Qanet_ClienteGrupoController::class, 'show']);
// CREAR UN GRUPO DE CLIENTES QANET
Route::post('/Qanet_Cliente_Grupo', [Qanet_ClienteGrupoController::class, 'store']);
// ACTUALIZAR UN GRUPO DE CLIENTES QANET
Route::put('/Qanet_Cliente_Grupo/{id}', [Qanet_ClienteGrupoController::class, 'update']);
// ELIMINAR UN GRUPO DE CLIENTES QANET
Route::delete('/Qanet_Cliente_Grupo/{id}', [Qanet_ClienteGrupoController::class, 'destroy']);

// RUTAS PARA EL CONTROLADOR DE DELEGACIONES
// MOSTRAR TODOS LAS DELEGACIONES
Route::get('/Qanet_Delegacion', [Qanet_DelegacionController::class, 'index']);
// MOSTRAR UNA DELEGACIÓN
Route::get('/Qanet_Delegacion/{delcod}', [Qanet_DelegacionController::class, 'show']);
Route::get('/Qanet_Delegacion/{delnom}', [Qanet_DelegacionController::class, 'showByNombre']);

// CREAR UNA DELEGACIÓN
Route::post('/Qanet_Delegacion', [Qanet_DelegacionController::class, 'store']);
// ACTUALIZAR UNA DELEGACIÓN
Route::put('/Qanet_Delegacion/{id}', [Qanet_DelegacionController::class, 'update']);
// ELIMINAR UNA DELEGACIÓN
Route::delete('/Qanet_Delegacion/{id}', [Qanet_DelegacionController::class, 'destroy']);

// RUTAS PARA EL CONTROLADOR DE ESTADISTICAS
// MOSTRAR TODOS LAS ESTADISTICAS
Route::get('/Qanet_Estadistica', [Qanet_EstadisticaController::class, 'index']);
// MOSTRAR UNA ESTADISTICA
Route::get('/Qanet_Estadistica/{id}', [Qanet_EstadisticaController::class, 'show']);
// CREAR UNA ESTADISTICA    
Route::post('/Qanet_Estadistica', [Qanet_EstadisticaController::class, 'store']);
// ACTUALIZAR UNA ESTADISTICA
Route::put('/Qanet_Estadistica/{id}', [Qanet_EstadisticaController::class, 'update']);
// ELIMINAR UNA ESTADISTICA
Route::delete('/Qanet_Estadistica/{id}', [Qanet_EstadisticaController::class, 'destroy']);

// RUTAS PARA EL CONTROLADOR DE EXTRAS
// MOSTRAR TODOS LOS EXTRAS
Route::get('/Qanet_Extra', [Qanet_ExtraController::class, 'index']);
// MOSTRAR UN EXTRA
Route::get('/Qanet_Extra/{extcod}', [Qanet_ExtraController::class, 'show']);
Route::get('/Qanet_Extra/{extnom}', [Qanet_ExtraController::class, 'showByNombre']);

// CREAR UN EXTRA
Route::post('/Qanet_Extra', [Qanet_ExtraController::class, 'store']);
// ACTUALIZAR UN EXTRA
Route::put('/Qanet_Extra/{id}', [Qanet_ExtraController::class, 'update']);
// ELIMINAR UN EXTRA    
Route::delete('/Qanet_Extra/{id}', [Qanet_ExtraController::class, 'destroy']);



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
Route::get('/qdocumento_fichero', [q_documento_fichero_Controller::class, 'index']);
Route::post('/qdocumento_fichero', [q_documento_fichero_Controller::class, 'strore']);
Route::put('/qdocumento_fichero/{qdocumento_id}', [q_documento_fichero_Controller::class, 'update']);
Route::delete('/qdocumento_fichero/{qdocumento_id}', [q_documento_fichero_Controller::class, 'destroy']);
Route::get('/qdocumento_fichero/search', [q_documento_fichero_Controller::class, 'search']);


//RUTAS DE LA TABLA QDOCUMENTO
Route::get('/qdocumento', [q_documento_Controller::class, 'index']);
Route::post('/qdocumento', [q_documento_fichero_Controller::class, 'strore']);
Route::put('/qdocumento/{docnum}', [q_documento_fichero_Controller::class, 'update']);
Route::delete('/qdocumento/{docnum}', [q_documento_fichero_Controller::class, 'destroy']);
Route::get('/qdocumento/search', [q_documento_fichero_Controller::class, 'search']);

//RUTASDE LA TABLA QCATEGORIA
Route::get('/qcategoria', [q_categoria_Controller::class, 'index']);
Route::post('/qcategoria', [q_categoria_Controller::class, 'store']);
Route::put('/qcategoria/{catnom}', [q_categoria_Controller::class, 'update']);
Route::delete('/qcategoria/{catnom}', [q_categoria_Controller::class, 'destroy']);
Route::get('/qcategoria/search', [q_categoria_Controller::class, 'search']);

//RUTAS DE LA TABLA QARTICULO
Route::get('/qarticulo', [q_articulo_Controller::class, 'index']);
Route::post('/qarticulo', [q_articulo_Controller::class, 'store']);
Route::put('/qarticulo/{artnom}', [q_articulo_Controller::class, 'update']);
Route::delete('/qarticulo/{artnom}', [q_articulo_Controller::class, 'destroy']);
Route::get('/qarticulo/search', [q_articulo_Controller::class, 'search']);

//RUTAS DE LA TABLA QARTICULO_BARRA
Route::get('/qarticulo_barra', [q_articulo_barra_Controller::class, 'index']);
Route::post('/qarticulo_barra', [q_articulo_barra_Controller::class, 'store']);
Route::put('/qarticulo_barra/{barcod}', [q_articulo_barra_Controller::class, 'update']);
Route::delete('/qarticulo_barra/{barcod}', [q_articulo_barra_Controller::class, 'destroy']);
Route::get('/qarticulo_barra/search', [q_articulo_barra_Controller::class, 'search']);

//RUTAS DE LA TABLA QARTICULO_ETIQUETA
Route::get('/qarticulo_etiqueta', [q_articulo_etiqueta_Controller::class, 'index']);
Route::post('/qarticulo_etiqueta', [q_articulo_etiqueta_Controller::class, 'store']);
Route::put('/qarticulo_etiqueta/{etiartcod}', [q_articulo_etiqueta_Controller::class, 'update']);
Route::delete('/qarticulo_etiqueta/{etiartcod}', [q_articulo_etiqueta_Controller::class, 'destroy']);
Route::get('/qarticulo_etiqueta/search', [q_articulo_etiqueta_Controller::class, 'search']);

//RUTAS DE LA TABLA QARTICULO_IMAGEN
Route::get('/qarticulo_imagen', [q_articulo_imagen_Controller::class, 'index']);
Route::post('/qarticulo_imagen', [q_articulo_imagen_Controller::class, 'store']);
Route::put('/qarticulo_imagen/{imaartcod}', [q_articulo_imagen_Controller::class, 'update']);
Route::delete('/qarticulo_imagen/{imaartcod}', [q_articulo_imagen_Controller::class, 'destroy']);
Route::get('/qarticulo_imagen/search', [q_articulo_imagen_Controller::class, 'search']);


//RUTAS DE LA TABLA QARTICULO_PRECIO
Route::get('/qarticulo_precio', [q_articulo_precio_Controller::class, 'index']);
Route::post('/qarticulo_precio', [q_articulo_precio_Controller::class, 'store']);
Route::put('/qarticulo_precio/{preartcod}', [q_articulo_precio_Controller::class, 'update']);
Route::delete('/qarticulo_precio/{preartcod}', [q_articulo_precio_Controller::class, 'destroy']);
Route::get('/qarticulo_precio/search', [q_articulo_precio_Controller::class, 'search']);


//RUTAS DE LA TABLA QANET_REPRESENTANTES
Route::get('/qanet_representante', [qanet_representante_Controller::class, 'index']);
Route::post('/qanet_representante', [qanet_representante_Controller::class, 'strore']);
Route::put('/qanet_representante/{rprnom}', [qanet_representante_Controller::class, 'update']);
Route::delete('/qanet_representante/{rprnom}', [qanet_representante_Controller::class, 'destroy']);
Route::get('/qanet_representante/search', [qanet_representante_Controller::class, 'search']);

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

// RUTAS DEL AUTHCONTROLLER
Route::post('/login', [AuthController::class, 'login']); // Login para obtener el token

Route::middleware('auth:api')->group(function () {
    Route::get('/me', [AuthController::class, 'me']); // Obtener los datos del usuario
    Route::post('/logout', [AuthController::class, 'logout']); // Logout para invalidar el token

    // Otras rutas protegidas
    // Route::get('/posts', [PostController::class, 'index']);
});