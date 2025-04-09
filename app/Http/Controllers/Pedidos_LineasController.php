<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedidos_Lineas;

class Pedidos_LineasController extends Controller
{
    // Listar todos los pedidos lineas
    public function index(){
        return Pedidos_Lineas::all();
    }

    // Mostrar una linea de pedido por su id
    public function show($id){
        return Pedidos_Lineas::find($id);
    }

    // Crear una nueva linea de pedido
    public function store(Request $request){
        return Pedidos_Lineas::create($request->all());
    }

    // Actualizar una linea del pedido
    public function update(Request $request){
        return Pedidos_Lineas::find($request->$id)->update($request->all());
    }

    // Eliminar una linea del pedido
    public function destroy($id){
        return Pedidos_Lineas::find($id)->delete();
    }

    // Obtener todas las líneas de un pedido específico
    public function lineasPedido($id){
        return Pedidos_Lineas::where('pedido_id', $id)->get();
    }

    // Obtener todas las lineas de pedido de un cliente
    public function lineasPedidoCliente($cliente_id){
        return Pedidos_Lineas::where('cliente_id', $cliente_id)->get();
    }

    // Obtener todas las lineas de pedido de un producto
    public function lineasPedidoProducto($producto_id){
        return Pedidos_Lineas::where('producto_id', $producto_id)->get();
    }
}
