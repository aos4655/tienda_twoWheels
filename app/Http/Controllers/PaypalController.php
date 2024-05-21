<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    public function paypal(Request $request)
    {
        $productos = User::findOrFail(Auth::user()->id)
            ->productsCart()
            ->get();
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $lineItems = [];
        $preciototal = 0;
        foreach ($productos as $productoJson) {
            $producto = json_decode($productoJson, true);
            $productname = $producto['nombre'];
            $total = $producto['precio'];
            $cantidad = $producto['pivot']['cantidad'];
            $precioSinPunto = str_replace('.', '', $total);
            $precioSinComa = str_replace(',', '.', $precioSinPunto);

            $item = [
                'name' => $productname,
                'description' => 'Description for Product 1',
                'quantity' => $cantidad,
                'unit_amount' => [
                    'currency_code' => 'EUR',
                    'value' => $precioSinComa
                ]
            ];
            $preciototal += (float) $precioSinComa *  (int) $cantidad;
            // Agregar el producto a la lista de ítems de línea
            $lineItems[] = $item;
        }
        $response = $provider->createorder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal-success', ['direccion' => $request->direccion_envio, , 'nombre' => $request->nombre_envio]),
                "cancel_url" => route('paypal-cancel')
            ],
            "purchase_units" => [
                [

                    'items' => $lineItems,
                    'amount' => [
                        'currency_code' => 'EUR',
                        'value' => $preciototal,
                        'breakdown' => [
                            'item_total' => [
                                'currency_code' => 'EUR',
                                'value' => $preciototal
                            ]
                        ]
                    ],

                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('paypal-cancel');
        }
    }
    public function success($direccion, $nombre)
    {
        PedidoController::crearPedido($direccion, $nombre);
        return redirect()->route('pedidos.index')->with('success', "¡Pedido completado con éxito! Gracias por tu compra.");
    }
    public function cancel()
    {
        /* Deberia enviar un mensaje? */
        return redirect()->route('home');
    }
}
