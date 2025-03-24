<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource (vista pública).
     */
    public function index()
    {
        // Obtener todos los productos agrupados por categoría
        $productos = Producto::all()->groupBy('categoria');
        return view('productos', compact('productos'));
    }

    /**
     * Display a listing of the resource (vista de administración).
     */
    public function adminIndex()
    {
        // Obtener todos los productos para la gestión
        $productos = Producto::all();
        return view('admin.gestion-productos', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Pasar la lista de productos para mantener la tabla visible
        $productos = Producto::all();
        return view('admin.gestion-productos', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'categoria' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Crear una nueva instancia de Producto
        $producto = new Producto($request->only(['categoria', 'nombre', 'precio']));

        // Procesar la imagen si existe
        if ($request->hasFile('imagen')) {
            $producto->imagen = $request->file('imagen')->store('productos', 'public');
        }

        // Guardar el producto en la base de datos
        $producto->save();

        // Redirigir con mensaje de éxito
        return redirect()->route('gestion-productos')->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Buscar el producto por su ID
        $producto = Producto::findOrFail($id);

        // Obtener todos los productos para mantener la tabla visible
        $productos = Producto::all();

        // Pasar tanto el producto como la lista de productos a la vista
        return view('admin.gestion-productos', compact('producto', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'categoria' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        // Buscar el producto a actualizar
        $producto = Producto::findOrFail($id);
        $producto->fill($request->only(['categoria', 'nombre', 'precio']));

        // Procesar la imagen si existe
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($producto->imagen) {
                Storage::disk('public')->delete($producto->imagen);
            }
            $producto->imagen = $request->file('imagen')->store('productos', 'public');
        }

        // Guardar los cambios en la base de datos
        $producto->save();

        // Redirigir con mensaje de éxito
        return redirect()->route('gestion-productos')->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar el producto a eliminar
        $producto = Producto::findOrFail($id);

        // Eliminar la imagen asociada si existe
        if ($producto->imagen) {
            Storage::disk('public')->delete($producto->imagen);
        }

        // Eliminar el producto de la base de datos
        $producto->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('gestion-productos')->with('success', 'Producto eliminado exitosamente.');
    }
}