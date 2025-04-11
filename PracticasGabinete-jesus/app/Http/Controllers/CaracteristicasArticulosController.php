<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caracteristicas_Articulos;

class CaracteristicasArticulosController extends Controller
{
    // DEVOLVEMOS TODAS LAS CARACTERISTICAS DE ARTICULOS
    public function index(){
        return Caracteristicas_Articulos::all();
    }
    // DEVOLVEMOS UN ARTICULO EN PARTICULAR
    public function show($id){
        return Caracteristicas_Articulos::findOrFail($id);
    }

    // CREAMOS UNA CARACTERISTICA DE UN ARTICULOS
    public function store(Request $request){
        $data= $request = validate([
            'id'=>'required|bigint|auto_increment|max:20',
            'articulo_artcod'=>'required|string|max:36|min:36',
            'eficiencia_energetica'=>'required|string|max:2',  
            'agarre_en_mojado'=>'required|string|max:2',
            'ruido_exterior_db'=>'required|integer|max:11',
            'ruido_exterior_ondas'=>'required|integer|max:11',
            'temporada'=>'required|string|max:50',
            'fecha_fabricacion'=>'required|year|max:4',
            'created_at'=>'nullable|timestamp',
            'updated_at'=>'nullable|timestamp',
        ]);
        // CREAMOS LOS ARTICULOS
        $articulos = Caracteristicas_Articulos::create($data);
       // DEVOLVEMOS EL ARTICULO CREADO
       return response()->json($articulos,201);
    }

    // ACTUALIZAMOS LAS CARACTERISTICAS DE UN ARTICULO
    public function update(Request $request, $id){
            // VALIDAMOS LOS DATOS
            $articulos = Caracteristicas_Articulos::findOrFail($id);

            $data= $request = validate([
            'id'=>'required|bigint|auto_increment|max:20',
            'articulo_artcod'=>'required|string|max:36|min:36',
            'eficiencia_energetica'=>'required|string|max:2',  
            'agarre_en_mojado'=>'required|string|max:2',
            'ruido_exterior_db'=>'required|integer|max:11',
            'ruido_exterior_ondas'=>'required|integer|max:11',
            'temporada'=>'required|string|max:50',  
            'fecha_fabricacion'=>'required|year|max:4',
            'created_at'=>'nullable|timestamp',
            'updated_at'=>'nullable|timestamp',
        ]);
        // ACTUALIZAMOS LOS ARTICULOS
        $articulos->update($data);
        return response()->json($articulos);
    }

    //ELIMINAMOS UN ARTICULO
    public function destroy($id){
        Caracteristicas_Articulos::destroy($id);
        return response()->json(null, 204);
    }
}
