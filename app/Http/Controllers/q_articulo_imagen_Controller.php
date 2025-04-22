<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\q_articulo_imagen;
class q_articulo_imagen_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return q_articulo_imagen::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'imaartcod' => 'required|string|max:10',
            'imacod'=> 'required|integer|max:11',
            'imanom'=> 'nullable |string|max:255',
            'imatip'=> 'nullable|integer|max:11'
        ]);
        
        $imaart = q_articulo_imagen::create($data);
        return response()->json($imaart);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $imaart=q_articulo_imagen::findOrFail($id);
        return response()->json($imaart);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $imaart=q_articulo_imagen::findOrFail($id);

        $data=$request->validate([
            'imaartcod' => 'required|string|max:10',
            'imacod'=> 'required|integer|max:11',
            'imanom'=> 'nullable |string|max:255',
            'imatip'=> 'nullable|integer|max:11'
        ]);
        $imaart->update($data);

        return response()->json($imaart);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $imaart = q_articulo_imagen::findOrFail($id);
        $imaart->delete();
        return response()->json(['mensaje'=>'Imagen de articulo eliminada.']);
    }
}
