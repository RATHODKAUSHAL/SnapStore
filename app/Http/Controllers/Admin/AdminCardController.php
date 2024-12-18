<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CardHeadingMaster;
use App\Models\CardMaster;
use App\Models\ProductMaster;
use Illuminate\Http\Request;

class AdminCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = ProductMaster::get();
        $cardheading = CardHeadingMaster::get();
        return view('admin.card.index', [
            'products' => $products,
            'cardheading' => $cardheading
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $products = ProductMaster::get();
        $cardheading = CardHeadingMaster::get();
        return view('admin.card.create', [
            'products' => $products,
            'cardheading' => $cardheading
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $cardHeadingMaster = CardHeadingMaster::findOrFail($request->card_heading); 
        
        $cardHeadingMaster->products()->sync($request->product);
        // dd($cardHeadingMaster->products);
        return redirect()->route('card.index')->with('success', 'Card created successfully.');
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
