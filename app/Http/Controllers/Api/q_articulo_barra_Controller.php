<?php

namespace App\Http\Controllers\Api;

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
    public function update(Request $request, string $id)
    {
        
        $barart = q_articulo_barra::findOrFail($id);

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
    public function destroy(string $id)
    {
        $barart = q_articulo_barra::findOrFail($id);
        $barart->delete();
        return response()->json(['mensaje']);
    }
}
