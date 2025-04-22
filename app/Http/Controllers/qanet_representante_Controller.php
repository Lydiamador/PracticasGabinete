<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\qanet_representante;
class qanet_representante_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return qanet_representante::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'rprcod' => 'required|string|max:15',
            'rprnom'=>'required|string|max:50',
            'rprema'=>'required|string|max:50',
            'rprdelcod'=>'required|string|max:15',
            'rprsyn'=>'required|string|size:1',
            'rpralmcod'=>'required|string|size:15',
            'rprtarcod'=>'required|string|size:3',
            'rprporcom'=>'required|numeric',
            'rprporcom2'=>'required|numeric',
            'rprtel'=>'required|string|max:50'
        ]);

        $repre = qanet_representante::create($repre);

        return response()->json($repre,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $repre = qanet_representante::findOrFail($id);

        return response()->json($repre);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $repre = qanet_representante::findOrFail($id);

        $data=$request->validate([
            'rprcod' => 'required|string|max:15',
            'rprnom'=>'required|string|max:50',
            'rprema'=>'required|string|max:50',
            'rprdelcod'=>'required|string|max:15',
            'rprsyn'=>'required|string|size:1',
            'rpralmcod'=>'required|string|size:15',
            'rprtarcod'=>'required|string|size:3',
            'rprporcom'=>'required|float',
            'rprporcom2'=>'required|float',
            'rprtel'=>'required|string|max:50'
        ]);
        $repre->update($data);

        return response()->json($repre);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $repre = qanet_representante::findOrFail($id);
        $repre->delete();
        return response()->json(['mensaje'=>'El representante ha sido eliminado correctamente'],200);
    }

    public function search(Request $request){
        $rprnom = $request->query('rprnom');

        if(!$rprnom){
            return response()->json(['mensaje'=>'Debe proporcionar el nombre del representante'],400);
        }

        $results = qanet_representante::where('rprnom', 'like', "%{$rprnom}%")->get();

        if($results->isEmpty()){
            return response()->json(['mensaje'=>'No se ha encontrado ninguna coincidencia con el nombre indicado.'],404);
        }

        return response()->json($results);
    }
}
