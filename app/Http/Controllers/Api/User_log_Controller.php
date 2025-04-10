<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_log;
class User_log_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User_log::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request -> validate([
            'name' => 'nullable|string|max:255',
            'email'=> 'nullable|string|max:255',
            'usuclicod'=> 'nullable|string|max:255',
            'usucencod'=> 'nullable|string|maz:4',
            'fechorentrada'=> 'nullable|timestamp',
            'fechorsalida'=> 'nullable|timestamp'
        ]);

        $user = User_log::create($data);

        return response()->json($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User_log::find($id);
        if (!$user){
            abort(404,"El usurio no cliente no existe");
        }

        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User_log::find($id);
        if (!$user){
            abort(404,"El usurio no cliente no existe");
        } 

        $data=$request -> validate([
            'name' => 'nullable|string|max:255',
            'email'=> 'nullable|string|max:255',
            'usuclicod'=> 'nullable|string|max:255',
            'usucencod'=> 'nullable|string|maz:4',
            'fechorentrada'=> 'nullable|timestamp',
            'fechorsalida'=> 'nullable|timestamp'
        ]);

        $user->update($data);

        return reponse()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User_log::findOrFail($id);

        $user->delete;

        return response()->json(['mensaje'=>'Cliente eliminado correctamente.']);
    }
}
