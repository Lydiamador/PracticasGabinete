<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Muestra la lista de todos los clientes.
     */
    public function index()
    {
        //devolvemos todos los registros de la tabla Users
        return User::all();
    }

    /**
     * Creamos un nuevo cliente en la tabla Users.
     */
    public function store(Request $request)
    {
        //validamos los datos a introducir del cliente con los campos de la tabla
        $data= $request = validate([
            'name' => 'required|string|max:255',
            'email'=> 'required|string|max:255',
            'email_verified_at' =>'nullable|timestamp',
            'password' => 'requiered|string|max:255',
            'usugrucod'=> 'requiered|string|max:255',
            'usuclicod'=>'requiered|string|max:255',
            'usucencod'=>'nullable|string|max:4',
            'remember_token'=>'nullable|string|max:100',
            'usutarcod'=>'requiered|string|max:3',
            'usuofecod'=>'nullable|string|max:10',
            'usudocpen'=>'requiered|float',
            'usudes1'=>'nullable|float',
            'usunuevo'=>'nullable|integer|max:11',
            'usurprcod'=>'nullable|string|max:15',
            'usuivacod'=>'nullable|string|max:3',
            'usudistribuidor'=>'nullable|int|max:11',
            'usudiareparto'=>'nullable|string|max:20',
            'usunif'=>'nullable|string|max:20'
        ]);

        //Creamos el nuevo usuario con los datos validados
        $user = User::create($data);
        
        //devolvemos el cliente creado con un código 201 en json. 
        return response()->json($user,201);
    }

    /**
     * Mostrasmos un cliente buscado por su ID
     */
    public function show(string $id)
    {
        $user = User::find($sid);
        //Comporbamos que el ID existe.
        if (!($user)){
            abort(404,"No existe el cliente con ese ID");
        }
        
        //Devolvemos el cliente al que pertenece el id
        return $user;
        
    }

    /**
     * Modificamos el cliente existente con sus nuevos datos
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $data= $request = validate([
            'name' => 'required|string|max:255',
            'email'=> 'required|string|max:255',
            'email_verified_at' =>'nullable|timestamp',
            'password' => 'required|string|max:255',
            'usugrucod'=> 'requiered|string|max:255',
            'usuclicod'=>'requiered|string|max:255',
            'usucencod'=>'nullable|string|max:4',
            'remember_token'=>'nullable|string|max:100',
            'usutarcod'=>'requiered|string|max:3',
            'usuofecod'=>'nullable|string|max:10',
            'usudocpen'=>'requiered|float',
            'usudes1'=>'nullable|float',
            'usunuevo'=>'nullable|integer|max:11',
            'usurprcod'=>'nullable|string|max:15',
            'usuivacod'=>'nullable|string|max:3',
            'usudistribuidor'=>'nullable|int|max:11',
            'usudiareparto'=>'nullable|string|max:20',
            'usunif'=>'nullable|string|max:20'
        ]); 

        $user->update($data);
        return response()->json($user);
    }

    /**
     * Eliminamos el usuario especifico seleccionado por el id.
     */
    public function destroy(string $id)
    {
        //Buscamos en la tabla User el id
        $user = User::findOrFail($id);
        //Se borrar dicho usuario
        $user = delete();
        //Devolvemos un mensaje de informacón 
        return response()->json(['mensaje' => 'Cliente eliminado correctamente.']);
    }
}
