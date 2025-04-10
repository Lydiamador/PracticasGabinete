<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User_support;
use Illuminate\Http\Request;

class User_support_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User_support::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request -> validate([
            'usuclicod' => 'nullable|integer|max:11', 
            'empresa' => 'nullable|string|max:255',
            'cod_empresa'=> 'nullable|string|max:255',
            'programa' => 'nullable|string|max:255',
            'terminal'=> 'nullable|string|max:255',
            'usuario'=> 'nullable|string|max:255',
            'telefono'=> 'nullable|string|max:255',
            'correo'=> 'nullable|string|max:255',
            'motivo'=> 'nullable|string',
            'accion'=> 'nullable|string|max:255',
            'tecnico'=> 'nullable|string|max:255',
            'evidencia1'=> 'nullable|string|max:255',
            'evidencia2'=> 'nullable|string|max:255',
            'evidencia3'=> 'nullable|string|max:255',
            'evidencia4'=> 'nullable|string|max:255',
            'evidencia5'=> 'nullable|string|max:255',
            'estado'=> 'nullable|string|in:Pendiente,Revision,Atendido',
            'created_at'=> 'nullable|timestamp',
            'updated_at'=> 'nullable|timestamp',
            'id_agente'=> 'nullable|integer|max:11'
        ]);

        $user= User_support::create($data);

        return response()->json($user,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User_support::findOrFail($id);
        
        return response()-> json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User_support::findOrFail($id);
        
        $data= $request -> validate([
            'usuclicod' => 'nullable|integer|max:11', 
            'empresa' => 'nullable|string|max:255',
            'cod_empresa'=> 'nullable|string|max:255',
            'programa' => 'nullable|string|max:255',
            'terminal'=> 'nullable|string|max:255',
            'usuario'=> 'nullable|string|max:255',
            'telefono'=> 'nullable|string|max:255',
            'correo'=> 'nullable|string|max:255',
            'motivo'=> 'nullable|string',
            'accion'=> 'nullable|string|max:255',
            'tecnico'=> 'nullable|string|max:255',
            'evidencia1'=> 'nullable|string|max:255',
            'evidencia2'=> 'nullable|string|max:255',
            'evidencia3'=> 'nullable|string|max:255',
            'evidencia4'=> 'nullable|string|max:255',
            'evidencia5'=> 'nullable|string|max:255',
            'estado'=> 'nullable|srting|in:Pendiente,Revision,Atendido',
            'created_at'=> 'nullable|timestamp',
            'updated_at'=> 'nullable|timestamp',
            'id_agente'=> 'nullable|integer|max:11'
        ]);

        $user->update($data);
        
        return response()-> json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User_support::findOrFail($id);
        $user->delete();
        return response()->json(['mensaje'=> 'Cliente eliminado correctamente.']);
    }
}
