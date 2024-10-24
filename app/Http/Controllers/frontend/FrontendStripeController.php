<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\CartMaster;
use Illuminate\Http\Request;

class FrontendStripeController extends Controller
{
    public function session(Request $request)
    {
        // Set Stripe API key
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        // Fetch all cart items (assuming you have a method to get user's cart items)
        $cartItems = CartMaster::all();  // This should fetch the current user's cart

        // Retrieve and calculate final price and tax from the request
        $finalPrice = $request->input('finalprice') * 100; // Convert to cents
        $tax = $request->input('tax') * 100; // Tax should also be in cents

        // Initialize line items array for Stripe Checkout
        $lineItems = [];

        // Loop through cart items and prepare line items for Stripe Checkout
        foreach ($cartItems as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item->product->product_name,  // Assuming 'product_name' field exists
                    ],
                    'unit_amount' => $item->product->final_price * 100,  // Price in cents
                ],
                'quantity' => 1,  // Assuming 'quantity' field exists
            ];
        }

        // Add tax as a separate line item if applicable
        if ($tax > 0) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Tax',
                    ],
                    'unit_amount' => $tax,  // Tax amount in cents
                ],
                'quantity' => 1,  // Single tax line item
            ];
        }

        // Create Stripe checkout session
        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('dashboard'),  // Success URL
            'cancel_url' => route('cart.index'),  // Cancel URL
        ]);

        // Redirect to Stripe checkout session URL
        return redirect()->away($session->url);
    }
}
