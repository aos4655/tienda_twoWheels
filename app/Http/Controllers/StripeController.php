<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    
    public function session(Request $request)
    {
        $productos=User::findOrFail(Auth::user()->id)
        ->productsCart()
        ->get();
        
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
 /* 
        $productname = $request->get('productname');
        $productname2 = $request->get('productname2');
        $totalprice = $request->get('total');
        $totalprice2 = $request->get('total2');
        $two0 = "00";
        $total = "$totalprice$two0";
        $total2 = "$totalprice2$two0"; */
 
        $lineItems = [];

        foreach ($productos as $productoJson) {
            $producto = json_decode($productoJson, true);

            $productname = $producto['nombre'];
            $total = $producto['precio'];
            $cantidad = $producto['pivot']['cantidad'];
            dd($total);
            $item = [
                'price_data' => [
                    'currency'     => 'EUR',
                    'product_data' => [
                        'name' => $productname,
                    ],
                    'unit_amount'  => floor($total), 
                ],
                'quantity'   => $cantidad,
            ];

            // Agregar el producto a la lista de ítems de línea
            $lineItems[] = $item;
        }
        dd($lineItems);
        $session = \Stripe\Checkout\Session::create([
            'line_items'  => $lineItems,
            'mode'        => 'payment',
            'customer_email' => Auth::user()->email,//Este seria el email del usuario que paga
            'success_url' => route('success'),
            'cancel_url'  => route('checkout2'),

        ]);
 
        return redirect()->away($session->url);
    }
 
    public function success()
    {
        
        return "Thanks for you order You have just completed your payment. The seeler will reach out to you as soon as possible";
    }
    public function cancel()
    {
        return "cancel";
    }
}
