<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedidos;

class PedidosController extends Controller
{
    // Listar todos los pedidos
    public function index()
    {
        return Pedidos::all();
    }

    // Mostrar un pedido por ID
    public function show($id)
    {
        return Pedidos::findOrFail($id);
    }
    public function showByCliente($cliente_id){
        return Pedidos::findOrFail($cliente_id);

    }

    // Crear un nuevo pedido
    public function store(Request $request)
    {
         //validamos los datos a introducir del pedido con los campos de la tabla
         $data= $request = validate([
            'id'=>'required|integer|auto_increment|max:11',
            'id_listaregalos'=>'required|integer|max:11',
            'referencia'=>'nullable|string|max:29',
            'cliente_idioma'=>'required|string|max:2|min:2',
            'cliente_id'=>'required|integer|max:11',
            'cliente_tarifa'=>'required|integer|max:2',
            'cliente_re'=>'required|integer|max:2',
            'cliente_nombre'=>'required|string|max:75',
            'cliente_apellidos'=>'nullable|string|max:75',
            'cliente_email'=>'required|string|max:100',
            'cliente_empresa'=>'nullable|string|max:75',
            'cliente_documento'=>'nullable|string|max:15',
            'cliente_direccion'=>'required|string|max:100',
            'cliente_pais'=>'required|int|max:3',
            'cliente_poblacion'=>'nullable|string|max:100',
            'cliente_cp'=>'nullable|string|max:10',
            'cliente_provincia'=>'nullable|int|max:3',
            'cliente_provincia_txt'=>'nullable|string|max:75',
            'cliente_tfno1'=>'nullable|string|max:15',
            'cliente_tfno2'=>'nullable|string|max:15',
            'dif_destino'=>'required|integer|max:1',
            'env_nombre'=>'nullable|string|max:75',
            'env_apellidos'=>'nullable|string|max:75',
            'env_empresa'=>'nullable|string|max:75',
            'env_documento'=>'nullable|string|max:15',
            'env_pais'=>'required|int|max:3',
            'env_direccion'=>'nullable|string|max:100',
            'env_poblacion'=>'nullable|string|max:100',
            'env_provincia'=>'nullable|int|max:3',
            'env_provincia_txt'=>'nullable|string|max:75',
            'env_cp'=>'nullable|string|max:10',
            'env_tfno_1'=>'nullable|string|max:15',
            'env_tfno_2'=>'nullable|string|max:15',
            'fecha'=>'nullable|date_time',
            'peso'=>'nullable|decimal|max:6,2',
            'subtotal'=>'nullable|decimal|max:11,2',
            'descuento'=>'required|decimal|max:5,2',
            'descuento_porcentaje'=>'nullable|decimal|max:5,2',
            'gastos_envio'=>'nullable|decimal|max:5,2',
            'total'=>'nullable|decimal|max:11,2',
            'forma_pago'=>'required|integer|max:1',
            'dto_fpago_tipo'=>'nullable|string|max:1',
            'dto_fpago_porcentaje'=>'nullable|decimal|max:5,2',
            'dto_fpago_minimo'=>'nullable|decimal|max:5,2',
            'dto_fpago_importe'=>'nullable|decimal|max:9,2',
            'dto_cupon_id'=>'required|integer|max:9',
            'dto_cupon_nombre'=>'nullable|string|max:50',
            'dto_cupon_porcentaje'=>'nullable|decimal|max:5,2',
            'dto_cupon_importe'=>'nullable|decimal|max:9,2',
            'forma_envio'=>'required|integer|max:1',
            'observaciones'=>'nullable|text',
            'impuestos_incluidos'=>'required|integer|max:1',
            'iva_porcentaje'=>'required|integer|max:2',
            'iva_importe'=>'required|decimal|max:5,2',
            'atendido'=>'required|integer|max:1',
            'aceptado'=>'required|integer|max:1',
            'estado'=>'required|integer|max:3',
            'fecha_entrega'=>'nullable|date_time',
            'accclicod'=>'nullable|string|max:15',
            'acccencod'=>'nullable|string|max:4',
            'env_pais_txt'=>'nullable|string|max:100',
        ]);
        //creamos el pedido
        $pedido = Pedidos::create($data);
       // Devolvemos el pedido creado
       return response()->json($pedido,201);
    }

