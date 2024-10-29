<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\CartMaster;
use App\Models\OrderMaster;
use Illuminate\Http\Request;
use Stripe\Climate\Order;
use Stripe\Webhook;

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
                    'currency' => 'inr',
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
            'success_url' => route('`dashboard`'),  // Success URL
            'cancel_url' => route('cart.index'),  // Cancel URL
        ]);

        if($session == true){
            $userId = auth()->id();  // Replace with the appropriate method to get the user ID

            // Fetch cart items
            $cartItems = CartMaster::where('user_id', $userId)->get();


            // Check if there are cart items
        if ($cartItems->isEmpty()) {
            return response()->json(['error' => 'No cart items found'], 404);}
        

            foreach ($cartItems as $cartItem) {
                // Move each cart item to the Order table
                OrderMaster::create([
                'user_id' => $userId,
                'product_id' => $cartItem->product_id, // Ensure this exists in your CartMaster model
                'product_name' => $cartItem->product->product_name, // Assuming you have this field in your CartMaster
                'company_name' => $cartItem->product->company_name, // Assuming you have this field in your CartMaster
                'product_price' => $cartItem->product->product_price, // Assuming you have this field in your CartMaster
                'final_price' => $cartItem->product->final_price, // Final price of the product
                'product_quantity' => $cartItem->quantity, // Quantity of the product
                'user_address' => $request->user_address, // Assuming this is passed with the webhook event
                'product_image' => $cartItem->product->product_image, // Assuming your product model has an image URL
                ]);
            }

            // Clear the user's cart
            CartMaster::where('user_id', $userId)->delete();
            // dd($cartItems);
        }
        

        // Redirect to Stripe checkout session URL
        return redirect()->away($session->url);
    }

    public function handleStripeWebhook(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $endpointSecret = config('stripe.webhook_secret');

        try {
            $event = Webhook::constructEvent($payload, $sigHeader, $endpointSecret);
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response()->json(['error' => 'Invalid payload'], 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        if ($event->type === 'checkout.session.completed') {
            $session = $event->data->object;

            // Assuming we have a user ID to find the cart items (e.g., session or JWT)
           
        }

        return response()->json(['status' => 'success'], 200);
    }
}
