<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat_Productos_Variantes;

class CatProdVariantesController extends Controller
{
    // MOSTRAR TODOS LOS VARIANTES DEL PRODUCTO
    public function index($id)
    {
        $variantes = Cat_Productos_Variantes::where('id_producto', $id)->get();
        return response()->json($variantes);
    }

    // MOSTRAR UNA VARIANTE DEL PRODUCTO
    public function show($id){
        $variantes = Cat_Productos_Variantes::where('id', $id)->get();
        return response()->json($variantes);
    }

    // CREAR UNA VARIANTE DE PRODUCTO
    public function store(Request $request, $id){
        $data= $request -> validate([
            'id'=>'required|integer|max:11',
            'id_producto'=>'required|integer|max:11',
            'atributos'=>'nullable|string|max:100',
            'texto_es'=>'nullable|string|max:150',
            'ref'=>'nullable|string|max:50',
            'peso'=>'required|decimal|max:7,2',
            'stock'=>'required|integer|max:11',
            'imagen'=>'nullable|integer|max:11',
            'imagen_archivo'=>'nullable|string|max:100',
            'defecto'=>'required|integer|max:1',
            'orden'=>'required|integer|max:5',
        ]);
        // CREAR VARIENATE DEL PRODUCTO
        $variantes = Cat_Productos_Variantes::create($data);
        return response()->json($variantes, 201);
    }

    // ACTUALIZAR UNA VARIANTE DEL PRODUCTO
    public function update(Request $request, $id){
        $variantes = Cat_Productos_Variantes::find($id);
        $data= $request -> validate([
            'id'=>'required|integer|max:11',
            'id_producto'=>'required|integer|max:11',
            'atributos'=>'nullable|string|max:100',
            'texto_es'=>'nullable|string|max:150',
            'ref'=>'nullable|string|max:50',
            'peso'=>'required|decimal|max:7,2',
            'stock'=>'required|integer|max:11',
            'imagen'=>'nullable|integer|max:11',
            'imagen_archivo'=>'nullable|string|max:100',
            'defecto'=>'required|integer|max:1',
            'orden'=>'required|integer|max:5',
        ]);
        // ACTUALIZAR VARIENATE DEL PRODUCTO
        $variantes->update($data);
        return response()->json($variantes);
    }
    
    //ELIMINAR UNA VARIANTE DEL PRODUCTO
    public function destroy($id){
        $variantes = Cat_Productos_Variantes::find($id);
        $variantes->delete();
        return response()->json(null, 204);
    }
}       
