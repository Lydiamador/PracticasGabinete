<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User_support_details;
use Illuminate\Http\Request;

class User_support_details_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User_support_details::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_user_support' => 'nullable|integer|max:11',
            'tecnico'=> 'nullable|string|max:255',
            'observaciones'=>'nullable|string',
            'tiempo_uso' => 'nullable|time',
        ]);

        $user= User_support_details::create($data);

        return response()-> json($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user=User_support_details::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user=User_support_details::findOrFail($id);
        $data = $request->validate([
            'id_user_support' => 'nullable|integer|max:11',
            'tecnico'=> 'nullable|string|max:255',
            'observaciones'=>'nullable|string',
            'tiempo_uso' => 'nullable|time',
        ]);

        $user->update($data);

        return response()-> json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
        $user= User_support_details::findOrFail($id);
        $user->delete();
        return response()-> json(['mensaje'=>'El usuario ha sido eliminado correctamente.']);
    }

    public function search(Request $request)
    {
        $tecnico = $request->query('tecnico');

        if (!$tecnico) {
            return response()->json(['mensaje' => 'Debe proporcionar un parámetro de búsqueda.'], 400);
        }

        $users = User_support_details::where('tecnico', 'like', "%{$tecnico}%")->get();

        if ($users->isEmpty()) {
            return response()->json(['mensaje' => 'No se encontró técnico.'], 404);
        }

        return response()->json($users);
    }

}
