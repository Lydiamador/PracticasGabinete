<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qanet_Articuloing;
class Qanet_ArticuloingController extends Controller
{
    // MOSTRAR TODOS LOS ARTICULOS IDI
    public function index()
    {
        $articulos = Qanet_Articuloing::all();
        return response()->json($articulos);
    }

    // MOSTRAR UN ARTICULO IDI
    public function show($id)
    {
        $articulo = Qanet_Articuloing::find($id);
        if (!$articulo) {
            return response()->json(['message' => 'Articulo no encontrado'], 404);
        }
        return response()->json($articulo);
    }

    // CREAR ARTICULO IDI
    public function store(Request $request){
        $data= $request -> validate([
            'artcod'=>'required|string|max:10',
            'arting'=>'required|string|max:1500'
        ]);
        // CREAMOS EL ARTICULO IDI
        $articulo = Qanet_Articuloing::create($data);
        // DEVOLVEMOS EL ARTICULO IDI CREADO
        return response()->json($articulo,201);
    }

    // ACTUALIZAMOS ARTICULO IDI
    public function update(Request $request, $id){
        // VALIDAMOS LOS DATOS
        $articulo = Qanet_Articuloing::findOrFail($id);

        $data= $request -> validate([
            'artcod'=>'required|string|max:10',
            'arting'=>'required|string|max:1500'
        ]);
        // ACTUALIZAMOS EL ARTICULO IDI
        $articulo->update($data);
        return response()->json($articulo);
    }

    //ELIMINAMOS ARTICULO IDI
    public function destroy($id){
        Qanet_Articuloing::destroy($id);
        return response()->json(null, 204);
    }
}
