<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qanet_Articulo;

class Qanet_ArticuloController extends Controller
{
    // MOSTRAR TODOS LOS ARTICULOS
    public function index()
    {
        $articulos = Qanet_Articulo::all();
        return response()->json($articulos);
    }

    // MOSTRAR UN ARTICULO POR SU ID
    public function show($id)
    {
        $articulo = Qanet_Articulo::find($id);
        if (!$articulo) {
            return response()->json(['message' => 'Articulo no encontrado'], 404);
        }
        return response()->json($articulo);
    }

    // CREAR UN NUEVO ARTICULO
    public function store(Request $request){
        $data= $request = validate([
            'id'=>'required|integer|auto_increment|max:11',
            'artcod'=>'nullable|string|max:10|min:10',
            'promedcod'=>'nullable|string|max:3|min:3',
            'artcatcod3'=>'nullable|string|max:3|min:3',
            'artcatcod4'=>'nullable|string|max:3|min:3',
            'artnoedi'=>'nullable|integer|max:11',
            'artprest2'=>'nullable|float',
            'artjppro'=>'nullable|integer|max:11',
            'artprest3'=>'nullable|float',
            'artnoclt'=>'nullable|integer|max:11',
            'artcatcod5'=>'nullable|string|max:3|min:3',
            'artbarcod'=>'nullable|string|max:20|min:20',
            'artudscam'=>'nullable|float',
            'artpespie'=>'nullable|float',
            'artpesuni'=>'nullable|float',
            'artfecream'=>'nullable|date',
            'artpesbru'=>'nullable|float',
            'artvencaj'=>'nullable|integer|max:11',
            'artfecrea'=>'nullable|date',
            'artsyn'=>'nullable|string|max:1|min:1',
            'artcol'=>'nullable|string|max:10|min:10',
            'artnom'=>'nullable|string|max:50',
            'artobs'=>'nullable|string|max:1000',
            'artivacod'=>'nullable|string|max:3',
            'artcatcod'=>'nullable|string|max:3',
            'artsit'=>'nullable|string|max:1',
            'artdocaso'=>'nullable|string|max:155',
            'artstock'=>'nullable|float',
            'aststocon'=>'nullable|integer|max:11',
            'artcatcodw1'=>'nullable|string|max:3',
            'artcatcodw2'=>'nullable|string|max:3',
            'puntos'=>'required|integer|max:11',
            'artpunver'=>'nullable|float',
            'artsolcli'=>'nullable|integer|max:11',
            'artivapor'=>'required|float',
            'artrecpor'=>'required|float',
            'artsigimp'=>'required|float',
            'asrtfamcod'=>'required|string|max:10',
            'artsfacod'=>'required|string|max:10',
            'artgrucod'=>'required|string|max:10'
    ]);
        // CREAMOS EL ARTICULO
        $articulo = Qanet_Articulo::create($data);
        // DEVOLVEMOS EL ARTICULO CREADO
        return response()->json($articulo,201);
    }

    // ACTUALIZAMOS UN ARTICULO
    public function update(Request $request, $id){
        // VALIDAMOS LOS DATOS
        $articulo = Qanet_Articulo::findOrFail($id);

        $data= $request = validate([ 
            'id'=>'required|integer|auto_increment|max:11',
            'artcod'=>'nullable|string|max:10|min:10',
            'promedcod'=>'nullable|string|max:3|min:3',
            'artcatcod3'=>'nullable|string|max:3|min:3',
            'artcatcod4'=>'nullable|string|max:3|min:3',
            'artnoedi'=>'nullable|integer|max:11',
            'artprest2'=>'nullable|float',
            'artjppro'=>'nullable|integer|max:11',
            'artprest3'=>'nullable|float',
            'artnoclt'=>'nullable|integer|max:11',
            'artcatcod5'=>'nullable|string|max:3|min:3',
            'artbarcod'=>'nullable|string|max:20|min:20',
            'artudscam'=>'nullable|float',
            'artpespie'=>'nullable|float',
            'artpesuni'=>'nullable|float',
            'artfecream'=>'nullable|date',
            'artpesbru'=>'nullable|float',
            'artvencaj'=>'nullable|integer|max:11',
            'artfecrea'=>'nullable|date',
            'artsyn'=>'nullable|string|max:1|min:1',
            'artcol'=>'nullable|string|max:10|min:10',
            'artnom'=>'nullable|string|max:50',
            'artobs'=>'nullable|string|max:1000',
            'artivacod'=>'nullable|string|max:3',
            'artcatcod'=>'nullable|string|max:3',
            'artsit'=>'nullable|string|max:1',
            'artdocaso'=>'nullable|string|max:155',
            'artstock'=>'nullable|float',
            'aststocon'=>'nullable|integer|max:11',
            'artcatcodw1'=>'nullable|string|max:3',
            'artcatcodw2'=>'nullable|string|max:3',
            'puntos'=>'required|integer|max:11',
            'artpunver'=>'nullable|float',
            'artsolcli'=>'nullable|integer|max:11',
            'artivapor'=>'required|float',
            'artrecpor'=>'required|float',
            'artsigimp'=>'required|float',
            'asrtfamcod'=>'required|string|max:10',
            'artsfacod'=>'required|string|max:10',
            'artgrucod'=>'required|string|max:10'
    ]);
        // ACTUALIZAMOS EL ARTICULO
        $articulo->update($data);
        return response()->json($articulo);
    }

    //ELIMINAMOS UN ARTICULO
    public function destroy($id){
        Qanet_Articulo::destroy($id);
        return response()->json(null, 204);
    }   
}
