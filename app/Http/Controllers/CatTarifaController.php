<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat_Tarifa;

class CatTarifaController extends Controller
{
    // MOSTRAR TODAS LAS TARIFAS
    public function index()
    {
        $tarifas = Cat_Tarifa::all();
        return response()->json($tarifas);
    }

    // MOSTRAR UNA TARIFA
    public function show($id)
    {
        $tarifa = Cat_Tarifa::find($id);

        if (!$tarifa) {
            return response()->json(['message' => 'Tarifa no encontrada'], 404);
        }

        return response()->json($tarifa);
    }

    public function showByName($nombre)
    {
        return Cat_Tarifa::findOrFail($nombre);
    }

    // CREAR UNA TARIFA
    public function store(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|integer|max:11',
            'tarifa' => 'required|string|size:3',
            'nombre' => 'required|string|max:50',
            'defecto' => 'required|integer|max:1',
        ]);

        $tarifa = Cat_Tarifa::create($data);
        return response()->json($tarifa, 201);
    }

    // ACTUALIZAR UNA TARIFA
    public function update(Request $request, $id)
    {
        $tarifa = Cat_Tarifa::find($id);

        if (!$tarifa) {
            return response()->json(['message' => 'Tarifa no encontrada'], 404);
        }

        $data = $request->validate([
            'id' => 'required|integer|max:11',
            'tarifa' => 'required|string|size:3',
            'nombre' => 'required|string|max:50',
            'defecto' => 'required|integer|max:1',
        ]);

        $tarifa->update($data);
        return response()->json($tarifa);
    }

    // ELIMINAR UNA TARIFA
    public function destroy($id)
    {
        $tarifa = Cat_Tarifa::find($id);

        if (!$tarifa) {
            return response()->json(['message' => 'Tarifa no encontrada'], 404);
        }

        $tarifa->delete();
        return response()->json(null, 204);
    }
}
