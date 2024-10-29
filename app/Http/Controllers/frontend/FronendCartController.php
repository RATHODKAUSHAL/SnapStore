<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\CartMaster;
use App\Models\ProductMaster;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FronendCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cart = CartMaster::where('user_id',auth()->user()->id)->get();
        $products = ProductMaster::get();
        return view('frontend.cart.index', [
            'cart' => $cart,
            'products' => $products,
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if(Auth::id()){
            $user = auth()->user();
            $product_id = $request->input('product_id');
            $cart = new CartMaster();
            $cart->user_id = $user->id;
            $cart->product_id = $product_id;
            $cart->save();

            return redirect()->route('cart.index');
        }else{
            return redirect()->route('auth.login');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Request $request ,string $id)
    {
        //
        $cart = CartMaster::find($id);
        $cart->delete($request->all());
        return redirect()->route('cart.index')->with('success', 'Product  has been removed from cart');
    }
}
