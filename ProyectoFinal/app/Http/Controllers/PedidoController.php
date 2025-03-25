<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu; 
use App\Models\Plato;
use App\Models\Pedido;
use App\Models\Producto;
use Session;

class PedidoController extends Controller
{
    /**
     * Mostrar el carrito de compras.
     */
    public function carrito()
{
    $carrito = Session::get('carrito', []);
    $total = $this->calcularTotal($carrito);

    // Contar el total de productos (incluyendo cantidades)
    $totalProductos = 0;
    foreach ($carrito as $item) {
        $totalProductos += $item['cantidad'];
    }

    return view('carrito.index', compact('carrito', 'total', 'totalProductos'));
}


    /**
     * Agregar un producto al carrito.
     */
    public function agregarAlCarrito($id, $tipo)
    {
        $carrito = Session::get('carrito', []);

        // Verificamos si el tipo es Plato, Menu o Producto
        if ($tipo == 'plato') {
            $producto = Plato::findOrFail($id);
        } elseif ($tipo == 'menu') {
            $producto = Menu::findOrFail($id);
        } elseif ($tipo == 'producto') {
            $producto = Producto::findOrFail($id);
        } else {
            // Si el tipo no es correcto, redirigimos o lanzamos un error
            return redirect()->route('pedido.carrito')->with('error', 'Producto no válido.');
        }

        // Si el producto ya está en el carrito, aumentamos la cantidad
        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad']++;
        } else {
            // Si no está, lo agregamos al carrito
            $carrito[$id] = [
                'producto' => $producto,
                'cantidad' => 1,
                'precio' => $producto->precio,
            ];
        }

        // Guardamos el carrito actualizado en la sesión
        Session::put('carrito', $carrito);

        // Redirigir a la misma página con un mensaje de éxito
        return redirect()->back()->with('success', 'Producto agregado al carrito.');
    }

    /**
     * Eliminar un producto del carrito.
     */
    public function eliminarDelCarrito($id)
    {
        $carrito = Session::get('carrito', []);
        unset($carrito[$id]);
        Session::put('carrito', $carrito);
        return redirect()->route('pedido.carrito');
    }

    /**
     * Realizar el pedido.
     */
    public function realizarPedido(Request $request)
    {
        $carrito = Session::get('carrito', []);
        if (empty($carrito)) {
            return redirect()->route('pedido.carrito')->with('error', 'El carrito está vacío.');
        }

        // Crear el pedido y asociarlo al usuario autenticado
        $pedido = new Pedido();
        $pedido->id_usuario = auth()->user()->id;
        $pedido->fecha = now();
        $pedido->total = $this->calcularTotal($carrito);

        // Concatenar los nombres de los productos con las cantidades
        $nombresProductos = [];
        foreach ($carrito as $item) {
            if ($item['producto'] instanceof Plato) {
                $nombresProductos[] = $item['producto']->nombre . ' x ' . $item['cantidad'];
            } elseif ($item['producto'] instanceof Menu) {
                $nombresProductos[] = 'Menú del día x ' . $item['cantidad'];
            } elseif ($item['producto'] instanceof Producto) {
                $nombresProductos[] = $item['producto']->nombre . ' x ' . $item['cantidad'];
            }
        }

        // Guardar el nombre concatenado en el campo 'nombre' del pedido
        $pedido->nombre = implode(', ', $nombresProductos);

        // Guardar el pedido
        $pedido->save();

        // Vaciar el carrito después de realizar el pedido
        Session::forget('carrito');
        
        return redirect()->route('pedidos.index')->with('success', 'Pedido realizado con éxito.');
    }


    /**
     * Calcular el total del carrito.
     */
    private function calcularTotal($carrito)
    {
        $total = 0;
        foreach ($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }
        return $total;
    }

    /**
     * Mostrar los pedidos.
     */
    public function index()
    {
        $pedidos = Pedido::with('usuario')->get();
        return view('pedidos.index', compact('pedidos'));
    }
}