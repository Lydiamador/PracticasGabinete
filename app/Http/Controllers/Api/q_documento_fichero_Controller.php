<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\q_documento_fichero;
class q_documento_fichero_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return q_documento_fichero::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->validate([
            'qdocumento_id'=>'nullable|integer|max:11',
            'doctip'=>'nullable|string|max:2',
            'docser'=> 'nullable|string|max:5',
            'doceje'=> 'nullable|string|max:4',
            'docnum'=> 'nullable|float',
            'docord'=>'nullable|integer|max:11',
            'docfichero'=> 'nullable|string|max:255'
        ]);
        $doc = q_documento_fichero::create($data);
        return response()->json($doc);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doc= q_documento_fichero::findOrFail($id);
        return response()->json($doc);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $doc= q_documento_fichero::findOrFail($id);
        $data= $request->validate([
            'qdocumento_id'=>'nullable|integer|max:11',
            'doctip'=>'nullable|string|max:2',
            'docser'=> 'nullable|string|max:5',
            'doceje'=> 'nullable|string|max:4',
            'docnum'=> 'nullable|float',
            'docord'=>'nullable|integer|max:11',
            'docfichero'=> 'nullable|string|max:255'
        ]);
        $doc->update($data);
        return response()->json($doc);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doc = q_documento_fichero::findOrFail($id);
        $doc->delete();
        return response()->json(['mensaje'=>'Documento eliminado correctamente.']);
    }

    public function search(Request $request){
        
    }
}
