<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.gestion-menu', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'required|string|max:400|min:10',
            'precio' => 'required|numeric',
            'imagen1' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4000',
            'imagen2' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4000',
            'imagen3' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4000'
        ]);

        $menu = new Menu($request->all());

        // Procesar las imágenes
        if ($request->hasFile('imagen1')) {
            $menu->imagen1 = $request->file('imagen1')->store('menus', 'public');
        }
        if ($request->hasFile('imagen2')) {
            $menu->imagen2 = $request->file('imagen2')->store('menus', 'public');
        }
        if ($request->hasFile('imagen3')) {
            $menu->imagen3 = $request->file('imagen3')->store('menus', 'public');
        }

        $menu->save();
        return redirect()->route('admin.menu')->with('success', 'Menú creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Menu::findOrFail($id);
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
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'required|string|max:400|min:10',
            'precio' => 'required|numeric',
            'imagen1' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'imagen2' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'imagen3' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $menu->fill($request->only(['fecha', 'descripcion', 'precio']));

        // Procesar las imágenes
        if ($request->hasFile('imagen1')) {
            if ($menu->imagen1) {
                Storage::disk('public')->delete($menu->imagen1);
            }
            $menu->imagen1 = $request->file('imagen1')->store('menus', 'public');
        }
        if ($request->hasFile('imagen2')) {
            if ($menu->imagen2) {
                Storage::disk('public')->delete($menu->imagen2);
            }
            $menu->imagen2 = $request->file('imagen2')->store('menus', 'public');
        }
        if ($request->hasFile('imagen3')) {
            if ($menu->imagen3) {
                Storage::disk('public')->delete($menu->imagen3);
            }
            $menu->imagen3 = $request->file('imagen3')->store('menus', 'public');
        }

        $menu->save();
        return redirect()->route('admin.menu')->with('success', 'Menú actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        // Eliminar las imágenes asociadas
        if ($menu->imagen1) {
            Storage::disk('public')->delete($menu->imagen1);
        }
        if ($menu->imagen2) {
            Storage::disk('public')->delete($menu->imagen2);
        }
        if ($menu->imagen3) {
            Storage::disk('public')->delete($menu->imagen3);
        }

        $menu->delete();
        return redirect()->route('admin.menu')->with('success', 'Menú eliminado exitosamente');
    }

    public function menuDelDia()
    {
        $hoy = Carbon::now();
        $menu = Menu::where('fecha', $hoy->format('Y-m-d'))->first();
        $fechaActual = $hoy->format('d/m/Y');
        return view('menu', compact('menu', 'fechaActual'));
    }
}
