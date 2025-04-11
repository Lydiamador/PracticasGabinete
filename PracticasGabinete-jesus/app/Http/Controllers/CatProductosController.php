<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat_Productos;

class CatProductosController extends Controller
{
    // MOSTRAR TODOS LOS PRODUCTOS DEL CARRITO
    public function index()
    {
        $productos = Cat_Productos::all();
        return response()->json($productos);
    }

    // MOSTRAR UN PRODUCTO DEL CARRITO
    public function show($id)
    {
        $producto = Cat_Productos::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        return response()->json($producto);
    }

    // CREAR UN NUEVO PRODUCTO EN EL CARRITO
    public function store(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|integer|max:7',
            'ref' => 'required|string|max:50',
            'grupo' => 'required|integer|max:6',
            'cat' => 'required|integer|max:6',
            'marca' => 'required|integer|max:6',
            'proveedores' => 'required|integer|max:6',
            'nombre_es' => 'required|string|max:100',
            'nombre_en' => 'required|string|max:100',
            'desCorta_es' => 'required|string',
            'desCorta_en' => 'required|string',
            'desExtendida_es' => 'required|string',
            'desExtendida_en' => 'required|string',
            'precio_impuesto' => 'required|integer|max:11',
            'precio_txt' => 'nullable|string|max:75',
            'novedad' => 'required|integer|max:1',
            'oferta' => 'required|integer|max:1',
            'oferta_ini' => 'required|string|max:75',
            'oferta_fin' => 'required|string|max:75',
            'visitas' => 'required|integer|max:6',
            'mostrarPrecio' => 'required|integer|max:1',
            'cantidad_multiplo' => 'required|numeric|max:999999.99',
            'cantidad_medida' => 'required|integer|max:10',
            'cantidad_medida_txt' => 'required|string|max:50',
            'peso' => 'required|numeric|max:999999.99',
            'stock' => 'required|integer|max:9',
            'stock_permitir_venta' => 'required|integer|max:1',
            'decimales' => 'required|integer|max:1',
            'multiplos' => 'required|numeric|max:999999999.99',
            'unidad_medida' => 'required|integer|max:5',
            'enviogratis' => 'required|integer|max:11',
            'dis_ini' => 'required|string|max:75',
            'dis_fin' => 'required|string|max:75',
            'video' => 'nullable|string|max:75',
            'codigo_proveedor' => 'nullable|integer|max:3',
            'codigo_control' => 'nullable|integer|max:1',
            'seo_title_es' => 'nullable|string|max:55',
            'seo_description_es' => 'nullable|string|max:155',
            'shopping' => 'required|integer|max:1',
            'fecha_alta' => 'required|date',
            'fecha_mod' => 'required|date',
            'id_Almacen' => 'nullable|integer|max:11',
            'stock_control' => 'nullable|integer|max:11'
        ]);

        $producto = Cat_Productos::create($data);
        return response()->json($producto, 201);
    }

    // ACTUALIZAMOS UN PRODUCTO
    public function update(Request $request, $id)
    {
        $producto = Cat_Productos::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $data = $request->validate([
            'id' => 'required|integer|max:7',
            'ref' => 'required|string|max:50',
            'grupo' => 'required|integer|max:6',
            'cat' => 'required|integer|max:6',
            'marca' => 'required|integer|max:6',
            'proveedores' => 'required|integer|max:6',
            'nombre_es' => 'required|string|max:100',
            'nombre_en' => 'required|string|max:100',
            'desCorta_es' => 'required|string',
            'desCorta_en' => 'required|string',
            'desExtendida_es' => 'required|string',
            'desExtendida_en' => 'required|string',
            'precio_impuesto' => 'required|integer|max:11',
            'precio_txt' => 'nullable|string|max:75',
            'novedad' => 'required|integer|max:1',
            'oferta' => 'required|integer|max:1',
            'oferta_ini' => 'required|string|max:75',
            'oferta_fin' => 'required|string|max:75',
            'visitas' => 'required|integer|max:6',
            'mostrarPrecio' => 'required|integer|max:1',
            'cantidad_multiplo' => 'required|numeric|max:999999.99',
            'cantidad_medida' => 'required|integer|max:10',
            'cantidad_medida_txt' => 'required|string|max:50',
            'peso' => 'required|numeric|max:999999.99',
            'stock' => 'required|integer|max:9',
            'stock_permitir_venta' => 'required|integer|max:1',
            'decimales' => 'required|integer|max:1',
            'multiplos' => 'required|numeric|max:999999999.99',
            'unidad_medida' => 'required|integer|max:5',
            'enviogratis' => 'required|integer|max:11',
            'dis_ini' => 'required|string|max:75',
            'dis_fin' => 'required|string|max:75',
            'video' => 'nullable|string|max:75',
            'codigo_proveedor' => 'nullable|integer|max:3',
            'codigo_control' => 'nullable|integer|max:1',
            'seo_title_es' => 'nullable|string|max:55',
            'seo_description_es' => 'nullable|string|max:155',
            'shopping' => 'required|integer|max:1',
            'fecha_alta' => 'required|date',
            'fecha_mod' => 'required|date',
            'id_Almacen' => 'nullable|integer|max:11',
            'stock_control' => 'nullable|integer|max:11'
        ]);

        $producto->update($data);
        return response()->json($producto);
    }

    // ELIMINAMOS UN PRODUCTO
    public function destroy($id)
    {
        $producto = Cat_Productos::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $producto->delete();
        return response()->json(null, 204);
    }
}
