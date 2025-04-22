<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qanet_Delegacion;

class Qanet_DelegacionController extends Controller
{
    // MOSTAR TODOS LAS DELEGACIONES
    public function index()
    {
        $delegaciones = Qanet_Delegacion::all();
        return response()->json($delegaciones);
    }

    // MOSTRAR UNA DELEGACIÓN
    public function show($id)
    {
        $delegacion = Qanet_Delegacion::find($id);
        if (!$delegacion) {
            return response()->json(['message' => 'Delegación no encontrada'], 404);
        }
        return response()->json($delegacion);
    }

    // CREAR UNA DELEGACIÓN
    public function store(Request $request)
    {
        $data = $request->validate([
            'delcod'=>'required|string|max:15',
            'delnom'=>'nuellable|string|max:50',
            'delrazsoc'=>'nuellable|string|max:50',
            'deldir'=>'nuellable|string|max:50',
            'delposcod'=>'nuellable|string|max:10',
            'delpob'=>'nuellable|string|max:50',
            'delpro'=>'nuellable|string|max:50',
            'delnif'=>'nuellable|string|max:20',
            'deltel'=>'nuellable|string|max:20',
            'delweb'=>'nuellable|string|max:50',
            'delalmcod'=>'nuellable|string|max:12',
            'delsyn'=>'nuellable|string|max:1'
        ]);

        $delegacion = Qanet_Delegacion::create($data);
        return response()->json($delegacion, 201);
    }

    // ACTUALIZAR UNA DELEGACIÓN
    public function update(Request $request, $id)
    {
        $delegacion = Qanet_Delegacion::find($id);
        if (!$delegacion) {
            return response()->json(['message' => 'Delegación no encontrada'], 404);
        }

        $data = $request->validate([
            'delcod'=>'required|string|max:15',
            'delnom'=>'nuellable|string|max:50',
            'delrazsoc'=>'nuellable|string|max:50',
            'deldir'=>'nuellable|string|max:50',
            'delposcod'=>'nuellable|string|max:10',
            'delpob'=>'nuellable|string|max:50',
            'delpro'=>'nuellable|string|max:50',
            'delnif'=>'nuellable|string|max:20',
            'deltel'=>'nuellable|string|max:20',
            'delweb'=>'nuellable|string|max:50',
            'delalmcod'=>'nuellable|string|max:12',
            'delsyn'=>'nuellable|string|max:1'
        ]);

        $delegacion->update($data);
        return response()->json($delegacion);
    }

    // ELIMINAR UNA DELEGACIÓN
    public function destroy($id)
    {
        $delegacion = Qanet_Delegacion::find($id);
        if (!$delegacion) {
            return response()->json(['message' => 'Delegación no encontrada'], 404);
        }

        $delegacion->delete();
        return response()->json(null, 204);
    }
}
