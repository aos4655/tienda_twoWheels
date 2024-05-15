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
            'success_url' => route('success'),
            'cancel_url'  => route('checkout2'),

        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {

        $this->crearPedido();
        $this->elimnarProductosCarrito();
        return redirect()->route('pedidos.index')->with('success', "¡Pedido completado con éxito! Gracias por tu compra.");
    }
    public function cancel()
    {
        return "cancel";
    }
    public function elimnarProductosCarrito()
    {
        $usuario = User::findOrFail(Auth::user()->id);
        $productosUsuario = $usuario
            ->productsCart()
            ->get();
        foreach ($productosUsuario as $producto) {
            $usuario->productsCart()->detach($producto->id);
        }
    }
    public function crearPedido()
    {
        $usuario = User::findOrFail(Auth::user()->id);
        $productosUsuario = $usuario
            ->productsCart()
            ->get();

        $pedidoModel = app(Pedido::class);
        $pedido = Pedido::create([
            'user_id' => $usuario->id,
            'track_num' => $this->generateTrackingNumber($pedidoModel),
            'direccion' => $usuario->direccion
        ]);
        foreach ($productosUsuario as $producto) {
            $cantidad = $producto->pivot->cantidad;
            $pedido->productos()->attach($producto, ['cantidad' => $cantidad]);
        }
        /* No es necesario añadirle un tracking ya que lo tenemos automatizado.  */
        PedidoController::pdfMail($pedido->id);
        //Mail::to($usuario->email)->send(new PedidoRecibido($pedido->id));
    }
    public function generateTrackingNumber($pedidoModel, $prefix = 'PK')
    {
        // Generar un número de seguimiento único que no este en la BD
        do {
            $randomPart = strtoupper(substr(uniqid(), -6)); // Genera una parte aleatoria de 6 caracteres
            $trackingNumber = $prefix . $randomPart;
        } while ($pedidoModel->where('track_num', $trackingNumber)->exists());

        return $trackingNumber;
    }
    
}
