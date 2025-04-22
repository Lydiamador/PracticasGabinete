<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    // DEVOLVEMOS TODOS LOS PRODUCTOS DEL CARRITO
    public function index(){
        return Cart::all();
    }

    // DEVOLVEMOS UN PRODUCTO DEL CARRITO
    public function show($cartcod){
        return Cart::findOrFail($cartcod);
    }

    // CREAMOS UN NUEVO PRODUCTO DEL CARRITO
    public function store(Request $request){
        $data= $request = validate([
            'cartcod'=>'required|autoincrement|bigint|max:20',
            'cartartcod'=>'required|string|max:10',
            'cartusucod'=>'required|integer|max:11',
            'cartcant'=>'required|float',
            'created_at'=>'nullable|timestamp',
            'updated_at'=>'nullable|timestamp',
            'cartcajcod'=>'nullable|string|max:14',
            'cartcantcaj'=>'nullable|float',
        ]);
        // CREAMOS EL PRODUCTO DEL CARRITO
        $cart= Cart::create($data);
        // DEVOLVEMOS EL PRODUCTO CREADO
        return response()->json($cart,201);
    }

    // ACTUALIZAMOS UN PRODUCTO DEL CARRITO
    public function update(Request $request, $id){
            // VALIDAMOS LOS DATOS
            $cart = Cart::findOrFail($id);

            $data= $request = validate([
            'cartcod'=>'required|autoincrement|bigint|max:20',
            'cartartcod'=>'required|string|max:10',
            'cartusucod'=>'required|integer|max:11',
            'cartcant'=>'required|float',
            'created_at'=>'nullable|timestamp',
            'updated_at'=>'nullable|timestamp',
            'cartcajcod'=>'nullable|string|max:14',
            'cartcantcaj'=>'nullable|float',
        ]);

            // ACTUALIZAMOS LOS DATOS
            $cart->update($data);
            return response()->json($cart);
    }

    //ELIMINAMOS UN PRODUCTO DEL CARRITO
    public function destroy($id){
        Cart::destroy($id);
        return response()->json(null, 204);
    }
}