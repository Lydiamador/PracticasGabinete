<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qanet_Estadistica;

class Qanet_EstadisticaController extends Controller
{
    // MOSTRAR TODOS LAS ESTADISTICAS
    public function index()
    {
        $estadisticas = Qanet_Estadistica::all();
        return response()->json($estadisticas);
    }

    // MOSTRAR UNA ESTADISTICA
    public function show($id)
    {
        $estadistica = Qanet_Estadistica::find($id);
        if (!$estadistica) {
            return response()->json(['message' => 'Estadística no encontrada'], 404);
        }
        return response()->json($estadistica);
    }

    // CREAR UNA ESTADISTICA
    public function store(Request $request)
    {
        $data = $request->validate([
            'estcon'=>'required|autoincrement|integer|max:11',
            'estalbnum'=>'required|string|max:50',
            'estalbfec'=>'required|date',
            'estalbimptot'=>'required|float',
            'estclicod'=>'required|string|max:15',            
            'estcencod'=>'required|string|max:4',
            'estartcod'=>'required|string|max:15',
            'estcan'=>'required|float',
            'estpre'=>'required|float',
            'estfecrea'=>'required|date'
        ]);

        $estadistica = Qanet_Estadistica::create($data);
        return response()->json($estadistica, 201);
    }

    // ACTUALIZAR UNA ESTADISTICA
    public function update(Request $request, $id)
    {
        $estadistica = Qanet_Estadistica::find($id);
        if (!$estadistica) {
            return response()->json(['message' => 'Estadística no encontrada'], 404);
        }

        $data = $request->validate([
            'estcon'=>'required|autoincrement|integer|max:11',
            'estalbnum'=>'required|string|max:50',
            'estalbfec'=>'required|date',
            'estalbimptot'=>'required|float',
            'estclicod'=>'required|string|max:15',
            'estcencod'=>'required|string|max:4',
            'estartcod'=>'required|string|max:15',
            'estcan'=>'required|float',
            'estpre'=>'required|float',
            'estfecrea'=>'required|date'
        ]);        

        $estadistica->update($data);
        return response()->json($estadistica);
    }

    // ELIMINAR UNA ESTADISTICA
    public function destroy($id)
    {
        $estadistica = Qanet_Estadistica::find($id);
        if (!$estadistica) {
            return response()->json(['message' => 'Estadística no encontrada'], 404);
        }

        $estadistica->delete();
        return response()->json(null, 204);
    }
}
