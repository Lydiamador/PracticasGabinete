<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Pedido::with('usuario')->get(); // Incluye los datos del usuario relacionado
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'fecha' => 'required|date',
            'total' => 'required|numeric'
        ]);

        return Pedido::create($request->all()); // Crea un nuevo pedido
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Pedido::with('usuario')->findOrFail($id); // Incluye el usuario relacionado en un pedido específico
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->update($request->all()); // Actualiza el pedido
        return $pedido;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Pedido::destroy($id); // Elimina el pedido
        return response()->json(["message" => "Pedido eliminado"]);
    }
}
