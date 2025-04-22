<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_qanet;
class User_qanet_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User_qanet::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request -> validate([
            'usuid' => 'required|integer|max:11',
            'usunif' => 'requires|string|max:50',
            'usuclicod' => 'requires|string|max:15',
            'usucencod' => 'requires|string|max:4'
        ]);

        $user =  User_qanet::create($data);

        return response()-> json($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User_qanet::findOrFail($id);

        return response()-> json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $usuclicod)
    {
        $user = User_qanet::findOrFail($usuclicod);

        $data = $request -> validate([
            'usuid' => 'required|integer|max:11',
            'usunif' => 'requires|string|max:50',
            'usuclicod' => 'requires|string|max:15',
            'usucencod' => 'requires|string|max:4'
        ]);
        
        $user->update($data);
        return response()-> json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $usuclicod)
    {
        $user = User_qanet::findOrFail($usuclicod);

        $user->delete();

        return response()-> json($user);
    }

    public function search(Request  $request){
        $usuclicod= $request->query('usuclicod');
        if (!$usuclicod) {
            return response()->json(['mensaje' => 'Debe proporcionar el código del cliente para buscar.'], 400);
        }

        $results = User_qanet::where('usuclicod', 'like', "%{$usuclicod}%")->get();

        if ($results->isEmpty()) {
            return response()->json(['mensaje' => 'No se encontró ninguna coincidencia para el usuario especificado.'], 404);
        }

        return response()->json($results);
    }
}
