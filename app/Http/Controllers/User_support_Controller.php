<?php

namespace App\Http\Controllerss;

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
    /**
     * Busqueda por el nombre de la empresa.
     */
    public function search(Request $request)
    {
        $empresa = $request->query('empresa');

        if (!$empresa) {
            return response()->json(['mensaje' => 'Debe proporcionar el nombre de la empresa para buscar.'], 400);
        }

        $results = User_support::where('empresa', 'like', "%{$empresa}%")->get();

        if ($results->isEmpty()) {
            return response()->json(['mensaje' => 'No se encontró ninguna coincidencia para la empresa especificada.'], 404);
        }

        return response()->json($results);
    }
    /**
     * Busqueda por el estado de empresas pendientes por soporte, muestra el motivo y la empresa
     */
    public function searchByEmpresaEstadoPendientes(Request $request){

        $countPendiente = User_support::where('estado', 'Pendiente')->count();
        $results = User_support::where('estado','Pendiente')->get(['Empresa', 'Motivo']);
        if ($results->isEmpty()) {
            return response()->json(['mensaje' => 'No se encontró ninguna coincidencia para el estado especificado.'], 404);
        }

        return response()->json([
                            'Pendientes'=>$countPendiente,
                            'Empresas'=>$results]);
    }
    /**
     * Busqueda por el estado de empresas en revision por soporte
     */
    public function searchByEmpresaEstadoRevision(Request $request){
        $countRevision = User_support::where('estado', 'Revision')->count();
        $results = User_support::where('estado','Revision')->get(['Empresa','Motivo']);

        if ($results->isEmpty()) {
            return response()->json(['mensaje' => 'No se encontró ninguna coincidencia para el estado especificado.'], 404);
        }

        return response()->json([
            'En revision'=>$countRevision,
            'Empresas'=>$results]);
    }
    /**
     * Busqueda por el estado de empresas atendidas por soporte
     */
    public function searchByEmpresaEstadoAtendido(Request $request){
        $countAtendido = User_support::where('estado', 'Atendido')->count();
        $results = User_support::where('estado','Atendido')->get(['Empresa','Motivo']);
        if ($results->isEmpty()) {
            return response()->json(['mensaje' => 'No se encontró ninguna coincidencia para el estado especificado.'], 404);
        }

        return response()-> json([
            'Atendido'=>$countAtendido,
            'Empresas'=>$results]);
    }

}
