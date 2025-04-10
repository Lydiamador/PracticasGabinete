<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qanet_Articuloqtpv;

class Qanet_ArticuloqtpvController extends Controller
{
    // MOSTRAR TODOS LOS ARTICULOS QTPV
    public function index()
    {
        $articulos = Qanet_Articuloqtpv::all();
        return response()->json($articulos);
    }

    // MOSTRAR UN ARTICULO QTPV
    public function show($id)
    {
        $articulo = Qanet_Articuloqtpv::find($id);
        if (!$articulo) {
            return response()->json(['message' => 'Articulo no encontrado'], 404);
        }
        return response()->json($articulo);
    }

    // CREAR ARTICULO QTPV
    public function store(Request $request){
        $data= $request -> validate([
            'arttie'=>'required|integer|max:11',
            'artfamcon'=>'required|integer|max:11',
            'artcon'=>'required|integer|max:11',
            'artcod'=>'nullable|string|max:10|min:10',
            'regmod'=>'nullable|integer|max:11',
            'regenv'=>'nullable|integer|max:11',
            'famima'=>'nullable|string|max:255|min:255',
            'artima'=>'nullable|string|max:255|min:255',
            'famcolfon'=>'nullable|string|max:20|min:20',
            'famcolfue'=>'nullable|string|max:20|min:20',
            'artnom'=>'nullable|string|max:50|min:50',
            'artdelcod'=>'nullable|string|max:15|min:15',
            'artfav'=>'nullable|integer|max:11',
            'artfav2'=>'nullable|string|max:6|min:6',
            'artpos'=>'nullable|integer|max:11',
            'artenvtie'=>'nullable|integer|max:11'
        ]);
        // CREAMOS EL ARTICULO QTPV
        $articulo = Qanet_Articuloqtpv::create($data);        
        // DEVOLVEMOS EL ARTICULO QTPV CREADO
        return response()->json($articulo,201);
    }

    // ACTUALIZAR UN ARTICULO QTPV
    public function update(Request $request, $id){
        // VALIDAMOS LOS DATOS
        $articulo = Qanet_Articuloqtpv::findOrFail($id);

        $data= $request -> validate([
            'arttie'=>'required|integer|max:11',
            'artfamcon'=>'required|integer|max:11',
            'artcon'=>'required|integer|max:11',
            'artcod'=>'nullable|string|max:10|min:10',
            'regmod'=>'nullable|integer|max:11',
            'regenv'=>'nullable|integer|max:11',
            'famima'=>'nullable|string|max:255|min:255',
            'artima'=>'nullable|string|max:255|min:255',
            'famcolfon'=>'nullable|string|max:20|min:20',
            'famcolfue'=>'nullable|string|max:20|min:20',
            'artnom'=>'nullable|string|max:50|min:50',
            'artdelcod'=>'nullable|string|max:15|min:15',
            'artfav'=>'nullable|integer|max:11',
            'artfav2'=>'nullable|string|max:6|min:6',
            'artpos'=>'nullable|integer|max:11',
            'artenvtie'=>'nullable|integer|max:11'
        ]);
        // ACTUALIZAMOS EL ARTICULO QTPV
        $articulo->update($data);
        return response()->json($articulo);
    }

    //ELIMINAMOS ARTICULO QTPV
    public function destroy($id){
        Qanet_Articuloqtpv::destroy($id);
        return response()->json(null, 204);
    }
}
