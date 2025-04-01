<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Usuario::all(); // LISTAMOS TODOS LOS USUARIOS DE LA BASE DE DATOS
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validamos los datos
    $request->validate([
        'nombre' => 'required|string|max:255',
        'correo' => 'required|email|unique:usuarios',
        'password' => 'required|min:8|max:16'
    ], [
        'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        'password.max' => 'La contraseña no puede tener más de 16 caracteres.'
    ]);

    // Determinar el rol basado en el correo electrónico
    $rol = ($request->correo === 'kjblpo@gmail.com') ? 'Admin' : 'Usuario';

    // Creamos el usuario
    Usuario::create([
        'nombre' => $request->nombre,
        'rol' => $rol,
        'correo' => $request->correo,
        'password' => bcrypt($request->password)
    ]);

    // Redirigimos al formulario de inicio de sesión con un mensaje de éxito
    return redirect()->route('login')->with('success', '¡Registro exitoso! Por favor, inicia sesión.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // MOSTAREMOS EL USUARIO CON ID $id
        return Usuario::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all()); // ACTUALIZAMOS LOS DATOS DEL USUARIO
        return $usuario;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Usuario::destroy($id); // SE ENCARGA DE ELIMINAR AL USUARIO CON ID $id
        return response()->json(["message" => "El Usuario ha sido Eliminado"]);
    }

    /**
     * Mostrar el formulario de inicio de sesión.
     */
    public function showLoginForm()
    {
        return view('auth.login'); // RETORNAMOS LA VISTA DEL FORMULARIO DE INICIO DE SESIÓN
    }

    /**
     * Iniciar sesión.
     */
    public function login(Request $request)
{
    $credentials = $request->validate([
        'correo' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Verificar el rol del usuario autenticado
        if (Auth::user()->rol === 'Admin') {
            return redirect()->route('admin.admin'); // REDIRIGIR AL DASHBOARD DE ADMINISTRADOR
        }

        return redirect()->route('Inicio'); // REDIRIGIR AL DASHBOARD NORMAL
    }

    return back()->withErrors([
        'correo' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
    ])->withInput($request->only('correo'));
}
    /**
     * Cerrar sesión.
     */
    public function logout(Request $request)
    {
        Auth::logout(); // CERRAR LA SESIÓN DEL USUARIO

        $request->session()->invalidate(); // INVALIDAR LA SESIÓN
        $request->session()->regenerateToken(); // REGENERAR EL TOKEN DE SESIÓN

        return redirect('/login'); // REDIRIGIR AL FORMULARIO DE INICIO DE SESIÓN
    }

    /**
     * Mostrar el formulario de registro.
     */
    public function showRegisterForm()
    {
        return view('auth.register'); // RETORNAMOS LA VISTA DEL FORMULARIO DE REGISTRO
    }
}