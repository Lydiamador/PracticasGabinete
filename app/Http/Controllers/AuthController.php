<?php
// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Iniciar sesión y devolver el token JWT.
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Intentamos generar un token con las credenciales del usuario
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Credenciales inválidas'], 401);
        }

        // Devolvemos el token y la información de expiración
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60 // Expiración en minutos
        ]);
    }

    /**
     * Obtener la información del usuario autenticado.
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Cerrar sesión (invalidar el token).
     */
    public function logout()
    {
        auth()->logout(); // Esto invalida el token
        return response()->json(['message' => 'Sesión cerrada']);
    }
}

