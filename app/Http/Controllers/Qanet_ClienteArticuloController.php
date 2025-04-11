<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qanet_ClienteArticulo;

class Qanet_ClienteArticuloController extends Controller
{
    //MOSTRAR TODOS LOS ARTICULOS DE UN CLIENTE
    public function index()
    {
        $articulos = Qanet_ClienteArticulo::all();
        return response()->json($articulos);
    }

    //MOSTRAR ARTICULO DE UN CLIENTE
    public function show($id)
    {
        $articulo = Qanet_ClienteArticulo::find($id);
        if (!$articulo) {
            return response()->json(['message' => 'Articulo no encontrado'], 404);
        }
        return response()->json($articulo);
    }

    //CREAR ARTICULO DE UN CLIENTE
    public function store(Request $request)
    {
        $data = $request->validate([
            'clicod'=>'required|string|max:15',
            'clicencod'=>'required|string|max:4',
            'artcod'=>'required|string|max:10'
        ]);

        $articulo = Qanet_ClienteArticulo::create($data);
        return response()->json($articulo, 201);
    }

    //ACTUALIZAR ARTICULO DE UN CLIENTE
    public function update(Request $request, $id)
    {
        $articulo = Qanet_ClienteArticulo::find($id);
        if (!$articulo) {
            return response()->json(['message' => 'Articulo no encontrado'], 404);
        }

        $data = $request->validate([
            'clicod'=>'required|string|max:15',
            'clicencod'=>'required|string|max:4',
            'artcod'=>'required|string|max:10'
        ]);

        $articulo->update($data);
        return response()->json($articulo);
    }

    //ELIMINAR ARTICULO DE UN CLIENTE
    public function destroy($id)
    {
        $articulo = Qanet_ClienteArticulo::find($id);
        if (!$articulo) {
            return response()->json(['message' => 'Articulo no encontrado'], 404);
        }

        $articulo->delete();
        return response()->json(null, 204);
    }
}
