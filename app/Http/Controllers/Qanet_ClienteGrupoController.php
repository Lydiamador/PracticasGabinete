<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qanet_ClienteGrupo;


class Qanet_ClienteGrupoController extends Controller
{
    // MOSTRAR TODOS LOS GRUPOS DE CLIENTES QANET
    public function index()
    {
        $grupos = Qanet_ClienteGrupo::all();
        return response()->json($grupos);
    }

    // MOSTRAR UN GRUPO DE CLIENTES QANET
    public function show($id)
    {
        $grupo = Qanet_ClienteGrupo::find($id);
        if (!$grupo) {
            return response()->json(['message' => 'Grupo no encontrado'], 404);
        }
        return response()->json($grupo);
    }

    // CREAR UN GRUPO DE CLIENTES QANET
    public function store(Request $request)
    {
        $data = $request->validate([
            'clicod'=>'required|string|max:15',
            'clicencod'=>'required|string|max:4',
            'grucod'=>'required|string|max:10'
        ]);

        $grupo = Qanet_ClienteGrupo::create($data);
        return response()->json($grupo, 201);
    }

    // ACTUALIZAR UN GRUPO DE CLIENTES QANET
    public function update(Request $request, $id)
    {
        $grupo = Qanet_ClienteGrupo::find($id);
        if (!$grupo) {
            return response()->json(['message' => 'Grupo no encontrado'], 404);
        }

        $data = $request->validate([
            'clicod'=>'required|string|max:15',
            'clicencod'=>'required|string|max:4',
            'grucod'=>'required|string|max:10'
        ]);

        $grupo->update($data);
        return response()->json($grupo);
    }

    // ELIMINAR UN GRUPO DE CLIENTES QANET
    public function destroy($id)
    {
        $grupo = Qanet_ClienteGrupo::find($id);
        if (!$grupo) {
            return response()->json(['message' => 'Grupo no encontrado'], 404);
        }

        $grupo->delete();
        return response()->json(null, 204);
    }
}
