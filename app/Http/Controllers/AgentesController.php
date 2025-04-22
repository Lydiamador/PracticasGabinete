<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agentes;

class AgentesController extends Controller
{
    // DEVOLVEMOS TODOS LOAS AGENTES
    public function index(){
        return Agentes::all();
    }

    // DEVOLVEMOS UN AGENTE POR NOMBRE
    public function showByName($name) {
        return Agentes::where('name', $name)->firstOrFail();
    }
    
     // DEVOLVEMOS UN AGENTE POR EMAIL
    public function showByEmail($email) {
        return Agentes::where('email', $email)->firstOrFail();
    }
    

    // CREAMOS UN NUEVO AGENTE
    public function store(Request $request){
        $data= $request = validate([
            'id'=>'required|integer|auto_increment|max:11',
            'name'=>'required|string|max:50',
            'email'=> 'required|string|max:255',
            'password'=> 'required|string|max:255',
            'tipo'=> 'required|string|max:60',
            'foto'=> 'required|string|max:255',
        ]);

        // CREAMOS A LOS AGENTES
        $agentes = Agentes::create($data);
       // DEVOLVEMOS EL AGENTE CREADO
       return response()->json($agentes,201);
    }

    // ACTUALIZAMOS UN AGENTE
    public function update(Request $request, $id){
            // VALIDAMOS LOS DATOS
            $agentes = Agentes::findOrFail($id);

            $data= $request = validate([
            'id'=>'required|integer|auto_increment|max:11',
            'name'=>'required|string|max:50',
            'email'=> 'required|string|max:255',
            'password'=> 'required|string|max:255',
            'tipo'=> 'required|string|max:60',
            'foto'=> 'required|string|max:255',]);

            // ACTUALIZAMOS LOS DATOS
            $agentes->update($data);
            return response()->json($agentes);
    }

    //ELIMINAMOS UN AGENTE
    public function destroy($id){
        Agentes::destroy($id);
        return response()->json(null, 204);
    }
    

}
