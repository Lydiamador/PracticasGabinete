<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\q_categoria;
class q_categoria_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return q_categoria::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->validate([
            'carcod'=> 'required|string|max:3',
            'catnom'=> 'nullable|string|max:50',
            'catcatcod'=> 'nullable|string|max:3',
            'catima'=> 'nullable|string|max:100',
            'catsolcli'=> 'nullable|integer|max:11'
        ]);

        $categoria= q_categoria::create($data);

        return response()->json($categoria);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = q_categoria::findOrFail($id);
        return response()->json($categoria);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $catnom)
    {
        $categoria = q_categoria::findOrFail($catnom);
        $data= $request->validate([
            'carcod'=> 'required|string|max:3',
            'catnom'=> 'nullable|string|max:50',
            'catcatcod'=> 'nullable|string|max:3',
            'catima'=> 'nullable|string|max:100',
            'catsolcli'=> 'nullable|integer|max:11'
        ]);
        $categoria->update($data);
        return response()->json($categoria);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $catnom)
    {
        $categoria = q_categoria::findOrFail($catnom);
        $categoria->delete();
        return response()->json(['mensaje'=>'Categoria eliminada correctamente.']);
    }

    public function search(Request $request){
        $catnom = $request->query('catnom');

        if (!$catnom){
            return response()->json(['Error'=>'Debe introducir el nombre de la categoría.'],400);
        }

        $results = q_categoria::where('catnom', 'like', "%{$catnom}%")->get();
        if($results->isEmpty()){
            return response()->json(['Error'=>'No se ha encontrado ninguna coincidencia con la búsqueda.'],404);
        }

        return response()->json($results);
    }
}
