<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GiftPoints;

class GiftPointsController extends Controller
{
    // MOSTRAR TODOS LOS GIFTPOINTS
    public function index(){
        $gift = GiftPoints::all();
        return response()->json($gift, 200);
    }

    // MOSTRAR UN GIFTPOINT
    public function show($id){
        $gift = GiftPoints::find($id);
        if (!$gift) {
            return response()->json(['message' => 'GiftPoint no encontrado'], 404);
        }
        return response()->json($gift);
    }

    public function showByCodigo($codigo){
        $gift = GiftPoints::find($codigo);
        if (!$gift) {
            return response()->json(['message' => 'GiftPoint no encontrado'], 404);
        }
        return response()->json($gift);
    }

    // CREAR UN GIFTPOINT
    public function store(Request $request){
        $data= $request = validate([
            'id'=>'required|integer|max:11',
            'codigo'=>'required|string|max:15',
            'euros'=>'required|float',
            'puntos'=>'required|integer|max:11',
        ]);
        // CREAMOS EL GIFTPOINT
        $gift = GiftPoints::create($data);
        // DEVOLVEMOS EL GIFTPOINT CREADO
        return response()->json($gift,201);
    }

    // ACTUALIZAMOS UN GIFTPOINT
    public function update(Request $request, $id){
        // VALIDAMOS LOS DATOS
        $gift = GiftPoints::findOrFail($id);

        $data= $request = validate([
            'id'=>'required|integer|max:11',
            'codigo'=>'required|string|max:15',
            'euros'=>'required|float',
            'puntos'=>'required|integer|max:11',
        ]);
        // ACTUALIZAMOS LOS GIFTPOINTS
        $gift->update($data);
        return response()->json($gift);
    }

    //ELIMINAMOS UN GIFTPOINT
    public function destroy($id){
        GiftPoints::destroy($id);
        return response()->json(null, 204);
    }
}
