<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function checkout()
    {
        // This is your test secret API key.
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [[
                # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
                // 'price' => 'price_1LCiEBJmXMB6bamcGV3qOCij',
                'price_data' => [
                    'currency' => 'gbp',
                    'product_data' => [
                        'name' => 'product x',
                    ],
                    'unit_amount' => 500,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('cancel'),
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        return "Success";
    }

    public function cancel()
    {
        return "Cancel";
    }
}
