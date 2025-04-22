<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\q_articulo;
class q_articulo_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  q_articulo::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'artcod'=> 'required|string|max:10',
            'artnom'=> 'nullable|string|max:50',
            'artmedcod'=> 'nullable|string|max:3',
            'artobs'=> 'nullable|string|max:1000',
            'artivacod'=> 'nullable|string|max:3',
            'artcatcod'=> 'nullable|string|max:3',
            'artsit'=> 'nullable|string|max:1',
            'artstock'=> 'nullable|float',
            'artest4'=> 'nullable|string|max:1000',
            'artcatcodw1'=> 'nullable|string|max:3',
            'artcodw2'=> 'nullable|string|max:3',
            'artmarcod'=> 'nullable|string|max:10',
            'artstocon'=> 'required|integer|max:11',
            'artsolcli'=> 'nullable|integer|max:11',
            'artivapor'=> 'required|float',
            'artrecpor'=> 'required|float',
            'artsigimp'=> 'required|float',
            'artfamcod'=> 'required|string|max:10',
            'artsfacod'=>'required|string|max:10',
            'ofcfamcod'=>'required|string|max:10',
            'ofcsfacod'=>'required|string|max:10',
            'artgrucod'=>'required|string|max:10'
        ]);

        $articulo = q_articulo::create($data);

        return response()->json($articulo);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $art = q_articulo::findOrFail($id);
       return response()->json($art);
    }
    public function showByCodigo($artcod){
        return q_articulo::findOrFail($artcod);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $art = q_articulo::findOrFail($id);
        $data = $request->validate([
            'artcod'=> 'required|string|max:10',
            'artnom'=> 'nullable|string|max:50',
            'artmedcod'=> 'nullable|string|max:3',
            'artobs'=> 'nullable|string|max:1000',
            'artivacod'=> 'nullable|string|max:3',
            'artcatcod'=> 'nullable|string|max:3',
            'artsit'=> 'nullable|string|max:1',
            'artstock'=> 'nullable|float',
            'artest4'=> 'nullable|string|max:1000',
            'artcatcodw1'=> 'nullable|string|max:3',
            'artcodw2'=> 'nullable|string|max:3',
            'artmarcod'=> 'nullable|string|max:10',
            'artstocon'=> 'required|integer|max:11',
            'artsolcli'=> 'nullable|integer|max:11',
            'artivapor'=> 'required|float',
            'artrecpor'=> 'required|float',
            'artsigimp'=> 'required|float',
            'artfamcod'=> 'required|string|max:10',
            'artsfacod'=>'required|string|max:10',
            'ofcfamcod'=>'required|string|max:10',
            'ofcsfacod'=>'required|string|max:10',
            'artgrucod'=>'required|string|max:10'
        ]);
        $art->update($data);
       return response()->json($art);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $art = q_articulo::findOrFail($id);
        $art->delete();
        return response()->json(['mensaje'=>'El articulo ha sicho eliminado.']);
    }
}
