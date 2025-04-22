<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientesDirecciones;
class ClientesDireccionesController extends Controller
{
    // MOSTRAR TODAS LAS DIRECCIONES DE LOS CLIENTES
    public function index(){
        $direcciones = ClientesDirecciones::all();
        return response()->json($direcciones);
    }

    // MOSTRAR UNA DIRECCION DE UN CLIENTE
    public function show($id){
        $direccion = ClientesDirecciones::find($id);
        if (!$direccion) {
            return response()->json(['message' => 'Direccion no encontrada'], 404);
        }   
        return response()->json($direccion);
    }

    // CREAR UNA DIRECCION DE UN CLIENTE
    public function store(Request $request){
        $data= $request = validate([
            'dirid'=>'required|autoincrement|integer|max:11',
            'cliid'=>'required|float',
            'dirnom'=>'required|string|max:25',
            'dirape'=>'required|string|max:25',
            'dirdir'=>'required|string|max:60',
            'dirpob'=>'required|string|max:50',
            'dirpai'=>'required|string|max:25',
            'dircp'=>'required|string|max:12',  
            'dirtfno1'=>'required|string|max:20',
            'dirtfno2'=>'required|string|max:20',
            'dirclicod'=>'required|string|max:15',  
            'dircencod'=>'required|string|max:4',
            'dirtip'=>'required|integer|max:11',
            'dirpro'=>'required|string|max:30',
        ]);
        // CREAMOS LA DIRECCION
        $direccion = ClientesDirecciones::create($data);
        // DEVOLVEMOS LA DIRECCION CREADA
        return response()->json($direccion,201);
    }

    // ACTUALIZAMOS UNA DIRECCION DE UN CLIENTE
    public function update(Request $request, $id){
        // VALIDAMOS LOS DATOS
         $direccion = ClientesDirecciones::findOrFail($id);

         $data= $request = validate([
            'dirid'=>'required|autoincrement|integer|max:11',
            'cliid'=>'required|float',
            'dirnom'=>'required|string|max:25',
            'dirape'=>'required|string|max:25',
            'dirdir'=>'required|string|max:60',
            'dirpob'=>'required|string|max:50',
            'dirpai'=>'required|string|max:25',
            'dircp'=>'required|string|max:12',  
            'dirtfno1'=>'required|string|max:20',
            'dirtfno2'=>'required|string|max:20',
            'dirclicod'=>'required|string|max:15',  
            'dircencod'=>'required|string|max:4',
            'dirtip'=>'required|integer|max:11',
            'dirpro'=>'required|string|max:30',
        ]);
        // ACTUALIZAMOS LA DIRECCION
        $direccion->update($data);
        return response()->json($direccion);
    }

    //ELIMINAMOS UNA DIRECCION DE UN CLIENTE
    public function destroy($id){
        ClientesDirecciones::destroy($id);
        return response()->json(null, 204);
    }
}
