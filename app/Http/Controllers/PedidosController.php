<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedidos;

class PedidosController extends Controller
{
    // Listar todos los pedidos
    public function index()
    {
        return Pedidos::all();
    }

    // Mostrar un pedido por ID
    public function show($id)
    {
        return Pedidos::findOrFail($id);
    }

    // Crear un nuevo pedido
    public function store(Request $request)
    {
        return Pedidos::create($request->all());
    }

    // Actualizar un pedido
    public function update(Request $request, $id)
    {
        $pedido = Pedidos::findOrFail($id);
        $pedido->update($request->all());
        return $pedido;
    }

    // Eliminar un pedido
    public function destroy($id)
    {
        Pedidos::destroy($id);
        return response()->json(null, 204);
    }

    // Obtener todos los pedidos de un cliente por su ID
    public function pedidosPorCliente($cliente_id)
    {
        return Pedidos::where('cliente_id', $cliente_id)
                      ->orderBy('fecha', 'desc')
                      ->get();
    }
}
