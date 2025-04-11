<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\q_articulo_precio;

class q_articulo_precio_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return q_articulo_precio::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'preartcod' => 'required|string|max:10',
            'pretarcod' => 'required|string|max:3',
            'preimp'=> 'nullable|numeric',
            'preimp2'=>'required|numeric'
        ]);

        $preart = q_articulo_precio::create($data);
        return response()->json($preart);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $preart = q_articulo_precio::findOrFail($id);
        return response()->json($preart);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $preart = q_articulo_precio::findOrFail($data);

        $data=$request->validate([
            'preartcod' => 'required|string|max:10',
            'pretarcod' => 'required|string|max:3',
            'preimp'=> 'nullable|numeric',
            'preimp2'=>'required|numeric'
        ]);
        $preart->update($data);

        return response()->json($preart);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $preart = q_articulo_precio::findOrfail($id);
        $preart->delete();
        return response()->json(['mensaje'=>'El precio del articulo ha sido eliminado.']);
    }
}
