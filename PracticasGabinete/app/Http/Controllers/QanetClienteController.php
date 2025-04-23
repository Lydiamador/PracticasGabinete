<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qanet_Cliente;

class QanetClienteController extends Controller
{
    // MOSTRAR LISTA DE CLIENTES QANET
    public function index()
    {
        $qanet_cliente = Qanet_Cliente::all();
        return response()->json($qanet_cliente);
    }

    // MOSTRAR UN CLIENTE QANET
    public function show($id)
    {
        $qanet_cliente = Qanet_Cliente::find($id);
        if (!$qanet_cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }
        return response()->json($qanet_cliente);
    }
    public function showByCodigoCliente($clicod){
        return Qanet_Cliente::findOrFail($clicod);

    }

    // CREAR UN CLIENTE QANET
    public function store(Request $request)
    {
        $data = $request->validate([
            'id'=>'required|integer|max:11',
            'clicod'=>'nullable|string|max:15|min:15',
            'clicencod'=>'nullable|string|max:4|min:4',
            'clirprcod'=>'nullable|string|max:15|min:15',
            'clivacod'=>'nullable|string|max:3|min:3',
            'clitarcod'=>'nullable|string|max:3|min:3',
            'cliivainc'=>'nullable|integer|max:11',
            'cliwebpedrpr'=>'nullable|integer|max:11',
            'clicatcod6'=>'nullable|string|max:3|min:3',
            'clides'=>'nullable|float',
            'clides2'=>'nullable|float',
            'clides3'=>'nullable|float',
            'clialmcod'=>'nullable|string|max:12|min:12',
            'clidelcod'=>'nullable|string|max:15|min:15',
            'clisyn'=>'nullable|string|max:1|min:1',
            'clifecvis'=>'nullable|date',
            'clihorvis'=>'nullable|datetime',
            'clihoravi'=>'nullable|datetime'
        ]);

        $qanet_cliente = Qanet_Cliente::create($data);
        return response()->json($qanet_cliente, 201);
    }

    // ACTUALIZAR UN CLIENTE QANET
    public function update(Request $request, $id)
    {
        $qanet_cliente = Qanet_Cliente::find($id);
        if (!$qanet_cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        $data = $request->validate([
            'id'=>'required|integer|max:11',
            'clicod'=>'nullable|string|max:15|min:15',
            'clicencod'=>'nullable|string|max:4|min:4',
            'clirprcod'=>'nullable|string|max:15|min:15',
            'clivacod'=>'nullable|string|max:3|min:3',
            'clitarcod'=>'nullable|string|max:3|min:3',
            'cliivainc'=>'nullable|integer|max:11',
            'cliwebpedrpr'=>'nullable|integer|max:11',
            'clicatcod6'=>'nullable|string|max:3|min:3',
            'clides'=>'nullable|float',
            'clides2'=>'nullable|float',
            'clides3'=>'nullable|float',
            'clialmcod'=>'nullable|string|max:12|min:12',
            'clidelcod'=>'nullable|string|max:15|min:15',
            'clisyn'=>'nullable|string|max:1|min:1',
            'clifecvis'=>'nullable|date',
            'clihorvis'=>'nullable|datetime',
            'clihoravi'=>'nullable|datetime'
        ]);

        $qanet_cliente->update($data);
        return response()->json($qanet_cliente);
    }

    // ELIMINAR UN CLIENTE QANET
    public function destroy($id)
    {
        $qanet_cliente = Qanet_Cliente::find($id);
        if (!$qanet_cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        $qanet_cliente->delete();
        return response()->json(null, 204);
    }   
}
