<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Password_Reset_Tokens;

class PasswordResetTokenController extends Controller
{
    // MOSTRAR TODOS LOS TOKENS DE RECUPERACION DE CONTRASEÑA
    public function index(){
        $token = Password_Reset_Tokens::all();
        return response()->json($token);
    }

    // MOSTRAR UN TOKEN DE RECUPERACION DE CONTRASEÑA
    public function show($id){
        $token = Password_Reset_Tokens::find($id);
        if (!$token) {
            return response()->json(['message' => 'Token de recuperación de contraseña no encontrado'], 404);
        }
        return response()->json($token);
    }

   

    // CREAR UN TOKEN DE RECUPERACION DE CONTRASEÑA
    public function store(Request $request){
        $data= $request = validate([
            'email'=>'required|string|max:255',
            'token'=>'required|string|max:255',
            'created_at'=>'nullable|timestamp',
        ]);
        // CREAMOS EL TOKEN DE RECUPERACION DE CONTRASEÑA
        $token = Password_Reset_Tokens::create($data);
        // DEVOLVEMOS EL TOKEN DE RECUPERACION DE CONTRASEÑA CREADO
        return response()->json($token,201);
    }

    // ACTUALIZAMOS UN TOKEN DE RECUPERACION DE CONTRASEÑA
    public function update(Request $request, $id){
        $data= $request = validate([
            'email'=>'required|string|max:255',
            'token'=>'required|string|max:255',
            'created_at'=>'nullable|timestamp',
        ]);
        // CREAMOS EL TOKEN DE RECUPERACION DE CONTRASEÑA
        $token = Password_Reset_Tokens::find($id);
        $token->update($data);
        // DEVOLVEMOS EL TOKEN DE RECUPERACION DE CONTRASEÑA CREADO
        return response()->json($token,201);
    }       
    
    // ELIMINAMOS UN TOKEN DE RECUPERACION DE CONTRASEÑA
    public function destroy($id){
        // ELIMINAMOS EL TOKEN DE RECUPERACION DE CONTRASEÑA
        $token = Password_Reset_Tokens::find($id);
        $token->delete();
        // DEVOLVEMOS SUCESSO
        return response()->json('OK',200);
    }
}
