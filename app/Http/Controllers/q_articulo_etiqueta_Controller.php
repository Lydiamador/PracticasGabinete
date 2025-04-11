<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\q_articulo_etiqueta;
class q_articulo_etiqueta_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return q_articulo_etiqueta::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'etiartcod'=> 'nullable |string|max:10',
            'etitagcod'=> 'nullable|integer|max:11'
        ]);
        $arteti = q_articulo_etiqueta::create($data);
        return response()->json($arteti);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $etiart= q_articulo_etiqueta::findOrFail($id);
        return response()->json($etiart);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $etiart= q_articulo_etiqueta::findOrFail($id);
        $data=$request->validate([
            'etiartcod'=> 'nullable |string|max:10',
            'etitagcod'=> 'nullable|integer|max:11'
        ]);
        $etiart->update($data);
        return response()->json($etiart);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $etiart= q_articulo_etiqueta::findOrFail($id);
        $etiart->delete();
        return response()->json(['mensaje']);
    }
}
