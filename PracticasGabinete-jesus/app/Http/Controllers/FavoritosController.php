<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favoritos;

class FavoritosController extends Controller
{
    // MOSTRAR TODOS LOS FAVORITOS DE TODOS LOS USUARIOS
    public function index(){
        $favorito= Favoritos::all();
        return response()->json($favorito);
    }

    // MOSTRAR LOS FAVORITOS DE UN USUARIO ESPECIFICO
    public function show($id){
        $favorito= Favoritos::find($id);
        return response()->json($favorito);
    }

    // CREAR UN NUEVO FAVORITO
    public function store(Request $request){
        $data =$request->validate([
            'id' => 'required|autoincrement|integer|max:11',
            'favartcod'=> 'required|string|max:10',
            'favusucod'=>"requiered|string|max:255",
        ]);

        // CREAMOS EL FAVORITO
        $favorito= Favoritos::create($data);
        return response()->json($favorito, 201);
    }

    // ACTUALIZAR UN FAVORITO
    public function update(Request $request, $id){
        $favorito= Favoritos::find($id);
        $data= $request->validate([
            'id' => 'required|autoincrement|integer|max:11',
            'favartcod'=> 'required|string|max:10',
            'favusucod'=>"requiered|string|max:255",
        ]);
        // ACTUALIZAMOS EL FAVORITO
        $favorito->update($data);
        return response()->json($favorito);
    }

    //ELIMINAR UN FAVORITO
    public function destroy($id){
        $favorito= Favoritos::find($id);
        $favorito->delete();
        return response()->json(null, 204);
    }
}
