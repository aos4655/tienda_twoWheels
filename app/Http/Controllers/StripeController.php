<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function checkout(){
        return view("stripe.checkout");
    }
    public function session(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
 
        $productname = $request->get('productname');
        $productname2 = $request->get('productname2');
        $totalprice = $request->get('total');
        $totalprice2 = $request->get('total2');
        $two0 = "00";
        $total = "$totalprice$two0";
        $total2 = "$totalprice2$two0";
 
        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'USD',
                        'product_data' => [
                            "name" => $productname,
                        ],
                        'unit_amount'  => $total,
                    ],
                    'quantity'   => 1,
                ],
                [
                    'price_data' => [
                        'currency'     => 'USD',
                        'product_data' => [
                            "name" => $productname2,
                        ],
                        'unit_amount'  => $total2,
                    ],
                    'quantity'   => 2,
                ],
                 
            ],
            'mode'        => 'payment',
            'customer_email' => "twowheels@gmail.com",//Este seria el email del usuario que paga
            'success_url' => route('success'),
            'cancel_url'  => route('checkout'),

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
