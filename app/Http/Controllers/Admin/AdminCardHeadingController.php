<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CardHeadingMaster;
use App\Models\ProductMaster;
use Illuminate\Http\Request;

class AdminCardHeadingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $heading = CardHeadingMaster::get();
        return view('admin.heading.index', compact('heading'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.heading.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'card_heading' => 'required|string|max:255'
        ]);

        $heading = new CardHeadingMaster();
        $heading->card_heading = $request->card_heading;
        $heading->save();
        return redirect()->route('heading.index')->with('success', 'Card Heading Added Successfully');
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
        $heading = CardHeadingMaster::findOrFail($id);
        return view('admin.heading.create', compact('heading'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $heading = CardHeadingMaster::find($id);

        if(!$heading){
            return redirect()->route('heading.index')->with('error', 'Card Heading Not Found');
        }

        $request->validate([
            'card_heading' => 'required|string|max:255'
        ]);

        $heading->card_heading = $request->card_heading;
        $heading->save();
        return redirect()->route('heading.index')->with('success', 'Card Heading Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        //
        $heading = CardHeadingMaster::find($id);
        $heading->delete($request->all());
        return redirect()->route('heading.index')->with('success', 'Card Heading Deleted Successfully');
    }
}
