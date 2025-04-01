<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Models\Pedido;
use App\Mail\PedidoNotificacion;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        // Obtener el carrito de la sesión
        $carrito = Session::get('carrito', []);
        if (empty($carrito)) {
            return redirect()->route('pedido.carrito')->with('error', 'El carrito está vacío.');
        }

        // Configurar Stripe
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Crear los ítems para Stripe
        $lineItems = [];
        foreach ($carrito as $item) {
            $nombreProducto = '';
            if ($item['producto'] instanceof \App\Models\Plato) {
                $nombreProducto = $item['producto']->nombre;
            } elseif ($item['producto'] instanceof \App\Models\Menu) {
                $nombreProducto = 'Menú del día';
            } elseif ($item['producto'] instanceof \App\Models\Producto) {
                $nombreProducto = $item['producto']->nombre;
            }

            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $nombreProducto,  // Asegúrate de que el nombre del producto se esté asignando correctamente
                    ],
                    'unit_amount' => intval($item['precio'] * 100), // Convertir a centavos
                ],
                'quantity' => intval($item['cantidad']), // Asegúrate de que la cantidad sea un número entero
            ];
        }

        // Crear la sesión de Stripe Checkout
        $checkoutSession = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,  // Asegúrate de que los ítems se estén enviando correctamente
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('cancel'),
        ]);

        return redirect($checkoutSession->url);
    }

    public function success()
    {
        // Solo cuando el pago se ha completado, creamos el pedido
        $carrito = Session::get('carrito', []);
        if (empty($carrito)) {
            return redirect()->route('pedido.carrito')->with('error', 'No se pudo encontrar el carrito.');
        }

        // Crear el pedido
        $pedido = new Pedido();
        $pedido->id_usuario = auth()->user()->id;
        $pedido->fecha = now();
        $pedido->total = $this->calcularTotal($carrito);

        // Concatenar los nombres de los productos
        $nombresProductos = [];
        foreach ($carrito as $item) {
            // Verificamos el tipo de producto y concatenamos su nombre
            if ($item['producto'] instanceof \App\Models\Plato) {
                $nombresProductos[] = $item['producto']->nombre . ' x ' . $item['cantidad'];
            } elseif ($item['producto'] instanceof \App\Models\Menu) {
                $nombresProductos[] = 'Menú del día x ' . $item['cantidad'];
            } elseif ($item['producto'] instanceof \App\Models\Producto) {
                $nombresProductos[] = $item['producto']->nombre . ' x ' . $item['cantidad'];
            }
        }

        $pedido->nombre = implode(', ', $nombresProductos);
        $pedido->save();

        // Enviar correo electrónico
        Mail::to('jesuslavadogarcia04@gmail.com')->send(new PedidoNotificacion($pedido));

        // Vaciar el carrito después de pagar
        Session::forget('carrito');

        return redirect()->route('pedidos.index')->with('success', 'Pago completado y pedido realizado con éxito. Revisa tu correo.');
    }

    public function cancel()
    {
        return redirect()->route('pedido.carrito')->with('error', 'El pago ha sido cancelado.');
    }

    private function calcularTotal($carrito)
    {
        $total = 0;
        foreach ($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }
        return $total;
    }
}
