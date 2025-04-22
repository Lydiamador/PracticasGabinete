<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\q_documento;
class q_documento_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return q_documento::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->validate([
            'doctip'=> 'nullable|string|max:2',
            'docser'=> 'nullable|string|max:5',
            'doceje'=> 'nullable|string|max:4',
            'docnum'=> 'nullable|float',
            'docfec'=> 'nullable|date',
            'docclicod'=> 'nullable|string|max:15',
            'doccencod'=> 'nullable|string|max:4',
            'docimp'=> 'nullable|float',
            'docimptot'=> 'nullable|float',
            'docobs'=> 'nullable|string|max:255',
            'docfccser'=> 'nullable|string|max:5',
            'docfcceje'=> 'nullable|string|max:4',
            'docfccnum'=> 'nullable|float',
            'docimpcob'=> 'nullable|float',
            'docimppen'=> 'nullable|float',
            'doccob'=> 'nullable|integer|max:11',
            'docenviado'=> 'nullable|integer|max:11'
        ]);

        $documento = q_documento::create($data);
        return response()->json($documento);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $documento = q_documento::findOrFail($id);
        return response()->json($documento);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $docnum)
    {
        $documento = q_documento::findOrFail($docnum);
        $data= $request->validate([
            'doctip'=> 'nullable|string|max:2',
            'docser'=> 'nullable|string|max:5',
            'doceje'=> 'nullable|string|max:4',
            'docnum'=> 'nullable|float',
            'docfec'=> 'nullable|date',
            'docclicod'=> 'nullable|string|max:15',
            'doccencod'=> 'nullable|string|max:4',
            'docimp'=> 'nullable|float',
            'docimptot'=> 'nullable|float',
            'docobs'=> 'nullable|string|max:255',
            'docfccser'=> 'nullable|string|max:5',
            'docfcceje'=> 'nullable|string|max:4',
            'docfccnum'=> 'nullable|float',
            'docimpcob'=> 'nullable|float',
            'docimppen'=> 'nullable|float',
            'doccob'=> 'nullable|integer|max:11',
            'docenviado'=> 'nullable|integer|max:11'
        ]);

        $documento->update($data);
        return response()->json($documento);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $docnum)
    {
        $doc = q_documento::findOrFail($docnum);
        $doc->delete();
        return response()->json(['mensaje'=>'Documento eliminado correctamente.']);
    }

    public function search(Request $request){
        $docclicod=$request->query('docclicod');
        $docnum=$request->query('docnum');

        if($docclicod && $docnum || !$docclicod && !$docnum){
            return response()->json(['error' => 'Debes proporcionar solo uno de los parámetros: docclicod o docnum'], 400);
        }
        
        if($docclicod){
            $doc= q_documento::where('docclicod', 'like', "%{$docclicod}%")->get();
        }else{
            $doc= q_documento::where('docnum', 'like', "%{$docnum}%")->get();
        }

        if($doc->isEmpty()){
            return reponse()->json(['mensaje'=>'No se ha encontrado ninguna coincidencia con la búsqueda.'],404);
        }
        return response()->json($doc);
    }
}
