<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qanet_ClienteCategoria;
class Qanet_ClienteCategoriaController extends Controller
{
    //MOSTRAR TODOS LAS CATEGORIAS DE CLIENTES QANET
    public function index()
    {
        $categorias = Qanet_ClienteCategoria::all();
        return response()->json($categorias);
    }

    //MOSTRAR UNA CATEGORIA DE CLIENTES QANET
    public function show($id)
    {
        $categoria = Qanet_ClienteCategoria::find($id);
        if (!$categoria) {
            return response()->json(['message' => 'Categoria no encontrada'], 404);
        }
        return response()->json($categoria);
    }

    //CREAR UNA CATEGORIA DE CLIENTES QANET
    public function store(Request $request)
    {
        $data = $request->validate([
            'clicod'=>'required|string|max:15',
            'clicencod'=>'required|string|max:4',
            'catcod'=>'required|string|max:10'
        ]);

        $categoria = Qanet_ClienteCategoria::create($data);
        return response()->json($categoria, 201);
    }

    //ACTUALIZAR UNA CATEGORIA DE CLIENTES QANET
    public function update(Request $request, $id)
    {
        $categoria = Qanet_ClienteCategoria::find($id);
        if (!$categoria) {
            return response()->json(['message' => 'Categoria no encontrada'], 404);
        }

        $data = $request->validate([
            'clicod'=>'required|string|max:15',
            'clicencod'=>'required|string|max:4',
            'catcod'=>'required|string|max:10'
        ]);

        $categoria->update($data);
        return response()->json($categoria);
    }

    //ELIMINAR UNA CATEGORIA DE CLIENTES QANET
    public function destroy($id)
    {
        $categoria = Qanet_ClienteCategoria::find($id);
        if (!$categoria) {
            return response()->json(['message' => 'Categoria no encontrada'], 404);
        }

        $categoria->delete();
        return response()->json(null, 204);
    }
}
