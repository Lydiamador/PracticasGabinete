<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\q_etiqueta;
class q_etiqueta_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return q_etiqueta::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'tagnom'=> 'nullable|string|max:50',
            'tagtip'=> 'nullable|integer|max:11',
            'tagima'=> 'nullable|string|max:20'
        ]);
        $etiqueta= q_etiqueta::create($data);
        return response()->json($etiqueta);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $etiqueta = q_etiqueta::findOrFail($id);
        return response()->json($etiqueta);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $etiqueta = q_etiqueta::findOrFail($id);
        $data=$request->validate([
            'tagnom'=> 'nullable|string|max:50',
            'tagtip'=> 'nullable|integer|max:11',
            'tagima'=> 'nullable|string|max:20'
        ]);
        $etiqueta->update($data);
        return response()->json($etiqueta);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $etiqueta = q_etiqueta::findOrFail($id);
        
        $etiqueta->delete();

        return response()->json($etiqueta);

    }

    public function search(Request $request){
        $tagnom = $request->query('targnom');

        if(!$tagnom){
            return response()->json(['mensaje'=>'Debe proporcionar el nombre de la etiqueta que busca.'],400);
        }
        
        $results = q_etiqueta::where('tagnom', 'like', "%{$tagnom}%")->get();

        if($results->isEmpty()){
            return response()->json(['mensaje'=>'No se ha encontrado ninguna coincidencia de la busqueda.'],404);
        }

        return response()->json($results);
    }
        
}
