<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_gif_pointss;
class User_gif_points_Controller extends Controller
{
    /**
     * Muestra la lista de todos los usuarios.
     */
    public function index()
    {
        return User_gif_points::all();
    }

    /**
     * Creamos un nuevo cliente en la tabla Users_gif_points.
     */
    public function store(Request $request)
    {
        $data = $request -> validate([
            'gif_ppoint_id' => 'required|integer|max:11',
            'user_id' => 'required|biginteger|max:20',
            'fecha_validez' => 'required|datatime',
        ]);

        $user= User_gif_points::create($data);

        return response()->json($user);
    }

    /**
     * Mostrasmos un cliente buscado por su ID
     */
    public function show(string $id)
    {
        $user = User_gif_points::find($id);

        if(!$user){
            abort(404,"No existe un usuario con ese ID.");
        }

        return response()->json($user);
    }

    /**
     * Modificamos el usuario existente con sus nuevos datos
     */
    public function update(Request $request, string $id)
    {
        $user = User_gif_points::find($id);

        if(!$user){
            abort(404,"No existe un usuario con ese ID.");
        }

        $data=$request-> validate([
            'gif_ppoint_id' => 'required|integer|max:11',
            'user_id' => 'required|biginteger|max:20',
            'fecha_validez' => 'required|datatime',
        ]);

        $user->update($data);
        return response()->json($user);
    }

    /**
     * Eliminamos el usuario especifico seleccionado por el id.
     */
    public function destroy(string $id)
    {
        $user = User_gif_points::find($id);

        if(!$user){
            abort(404,"No existe un usuario con ese ID.");
        }

        $user->delete();
        return response()->json(['mensaje'=>'El susuario ha sido eliminado correctamente.']);
    }
}
