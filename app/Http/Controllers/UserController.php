<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //devolvemos toda la información del modelo
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

        $user = User::create($data);

        return response()->json($user,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return User::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
        return response->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::findOrFail($id);
        $user = delete();

        return response->json(['mensaje' => 'Cliente eliminado correctamente.']);
    }
}
