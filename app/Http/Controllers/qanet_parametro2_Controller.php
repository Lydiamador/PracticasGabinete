<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\qanet_parametro2;
class qanet_parametro2_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(qanet_parametro2::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->validate($this->data());
        $param=qanet_parametro2::create($data);
        return response()->json($param,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $param=qanet_parametro2::findOrFail($id);
        return response()->json($param);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $param=qanet_parametro2::findOrFail($id);
        $data= $request->validate($this->data());
        $param->update($data);
        return response()->json($param);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $param=qanet_parametro2::findOrFail($id);
        $param->delete();
        return response()->json(['mensaje'=>'El parametro ha sido eliminado.'],201);
    }

    private function data():array{
        return [
            'connom'=> 'required|string|size:100' ,
            'conentero' => 'nullable|integer|max:11',
            'contexto'=> 'nullable|string|size:50',
            'condoble'=> 'nullable|numeric'
        ];
    }
}
