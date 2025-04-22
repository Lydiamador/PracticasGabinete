<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qanet_Caja;

class QanetCajaController extends Controller
{
    // MOSTRAR TODOS LOS CAJAS
    public function index()
    {
        $cajas = Qanet_Caja::all();
        return response()->json($cajas);
    }
    // MOSTRAR UN CAJA
    public function show($id)
    {
        $caja = Qanet_Caja::find($id);
        if (!$caja) {
            return response()->json(['message' => 'Caja no encontrada'], 404);
        }
        return response()->json($caja);
    }

    // CREAR UN CAJA
    public function store(Request $request)
    {
        $data = $request->validate([
            'cajartcod' => 'required|string|max:10|min:10',
            'cajcod' => 'required|string|max:4|min:4',
            'cajnom' => 'nullable|string|max:50|min:50',
            'cajreldir' => 'nullable|float',
            'cajbarcod' => 'nullable|string|max:20|min:20',
            'cajdef' => 'nullable|integer|max:11',
            'cajtip' => 'nullable|string|max:1|min:1',
            'cajvol' => 'nullable|float'
        ]);

        $caja = Qanet_Caja::create($data);
        return response()->json($caja, 201);
    }

    // ACTUALIZAR UN CAJA
    public function update(Request $request, $id)
    {
        $caja = Qanet_Caja::find($id);
        if (!$caja) {
            return response()->json(['message' => 'Caja no encontrada'], 404);
        }

        $data = $request->validate([
            'cajartcod' => 'required|string|max:10|min:10',
            'cajcod' => 'required|string|max:4|min:4',
            'cajnom' => 'nullable|string|max:50|min:50',
            'cajreldir' => 'nullable|float',
            'cajbarcod' => 'nullable|string|max:20|min:20',
            'cajdef' => 'nullable|integer|max:11',
            'cajtip' => 'nullable|string|max:1|min:1',
            'cajvol' => 'nullable|float'
        ]);

        $caja->update($data);
        return response()->json($caja);
    }

    // ELIMINAR UN CAJA
    public function destroy($id)
    {
        $caja = Qanet_Caja::find($id);
        if (!$caja) {
            return response()->json(['message' => 'Caja no encontrada'], 404);
        }

        $caja->delete();
        return response()->json(null, 204);
    }
}
