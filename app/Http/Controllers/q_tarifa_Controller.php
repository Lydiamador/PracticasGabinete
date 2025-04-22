<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\q_tarifa;
class q_tarifa_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return q_tarifa::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'tarcod' => 'required|string|max:3',
            'tarnom'=>'nullable|string|max:50'
        ]);

        $tarifa= q_tarifa::create($data);
        return response()->json($tarifa);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tarifa= q_tarifa::findOrFail($id);
        return response()->json($tarifa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tarifa= q_tarifa::findOrFail($id);

        $data = $request->validate([
            'tarcod' => 'required|string|max:3',
            'tarnom'=>'nullable|string|max:50'
        ]);

        $tarifa->update($data);

        return response()->json($tarifa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tarifa= q_tarifa::findOrFail($id);
        $tarifa->delete();
        return response()->json(['mensaje'=>'La tarifa ha sido eliminada correctamente.']);
    }
}
