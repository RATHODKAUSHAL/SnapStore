<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categoryMaster;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $category = categoryMaster::get();
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $category = new categoryMaster();
        $category->category_name = $request->category_name;
        $category->save();
        return  redirect()->route('category.index')->with('success', 'Category Added Successfully');
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
        
        $category = categoryMaster::findOrFail($id);
        return view('admin.category.create', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        
        $category = categoryMaster::find($id);

        if(!$category){
            return redirect()->route('category.index')->with('error', 'category not Found.');
        }

        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category->category_name = $request->category_name;
        $category->save();
        return redirect()->route('category.index')->with('success', 'category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        //
        $category = categoryMaster::find($id);
        $category->delete($request->all());
        return redirect()->route('category.index')->with('success', 'category deleted successfully deleted');
    }

    public function search(Request $request){
        $category = categoryMaster::search($request);

        $param = [];
        foreach($category as $key =>  $value){
            $param[$key]['id'] = $value['id'];
            $param[$key]['text'] = $value['category_name'];
        }
        $results['results'] = $param;
        return $results;
    }

    public function findcategory(Request $request){
        $category = categoryMaster::findcategory($request);
        if(empty($category)){
            return response()->json([
                'success' => 'false'
            ]);
        }

        return response()->json([
            'success' => 'true',
            'category' => $category->toArray()
        ]);
    }
}
