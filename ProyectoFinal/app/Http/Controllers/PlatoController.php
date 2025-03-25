<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage; 
use Illuminate\Http\Request;
use App\Models\Plato;

class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener los platos agrupados por el tipo
        $platos= Plato::all()->groupBy('tipo');
        return view('platos', compact('platos'));
    }

    public function adminIndex()
    {
        // Obtener todos los platos para la gestión
        $platos = Plato::all();
        return view('admin.gestion-platos', compact('platos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $platos = Plato::all();
        return view('admin.gestion-platos', compact('platos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:100',
            'precio' => 'required|numeric',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'

        ]);

        // CREAR UNA NUEVA INSTANCIA DE ESTE PLATO
        $plato = new Plato($request->only(['nombre', 'tipo', 'precio']));

        // PROCESAR LA IMAGEN EN CASO DE QUE EXISTA
        if($request->hasFile('imagen')){
            $plato->imagen= $request->file("imagen")->store('platos', 'public');
        }

        // GUARDAMOS EL PLATO EN LA BASE DE DATOS
        $plato->save();

        // MOSTRAR MENSAJE DE EXITO
        return redirect()->route("gestion-platos")->with('success', 'Plato creado exitosamente.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // BUSCAR PLATO POR ID
        $plato = Plato::findOrFail($id);

        // OBTENER TODOS LOS PLATOS PARA MANTENER LA TABLA VISIBLE
        $platos = Plato::all();

        // PASAR TANTO EL PRODUTO COMO LA LISTA DE PRODUCTOS A LA VISTA
        return view("admin.gestion-platos", compact("plato","platos")); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // VALIDAR LOS DATOS DEL FORMULARIO 
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:100',
            'precio' => 'required|numeric',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'

        ]);

        // BUSCAR EL PLATO A ACTUALIAR
        $plato = Plato::findOrFail($id);
        $plato->fill($request->only(['nombre', 'tipo', 'precio']));

        // PROCESAR LA IMAGEN EN CASO DE QUE EXISTA
        if($request->hasFile('imagen')){
            // ELIMINAR LA IMAGEN SI EXISTE
            if($plato->imagen){
                Storage::disk('public')->delete($plato->imagen);
            }
            $plato->imagen = $request->file('imagen')->store('platos', 'public');
        }

        // GUARDAMOS EL PLATO EN LA BASE DE DATOS
        $plato->save();

        // MOSTRAR MENSAJE DE EXITO
        return redirect()->route("gestion-platos")->with('success', 'Plato actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // BUSCAR EL PLATO A ELIMINAR
        $plato = Plato::findOrFail($id);

        // ELIMINAR LA IMAGEN SI EXISTE
        if($plato->imagen){
            Storage::disk('public')->delete($plato->imagen);
        }

        // ELIMINAR EL PLATO DE LA BASE DE DATOS
        $plato->delete();

        // MOSTRAR MENSAJE DE EXITO
        return redirect()->route("gestion-platos")->with('success', 'Plato eliminado exitosamente.');
    }
}