    // Actualizar un pedido
    public function update(Request $request, $id)
    {
       //
       $pedidos = Pedidos::findOrFail($id);

       $data= $request = validate([
        'id'=>'required|integer|auto_increment|max:11',
        'id_listaregalos'=>'required|integer|max:11',
        'referencia'=>'nullable|string|max:29',
        'cliente_idioma'=>'required|string|max:2|min:2',
        'cliente_id'=>'required|integer|max:11',
        'cliente_tarifa'=>'required|integer|max:2',
        'cliente_re'=>'required|integer|max:2',
        'cliente_nombre'=>'required|string|max:75',
        'cliente_apellidos'=>'nullable|string|max:75',
        'cliente_email'=>'required|string|max:100',
        'cliente_empresa'=>'nullable|string|max:75',
        'cliente_documento'=>'nullable|string|max:15',
        'cliente_direccion'=>'required|string|max:100',
        'cliente_pais'=>'required|int|max:3',
        'cliente_poblacion'=>'nullable|string|max:100',
        'cliente_cp'=>'nullable|string|max:10',
        'cliente_provincia'=>'nullable|int|max:3',
        'cliente_provincia_txt'=>'nullable|string|max:75',
        'cliente_tfno1'=>'nullable|string|max:15',
        'cliente_tfno2'=>'nullable|string|max:15',
        'dif_destino'=>'required|integer|max:1',
        'env_nombre'=>'nullable|string|max:75',
        'env_apellidos'=>'nullable|string|max:75',
        'env_empresa'=>'nullable|string|max:75',
        'env_documento'=>'nullable|string|max:15',
        'env_pais'=>'required|int|max:3',
        'env_direccion'=>'nullable|string|max:100',
        'env_poblacion'=>'nullable|string|max:100',
        'env_provincia'=>'nullable|int|max:3',
        'env_provincia_txt'=>'nullable|string|max:75',
        'env_cp'=>'nullable|string|max:10',
        'env_tfno_1'=>'nullable|string|max:15',
        'env_tfno_2'=>'nullable|string|max:15',
        'fecha'=>'nullable|date_time',
        'peso'=>'nullable|decimal|max:6,2',
        'subtotal'=>'nullable|decimal|max:11,2',
        'descuento'=>'required|decimal|max:5,2',
        'descuento_porcentaje'=>'nullable|decimal|max:5,2',
        'gastos_envio'=>'nullable|decimal|max:5,2',
        'total'=>'nullable|decimal|max:11,2',
        'forma_pago'=>'required|integer|max:1',
        'dto_fpago_tipo'=>'nullable|string|max:1',
        'dto_fpago_porcentaje'=>'nullable|decimal|max:5,2',
        'dto_fpago_minimo'=>'nullable|decimal|max:5,2',
        'dto_fpago_importe'=>'nullable|decimal|max:9,2',
        'dto_cupon_id'=>'required|integer|max:9',
        'dto_cupon_nombre'=>'nullable|string|max:50',
        'dto_cupon_porcentaje'=>'nullable|decimal|max:5,2',
        'dto_cupon_importe'=>'nullable|decimal|max:9,2',
        'forma_envio'=>'required|integer|max:1',
        'observaciones'=>'nullable|text',
        'impuestos_incluidos'=>'required|integer|max:1',
        'iva_porcentaje'=>'required|integer|max:2',
        'iva_importe'=>'required|decimal|max:5,2',
        'atendido'=>'required|integer|max:1',
        'aceptado'=>'required|integer|max:1',
        'estado'=>'required|integer|max:3',
        'fecha_entrega'=>'nullable|date_time',
        'accclicod'=>'nullable|string|max:15',
        'acccencod'=>'nullable|string|max:4',
        'env_pais_txt'=>'nullable|string|max:100',
    ]); 

       $pedidos->update($data);
       return response->json($pedidos);
   }

    // Eliminar un pedido
    public function destroy($id)
    {
        Pedidos::destroy($id);
        return response()->json(null, 204);
    }

    // Obtener todos los pedidos de un cliente por su ID
    public function pedidosPorCliente($cliente_id)
    {
        return Pedidos::where('cliente_id', $cliente_id)
                      ->orderBy('fecha', 'desc')
                      ->get();
    }
}
