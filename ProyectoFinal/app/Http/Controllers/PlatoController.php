<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plato;

class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $platos = Plato::all();
        dd($platos); // Esto nos mostrará los datos que se están recuperando
        return view('productos', compact('platos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:100',
            'precio' => 'required|numeric'
        ]);

        return Plato::create($request->all()); // CREA UN NUEVO PLATO
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Plato::findOrFail($id); // MUESTRA UN PLATO ESPECIFICO POR SU ID
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $plato= Plato::findOrFail($id);
        $plato->update($request->all());// ACTUALIZAMOS LOS DATOS DEL PLATO
        return $plato;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Plato::destroy($id); // SE ENCARGA DE ELIMINAR AL PLATO CON ID $id
        return response()->json(["message"=>"El Plato ha sido Eliminado"]);
    }
}
