<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qanet_ArticuloBar;
class Qanet_ArticuloBarController extends Controller
{
    // MOSTRAR TODOS LOS ARTICULOS BAR
    public function index()
    {
        $articulos = Qanet_ArticuloBar::all();
        return response()->json($articulos, 200);
    }

    // MOSTRAR UN ARTICULO BAR POR SU ID
    public function show($id)
    {
        $articulo = Qanet_ArticuloBar::find($id);
        if (!$articulo) {
            return response()->json(['message' => 'Articulo no encontrado'], 404);
        }
        return response()->json($articulo);
    }

    // CREAR UN ARTICULO BAR
    public function store(Request $request){
        $data= $request = validate([
            'barartcod'=>'required|string|max:10|min:10',
            'barcon'=>'required|integer|max:11',
            'barcod'=>'nullable|string|max:20',
            'barcan'=>'nullable|float'
        ]);
        // CREAMOS EL ARTICULO BAR
        $articulo = Qanet_ArticuloBar::create($data);
        // DEVOLVEMOS EL ARTICULO BAR CREADO
        return response()->json($articulo,201);
    }

    // ACTUALIZAMOS UN ARTICULO BAR
    public function update(Request $request, $id){
        // VALIDAMOS LOS DATOS
        $articulo = Qanet_ArticuloBar::findOrFail($id);

        $data= $request = validate([
            'barartcod'=>'required|string|max:10|min:10',
            'barcon'=>'required|integer|max:11',
            'barcod'=>'nullable|string|max:20',
            'barcan'=>'nullable|float'
        ]);
        // ACTUALIZAMOS EL ARTICULO BAR
        $articulo->update($data);
        return response()->json($articulo);
    }

    //ELIMINAMOS UN ARTICULO BAR
    public function destroy($id){
        Qanet_ArticuloBar::destroy($id);
        return response()->json(null, 204);
    }
}
