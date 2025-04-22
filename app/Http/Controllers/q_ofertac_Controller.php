<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\q_ofertac;
class q_ofertac_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return q_ofertac::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->validate([
            'ofcnum'=> 'required|integer|max:11',
            'ofccod'=> 'nullable|string|max:10',
            'ofcartcod'=> 'nullable|string|max:10',
            'ofcfecini' => 'nullable|datetime',
            'ofcfecfin'=> 'nullable|datetime',
            'ofccatcodw1'=> 'nullable|string|max:3',
            'OFCIMP'=> 'nullable|float',
            'ofctip'=> 'nullable|string|max:2',
            'ofcima'=> 'nullable|string|max:255',
            'ofcfamcod'=> 'required|string|max:10',
            'ofcsfacod'=> 'required|string|max:10'
        ]);

        $ofertac=q_ofertac::create($data);

        return response()->json($ofertac);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ofertac= q_ofertac::findOrFail($id);
        return response()->json($ofertac);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ofertac= q_ofertac::findOrFail($id);

        $data= $request->validate([
            'ofcnum'=> 'required|integer|max:11',
            'ofccod'=> 'nullable|string|max:10',
            'ofcartcod'=> 'nullable|string|max:10',
            'ofcfecini' => 'nullable|datetime',
            'ofcfecfin'=> 'nullable|datetime',
            'ofccatcodw1'=> 'nullable|string|max:3',
            'OFCIMP'=> 'nullable|float',
            'ofctip'=> 'nullable|string|max:2',
            'ofcima'=> 'nullable|string|max:255',
            'ofcfamcod'=> 'required|string|max:10',
            'ofcsfacod'=> 'required|string|max:10'
        ]);

        return response()->json($ofertac);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ofertac= q_ofertac::findOrFail($id);

        $ofertac->delete();

        return response()->json(['mensaje'=>'Oferta eliminada correctamente']);
    }

    public function search(Request $request){
        $ofccod=$request->query('ofccod');

        if(!$ofcod){
            return reponse()->json(['mensaje'=>'Debe proporcionar el código de la oferta que busca.'],400);
        }

        $results= q_ofertac::where('ofccod', 'like', "%{$offcod}%")->get();

        if($results->isEmpty()){
            return response()->json(['mensaje'=>'No se ha encontrado ninguna coincidencia con la busqueda realizda.'], 404);
        }

        return response()->json($results);
    }
    
}
