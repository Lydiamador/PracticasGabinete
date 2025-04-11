<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qanet_Extra;

class Qanet_ExtraController extends Controller
{
    // MOSTRAR TODOS LOS EXTRAS
    public function index()
    {
        $extras = Qanet_Extra::all();
        return response()->json($extras);
    }

    // MOSTRAR UN EXTRA
    public function show($id)
    {
        $extra = Qanet_Extra::find($id);
        if (!$extra) {
            return response()->json(['message' => 'Extra no encontrado'], 404);
        }
        return response()->json($extra);
    }

    // CREAR UN EXTRA
    public function store(Request $request)
    {
        $data = $request->validate([
            'extcod'=>'required|float',
            'extnom'=>'nullable|string|max:50',
            'extpre'=>'nullable|float',
            'extimpbar'=>'nullable|integer|max:11',
            'extimpcoc'=>'nullable|integer|max:11',
            'extimpcam'=>'nullable|integer|max:11',
            'extartcod'=>'nullable|string|max:10',
            'exttip'=>'nullable|integer|max:11',
            'extcan'=>'nullable|float'
        ]);

        $extra = Qanet_Extra::create($data);
        return response()->json($extra, 201);
    }

    // ACTUALIZAR UN EXTRA
    public function update(Request $request, $id)
    {
        $extra = Qanet_Extra::find($id);
        if (!$extra) {
            return response()->json(['message' => 'Extra no encontrado'], 404);
        }

        $data = $request->validate([
            'extcod'=>'required|float',
            'extnom'=>'nullable|string|max:50',
            'extpre'=>'nullable|float',
            'extimpbar'=>'nullable|integer|max:11',
            'extimpcoc'=>'nullable|integer|max:11',
            'extimpcam'=>'nullable|integer|max:11',
            'extartcod'=>'nullable|string|max:10',
            'exttip'=>'nullable|integer|max:11',
            'extcan'=>'nullable|float'
        ]);

        $extra->update($data);
        return response()->json($extra);
    }

    // ELIMINAR UN EXTRA
    public function destroy($id)
    {
        $extra = Qanet_Extra::find($id);
        if (!$extra) {
            return response()->json(['message' => 'Extra no encontrado'], 404);
        }

        $extra->delete();
        return response()->json(null, 204);
    }
}
