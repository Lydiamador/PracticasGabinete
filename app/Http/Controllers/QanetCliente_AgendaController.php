<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qanet_ClienteAgenda;

class QanetCliente_AgendaController extends Controller
{
    //MOSTRAR AGENDA
    public function index()
    {
        $agenda = Qanet_ClienteAgenda::all();
        return response()->json($agenda);
    }

    //MOSTRAR AGENDA DE UN CLIENTE
    public function show($id)
    {
        $agenda = Qanet_ClienteAgenda::find($id);
        if (!$agenda) {
            return response()->json(['message' => 'Agenda no encontrada'], 404);
        }
        return response()->json($agenda);
    }

    public function showByCodigoCliente($ageclicod){
        return Qanet_ClienteAgenda::findOrFail($ageclicod);

    }
    //CREAR AGENDA
    public function store(Request $request)
    {
        $data = $request->validate([
            'id'=>'required|autoincrement|integer|max:11',
            'ageclicod'=>'required|string|max:15',
            'agecencod'=>'required|string|max:4|min:4',
            'agenom'=>'required|string|max:60|min:60',
            'agecon'=>'required|string|max:255|min:255',
            'agetelmov'=>'required|string|max:255|min:255',
            'ageema'=>'required|string|max:255|min:255'
        ]);

        $agenda = Qanet_ClienteAgenda::create($data);
        return response()->json($agenda, 201);
    }

    //ACTUALIZAR AGENDA
    public function update(Request $request, $id)
    {
        $agenda = Qanet_ClienteAgenda::find($id);
        if (!$agenda) {
            return response()->json(['message' => 'Agenda no encontrada'], 404);
        }

        $data = $request->validate([
            'id'=>'required|autoincrement|integer|max:11',
            'ageclicod'=>'required|string|max:15',
            'agecencod'=>'required|string|max:4|min:4',
            'agenom'=>'required|string|max:60|min:60',
            'agecon'=>'required|string|max:255|min:255',
            'agetelmov'=>'required|string|max:255|min:255',
            'ageema'=>'required|string|max:255|min:255'
        ]);

        $agenda->update($data);
        return response()->json($agenda);
    }

    //ELIMINAR AGENDA
    public function destroy($id)
    {
        $agenda = Qanet_ClienteAgenda::find($id);
        if (!$agenda) {
            return response()->json(['message' => 'Agenda no encontrada'], 404);
        }

        $agenda->delete();
        return response()->json(null, 204);
    }
}
