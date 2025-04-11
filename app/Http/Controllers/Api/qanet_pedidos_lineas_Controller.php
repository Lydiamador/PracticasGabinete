<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\qanet_pedidos_lineas;
use Illuminate\Http\Request;

class qanet_pedidos_lineas_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(qanet_pedidos_lineas::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate($this->data());
        $pedLinea= qanet_pedidos_lineas::create($data);
        return response()->json($pedLinea,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pedLinea= qanet_pedidos_lineas::findOrFail($id);
        return response()->json($pedLinea);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pedLinea= qanet_pedidos_lineas::findOrFail($id);
        $data=$request->validate($this->data());
        $pedLinea->update($data);
        return response()->json($pedLinea);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pedLinea= qanet_pedidos_lineas::findOrFail($id);
        $pedLinea->delete();
        return response()->json(['mensaje'=>'El pedido en linia ha sido borrado correctamente.'],200);

    }


    private function data(): array{
        return [
           'id'=>'required|integer|max:11',
            'pedido_id'=>'required|integer|max:11',
            'aclcancaj'=>'nullable|numeric',
            'aclcajcod'=>'nullable|string|size:4',
            'aclextcod'=>'nullable|numeric',
            'aclextpre'=>'nullable|numeric',
            'aclpre'=>'nullable|numeric',
            'aclprelin'=>'nullable|numeric',
            'aclpretot'=>'nullable|numeric',
            'aclpreiva'=>'nullable|numeric',
            'acldes'=>'nullable|numeric',
            'acldes2'=>'nullable|numeric',
            'acldes3'=>'nullable|numeric',
            'aclivaimp'=>'nullable|numeric',
            'aclrecimp'=>'nullable|numeric',
            'aclimp'=>'nullable|numeric',
            'aclimptot'=>'nullable|numeric',
            'aclcajtip'=>'nullable|string|max:1',
            'acllot'=>'nullable|string|max:80',
            'aclfeccon'=>'nullable|string|max:80'
        ];
    }
}
