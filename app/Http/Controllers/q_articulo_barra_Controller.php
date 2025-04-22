<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\q_articulo_barra;
class q_articulo_barra_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return q_articulo_barra::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'barartcod'=> 'required|string|max:10',
            'barcod'=>'required|string|max:30',
            'barcan'=>'nullable|float'
        ]);
        $barart= q_articulo_barra::create($data);
        return response()->json($barart);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barart = q_articulo_barra::findOrFail($id);
        return response()->json($barart);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $barcod)
    {
        
        $barart = q_articulo_barra::findOrFail($barcod);

        $data = $request->validate([
            'barartcod'=> 'required|string|max:10',
            'barcod'=>'required|string|max:30',
            'barcan'=>'nullable|float'
        ]);
        $barart->update($data);
        
        return response()->json($barart);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $barcod)
    {
        $barart = q_articulo_barra::findOrFail($barcod);
        $barart->delete();
        return response()->json(['mensaje']);
    }

    public function search(Request $request){
        $barcod=$request->query('barcod');
        if(!$barcod){
            return response()->json(['Error'=> 'Debe introducir el código de barras del artículo.'],400);
        }
        $results = q_articulo_barra::where('barcod', 'like', "%{$barcod}%")->get();
        if ($results->isEmpty()){
            return response()->json(['mensaje'=>'No se ha encontrado ninguna coincidencia con la búsqueda.'],404);
        }
        return response()->json($results);
    }
}
