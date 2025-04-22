<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qanet_Artculoidi;

class Qanet_ArticuloIdiController extends Controller
{
    // MOSTRAR TODOS LOS REGISTROS DE LA TABLA
    public function index()
    {
        $idi = Qanet_Artculoidi::all();
        return response()->json($idi);
    }

    // MOSTRAR UN REGISTRO DE LA TABLA
    public function show($id)
    {
        $idi = Qanet_Artculoidi::find($id);
        if (!$idi) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        return response()->json($idi);
    }

    // CREAR UN NUEVO REGISTRO
    public function store(Request $request)
    {
        $data = $request->validate([
            'idiartcod' => 'required|string|max:10',
            'idicod' => 'required|string|max:3',
            'idiest4' => 'required|string|max:5000'
        ]);

        $idi = Qanet_Artculoidi::create($data);
        return response()->json($idi, 201);
    }

    // ACTUALIZAMOS UN REGISTRO
    public function update(Request $request, $id)
    {
        $idi = Qanet_Artculoidi::find($id);
        if (!$idi) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        $data = $request->validate([
            'idiartcod' => 'required|string|max:10',
            'idicod' => 'required|string|max:3',
            'idiest4' => 'required|string|max:5000'
        ]);

        $idi->update($data);
        return response()->json($idi);
    }

    // ELIMINAMOS UN REGISTRO
    public function destroy($id)
    {
        $idi = Qanet_Artculoidi::find($id);
        if (!$idi) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        $idi->delete();
        return response()->json(null, 204);
    }
}
