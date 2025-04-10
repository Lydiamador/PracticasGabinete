<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\q_marca;
class q_marca_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return q_marca::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'marcod'=>'required|string|max:10',
            'marnom'=>'nullable|string|max:50'
        ]);

        $marca = q_marca::create($data);
        return response()->json($marca);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $marca= q_marca::findOrFail($id);
        return response()-> json($marca);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $marca= q_marca::findOrFail($id);
        $data = $request->validate([
            'marcod'=>'required|string|max:10',
            'marnom'=>'nullable|string|max:50'
        ]);
        $marca->update($data);
        return response()-> json($marca);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $marca= q_marca::findOrFail($id);
        $marca->delete();
        return response()-> json(['mensaje'=>'La marca se ha eliminado correctamente.']);
    }
}
