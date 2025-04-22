<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\qanet_oferta_express;
use Illuminate\Http\Request;

class qanet_oferta_express_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return qanet_oferta_express::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->validate($this->data());
        $oferexp=qanet_oferta_express::create($data);
        return response()->json($oferexp,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $oferexp = qanet_oferta_express::findOrFail($id);
        return response()->json($oferexp);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $oferexp = qanet_oferta_express::findOrFail($id);
        $data= $request->validate($this->data());
        $oferexp->update($data);
        return response()->json($oferexp);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $oferexp = qanet_oferta_express::findOrFail($id);
        $oferexp->delete();
        return response()->json(['mensaje'=>'La oferta express ha sido eliminada.'],200);
    }

    private function data():array{
        return [
            'idartcod' => 'nullable|integer|max:11',
            'ofeartcod' => 'nullable|string|size:10',
            'ofepre' => 'nullable|numeric',
            'ofefecini' => 'nullable|date',
            'ofefecfin' => 'nullable|date'
        ];
    }
}
