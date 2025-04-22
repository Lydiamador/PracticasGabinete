<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\qanet_palet;
use Illuminate\Http\Request;

class qanet_palet_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(qanet_palet::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request($this->data());
        $palet= qanet_palet::create($data);
        return response()->json($palet,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $palet = qanet_palet::findOrFail($id);
        return response()->json($palet);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $palet = qanet_palet::findOrFail($id);
        $data=$request($this->data());
        $palet->update($data);
        return response()->json($palet);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $palet = qanet_palet::findOrFail($id);
        $palet->delete();
        return response()->json(['mensaje'=>'Palet eliminado correctamente'],200);
    }

    private function data():array{
        return [
            'palartcod'=> ' required|string|size:100',
            'palcod'=>'required|string|size:4' ,
            'palcajcod'=>'nullable|string|size:4',
            'palnom'=> 'nullable|string|size:50',
            'palnumcaj'=>'nullable|numeric',
            'palbarcod'=> 'nullable|string|size:20',
            'paldef'=> 'nullable|integer|max:11',
        ];
    }
}
