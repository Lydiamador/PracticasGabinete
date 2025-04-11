<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_qanet;
class User_qanet_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User_qanet::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request -> validate([
            'usuid' => 'required|integer|max:11',
            'usunif' => 'requires|string|max:50',
            'usuclicod' => 'requires|string|max:15',
            'usucencod' => 'requires|string|max:4'
        ]);

        $user =  User_qanet::create($data);

        return response()-> json($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User_qanet::findOrFail($id);

        return response()-> json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User_qanet::findOrFail($id);

        $data = $request -> validate([
            'usuid' => 'required|integer|max:11',
            'usunif' => 'requires|string|max:50',
            'usuclicod' => 'requires|string|max:15',
            'usucencod' => 'requires|string|max:4'
        ]);
        
        $user->update($data);
        return response()-> json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User_qanet::findOrFail($id);

        $user->delete();

        return response()-> json($user);
    }
}
