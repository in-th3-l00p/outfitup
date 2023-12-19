<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;
use Stripe\Checkout\Session;

class CheckoutController extends Controller {
    public function checkout(Request $request) {
        $items = $request->user()
            ->cart_items()
            ->with("product")
            ->get();

        $line_items = $items->map(function ($item) {
            return [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item->product->title,
                    ],
                    'unit_amount' => $item->product->price * 100, // Stripe expects the amount in cents
                ],
                'quantity' => $item->quantity,
            ];
        })->toArray();

        if (!$request->user()->hasStripeId())
            $request->user()->createAsStripeCustomer();
        return $request->user()->checkout($line_items, [
            "success_url" => route("checkout.success") . "?session_id={CHECKOUT_SESSION_ID}",
            "cancel_url" => route("checkout.cancel")
        ]);
    }

    public function success(Request $request) {
        $session = Cashier::stripe()->checkout->sessions->retrieve($request->session_id);
        return view("checkout.success");
    }

    public function cancel(Request $request) {
        return view("checkout.cancel");
    }
}
