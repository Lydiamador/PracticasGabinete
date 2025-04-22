<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\qanet_listaprecios;
use Illuminate\Http\Request;

class qanet_listaprecios_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return qanet_listaprecios::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate($this->data());
        $lprecios= qanet_listaprecios::create($data);
        return response()->json($lprecios);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lprecios=qanet_listaprecios::findOrFail($id);
        return response()->json($lprecios);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lprecios=qanet_listaprecios::findOrFail($id);
        $data=$request->validate($this->data());
        $lprecios->update($data);
        return response()->json($lprecios);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lprecios=qanet_listaprecios::findOrFail($id);
        $lprecios->delete();
        return response()->json(['mensaje'=>'Se ha eliminado correctamente.']);
    }

    private function data():array{
        return [
            'clicod'=> 'required|string|max:12',
            'clicencod'=> 'required|string|max:4',
            'artcod'=> 'required|string|max:10',
            'precioconporte'=> 'required|numeric',
            'preciosinporte'=> 'required|numeric'
        ];
    }
}
