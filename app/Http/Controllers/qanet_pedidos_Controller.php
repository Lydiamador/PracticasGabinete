<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\qanet_pedidos;
class qanet_pedidos_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(qanet_pedidos::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate($this->data());
        $qpedidos= qanet_pedidos::create($data);
        return response()->json($qpedidos,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $qpedidos=qanet_pedidos::findOrFail($id);
        return response()->json($qpedidos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $qpedidos=qanet_pedidos::findOrFail($id);
        $data=$request->validate($this->data());
        $qpedidos->update($data);
        return response()->json($qpedidos);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $qpedidos=qanet_pedidos::findOrFail($id);
        $qpedidos->delete();
        return response()->json(['mensaje' => 'El pedido ha sido eliminado correctamente'], 200);
    }

    private function data(): array{
        return [
            'id' => 'required|numeric',
            'accdes'=> 'nullable|numeric',
            'accdes2'=> 'nullable|numeric',
            'accdes3'=> 'nullable|numeric',
            'accpor'=> 'nullable|integer|max:11',
            'accrecmer'=> 'nullable|string|max:15',
            'accpedcli'=> 'nullable|string|max:60',
            'accalbcer'=> 'nullable|string|max:60',
            'accpro'=> 'nullable|string|max:15',
            'accdep'=> 'nullable|string|max:10',
            'accclicod'=> 'nullable|string|max:15',
            'acccencod'=> 'nullable|string|max:4' 
        ];
    }
}
