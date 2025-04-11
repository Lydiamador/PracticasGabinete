<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat_Categorias;

class CatCategoriasController extends Controller
{
    // LISTAR TODAS LAS CATEGORIAS DEL CARRO
    public function index()
    {
        $categorias = Cat_Categorias::all();
        return response()->json($categorias);
    }

    // LISTAR UNA CATEGORÍA SOLA DEL CARRO
    public function show($id)
    {
        $categoria = Cat_Categorias::find($id);

        if (!$categoria) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }

        return response()->json($categoria);
    }

    // CREAR UNA CATEGORÍA
    public function store(Request $request)
    {
        $data = $request->validate([
            'id'=>'required|autoincrement|integer|max:9',
            'parent_id'=>'required|integer|max:3',
            'nombre_es'=>'nullable|string|max:60',
            'descripcion_es'=>'required|text',
            'nombre_en'=>'nullable|string|max:60',
            'descripcion_en'=>'required|text',
            'imagen'=>'nullable|string|max:50',
            'destacada'=>'required|integer|max:1',
            'descuento'=>'required|decimal|max:5,2',
            'icono'=>'nullable|string|max:75', 
            'formato'=>'required|integer|max:1',
            'plantilla'=>'required|integer|max:3',
            'cabecera'=>'required|integer|max:1',
            'orden'=>'nullable|integer|max:3',
            'meta_titulo_es'=>'nullable|string|max:100',
            'meta_titulo_en'=>'nullable|string|max:100',
            'meta_keywords_es'=>'nullable|string|max:100',
            'meta_keywords_en'=>'nullable|string|max:100',
            'meta_descripcion_es'=>'nullable|string|max:300',
            'meta_descripcion_en'=>'nullable|string|max:300',
            'visible'=>'required|integer|max:1',
            'amazon_feed_product_type'=>'nullable|string|max:50',
            'amazon_node'=>'nullable|integer|max:15',
            'amazon_porcentaje'=>'required|decimal|max:5,2',
            'google_cat_id'=>'nullable|integer|max:15',
            'precios_porcentaje'=>'required|decimal|max:5,2',
            'precios_importe'=>'required|decimal|max:8,2',
            'nivel'=>'nullable|integer|max:1',
            'fecha_mod'=>'required|timestamp',
            'catsolcli'=>'nullable|integer|max:11',
        ]);

        $categoria = Cat_Categorias::create($data);
        return response()->json($categoria, 201);
    }

    // ACTUALIZAR UNA CATEGORÍA
    public function update(Request $request, $id)
    {
        $categoria = Cat_Categorias::find($id);

        if (!$categoria) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }

        $data = $request->validate([
            'id'=>'required|autoincrement|integer|max:9',
            'parent_id'=>'required|integer|max:3',
            'nombre_es'=>'nullable|string|max:60',
            'descripcion_es'=>'required|text',
            'nombre_en'=>'nullable|string|max:60',
            'descripcion_en'=>'required|text',
            'imagen'=>'nullable|string|max:50',
            'destacada'=>'required|integer|max:1',
            'descuento'=>'required|decimal|max:5,2',
            'icono'=>'nullable|string|max:75', 
            'formato'=>'required|integer|max:1',
            'plantilla'=>'required|integer|max:3',
            'cabecera'=>'required|integer|max:1',
            'orden'=>'nullable|integer|max:3',
            'meta_titulo_es'=>'nullable|string|max:100',
            'meta_titulo_en'=>'nullable|string|max:100',
            'meta_keywords_es'=>'nullable|string|max:100',
            'meta_keywords_en'=>'nullable|string|max:100',
            'meta_descripcion_es'=>'nullable|string|max:300',
            'meta_descripcion_en'=>'nullable|string|max:300',
            'visible'=>'required|integer|max:1',
            'amazon_feed_product_type'=>'nullable|string|max:50',
            'amazon_node'=>'nullable|integer|max:15',
            'amazon_porcentaje'=>'required|decimal|max:5,2',
            'google_cat_id'=>'nullable|integer|max:15',
            'precios_porcentaje'=>'required|decimal|max:5,2',
            'precios_importe'=>'required|decimal|max:8,2',
            'nivel'=>'nullable|integer|max:1',
            'fecha_mod'=>'required|timestamp',
            'catsolcli'=>'nullable|integer|max:11',
        ]);

        $categoria->update($data);
        return response()->json($categoria);
    }

    // ELIMINAMOS UNA CATEGORÍA
    public function destroy($id)
    {
        $categoria = Cat_Categorias::find($id);

        if (!$categoria) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }

        $categoria->delete();
        return response()->json(null, 204);
    }

    // BUSCAMOS UNA CATEGORIA ESPECIFICA EN TODOS LOS CARRITOS
    public function search($id)
    {
        $categoria = Cat_Categorias::where('id', $id)->first();

        if (!$categoria) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }

        return response()->json($categoria);
    }
}
