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
        //validamos los datos a introducir del pedido con los campos de la tabla
        $data= $request = validate([
            'id'=>'required|integer|auto_increment|max:11',
            'pedido_id'=>'required|integer|max:11',
            'id_listaregalos'=>'required|integer|max:11',
            'producto_id'=>'nullable|integer|max:11',
            'variante_id'=>'nullable|integer|max:11',
            'producto_ref'=>'required|string|max:50',
            'cantidad'=>'nullable|decimal|max:9,2',
            'precio'=>'nullable|decimal|max:6,2',
            'impuesto'=>'required|string|max:3',
            'impuesto_tasa'=>'required|decimal|max:5,2',
            'impuesto_re'=>'required|decimal|max:5,2',
            'observaciones'=>'nullable|string|max:1000',
            'aclcancaj'=>'nullable|float',
            'aclcanjcod'=>'nullable|string|max:4|min:4',
            'nombre_articulos'=>'nullable|string|max:100',
            'iva'=>'required|double',
            'iva_porcentaje'=>'required|double',
            'recargo'=>'required|double',
            'recargo_porcentaje'=>'required|double',
            'es_app'=>'nullable|integer|max:11',
        ]);
        //creamos el pedido
        $pedido = Pedidos_Lineas::create($data);
       // Devolvemos el pedido creado
       return response()->json($pedido,201);
    }

    // Actualizar una linea del pedido
    public function update(Request $request){

        $pedido = Pedidos_Lineas::find($request->id);

        //validamos los datos a introducir del pedido con los campos de la tabla
        $data= $request = validate([
            'id'=>'required|integer|auto_increment|max:11',
            'pedido_id'=>'required|integer|max:11',
            'id_listaregalos'=>'required|integer|max:11',
            'producto_id'=>'nullable|integer|max:11',
            'variante_id'=>'nullable|integer|max:11',
            'producto_ref'=>'required|string|max:50',
            'cantidad'=>'nullable|decimal|max:9,2',
            'precio'=>'nullable|decimal|max:6,2',
            'impuesto'=>'required|string|max:3',
            'impuesto_tasa'=>'required|decimal|max:5,2',
            'impuesto_re'=>'required|decimal|max:5,2',
            'observaciones'=>'nullable|string|max:1000',
            'aclcancaj'=>'nullable|float',
            'aclcanjcod'=>'nullable|string|max:4|min:4',
            'nombre_articulos'=>'nullable|string|max:100',
            'iva'=>'required|double',
            'iva_porcentaje'=>'required|double',
            'recargo'=>'required|double',
            'recargo_porcentaje'=>'required|double',
            'es_app'=>'nullable|integer|max:11',
        ]);
        //actualizamos el pedido
        $pedido->update($data);
        return response->json($pedido);
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
