<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\CartMaster;
use App\Models\OrderMaster;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cart = CartMaster::get();
        return  view('frontend.orders.index',[
            'cart' => $cart
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = User::get();
        return view('frontend.orders.index', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('product_image')){
            $file = $request->gile('product_image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $path = 'uplods/orderImage';
            $file->move($path,$filename);
        }
        //
        $order = new OrderMaster();
        $order->user_id = $request->user_id;
        $order->product_name = $request->product_name;
        $order->product_price = $request->product_price;
        $order->final_price = $request->final_price;
        $order->company_name = $request->company_name;
        $order->user_address = $request->user_address;
        $order->product_image = $request->product_image;
        $order->product_quantity = $request->product_quantity;
        $order->save();
        return redirect()->route('dashboard');
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
    public function destroy(string $id)
    {
        //
    }
}
