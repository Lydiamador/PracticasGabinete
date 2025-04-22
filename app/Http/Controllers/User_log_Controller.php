<?php

namespace App\Http\Controllers;

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
            'usucencod'=> 'nullable|string|max:4',
            'fechorentrada'=> 'nullable|date',
            'fechorsalida'=> 'nullable|date'
        ]);

        $user = User_log::create($data);

        return response()->json($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User_log::findOrFail($id);
        
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $usuclicod)
    {
        $user = User_log::findOrFail($usuclicod);
       
        $data=$request -> validate([
            'name' => 'nullable|string|max:255',
            'email'=> 'nullable|string|max:255',
            'usuclicod'=> 'nullable|string|max:255',
            'usucencod'=> 'nullable|string|max:4',
            'fechorentrada'=> 'nullable|date',
            'fechorsalida'=> 'nullable|date'
        ]);

        $user->update($data);
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $usuclicod)
    {
        $user = User_log::findOrFail($usuclicod);

        $user->delete();

        return response()->json(['mensaje'=>'Cliente eliminado correctamente.']);
    }

    public function search(Request $request)
    {
        $name = $request->query('name');
        $usuclicod = $request->query('usuclicod');

        if (($name && $usuclicod) || (!$name && !$usuclicod)) {
            return response()->json([
                'error' => 'Debes proporcionar solo uno de los parámetros: name o usuclicod'
            ], 400);
        }

        if ($name) {
            $users = User_log::where('name', 'like', "%{$name}%")->get(['email','fechorentrada', 'fechorsalida']);
        } else {
            $users = User_log::where('usuclicod', 'like', "%{$usuclicod}%")->get(['email','fechorentrada', 'fechorsalida']);
        }

        if ($users->isEmpty()) {
            return response()->json(['mensaje' => 'No se encontraron usuarios.'], 404);
        }

        return response()->json($users);
    }
}
