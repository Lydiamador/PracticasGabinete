<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Carbon\Carbon;

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
        // VALIDAMOS LOS DATOS
        $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric'
        ]);

        Menu::create($request->all());
        return redirect()->route('admin.menu')->with('success', 'Menú creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Menu::findOrFail($id); // SE ENCARGA DE ELIMINAR AL MENU CON ID $id
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
            'descripcion' => 'required|string',
            'precio' => 'required|numeric'
        ]);

        $menu->update($request->all());
        return redirect()->route('admin.menu')->with('success', 'Menú actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('admin.menu')->with('success', 'Menú eliminado exitosamente');
    }

    public function showPublicMenu()
    {
        $today = Carbon::now()->format('Y-m-d');
        $menu = Menu::where('fecha', $today)->first();
        return view('menu', compact('menu'));
    }

    public function menuDelDia()
    {
        $hoy = Carbon::now()->format('Y-m-d');
        $menu = Menu::where('fecha', $hoy)->first();
        return view('menu', compact('menu'));
    }
}
