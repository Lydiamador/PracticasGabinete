<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\qanet_familiaqtpv;
class qanet_familiaqtpv_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(qanet_familiaqtpv::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate($this->data());
        $famtpv=qanet_familiaqtpv::create($data);
        return response()->json($famtpv);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $famtpv=qanet_familiaqtpv::findOrFail($id);
        return response()->json($famtpv);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $famtpv=qanet_familiaqtpv::findOrFail($id);
        $data=$request->validate($this->data());
        $famtpv->update($data);
        return response()->json($famtpv);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $famtpv=qanet_familiaqtpv::findOrFail($id);
        $famtpv->delete();
        return response()->json(['mensaje'=>'Se ha elimiando correctamente'],200);

    }

    private function data():array{
        return [
            'famtie'=> 'required|integer|max:11',
            'famcon'=> 'required|integer|max:11',
            'famdelcod'=> 'nullable|string|size:15',
            'fampos'=> 'nullable|integer|max:11',
            'famenvtie'=> 'nullable|integer|max:11'
        ];
    }
}
