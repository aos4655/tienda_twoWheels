<?php

namespace App\Http\Controllers;

use App\Console\Commands\GenerateTracking;
use App\Jobs\ActualizarSeguimiento;
use App\Mail\PedidoRecibido;
use App\Models\Pedido;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class StripeController extends Controller
{

    public function session(Request $request)
    {
        $productos = User::findOrFail(Auth::user()->id)
            ->productsCart()
            ->get();

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $lineItems = [];

        foreach ($productos as $productoJson) {
            $producto = json_decode($productoJson, true);

            $productname = $producto['nombre'];
            $total = $producto['precio'];
            $cantidad = $producto['pivot']['cantidad'];
            $precioSinPunto = str_replace('.', '', $total);
            $precioSinComa = str_replace(',', '.', $precioSinPunto);

            $item = [
                'price_data' => [
                    'currency'     => 'EUR',
                    'product_data' => [
                        'name' => $productname,
                    ],
                    'unit_amount'  => (int) round((float)$precioSinComa * 100),
                ],
                'quantity'   => $cantidad,
            ];

            // Agregar el producto a la lista de ítems de línea
            $lineItems[] = $item;
        }

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => $lineItems,
            'mode'        => 'payment',
            'customer_email' => Auth::user()->email, //Este seria el email del usuario que paga
            'success_url' => route('stripe-success', ['direccion' => $request->direccion_envio, 'nombre' => $request->nombre_envio]),
            'cancel_url'  => route('stripe-cancel'),

        ]);

        return redirect()->away($session->url);
    }

    public function success($direccion, $nombre)
    {
        PedidoController::crearPedido($direccion, $nombre);
        return redirect()->route('pedidos.index')->with("mensaje-success", "¡Pedido completado con éxito! Gracias por tu compra.");
    }
    public function cancel()
    {
        return redirect()->route('home');
    }
    
    
}
