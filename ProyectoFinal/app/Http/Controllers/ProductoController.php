<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all()->groupBy('categoria');
        return view('productos', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoria' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric'
        ]);

        $producto = Producto::create($request->all());
        return response()->json($producto, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producto = Producto::findOrFail($id);
        return response()->json($producto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'categoria' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric'
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($request->all());
        return response()->json($producto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return response()->json(["message" => "El Producto ha sido eliminado"]);
    }

    public function adminIndex()
    {
        $productos = Producto::all();
        return view('admin.gestion-productos', compact('productos'));
    }
}
