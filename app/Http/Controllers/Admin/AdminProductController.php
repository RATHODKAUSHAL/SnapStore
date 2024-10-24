<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categoryMaster;
use App\Models\ProductMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = ProductMaster::get();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category = categoryMaster::get();
        return view('admin.product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([    
            'product_image' =>  'required|mimes:jpg,jpeg,webp,png,gif,svg|max:2048',
            'category_id' => 'required|string|max:255'
        ]);

        //images  upload 
        if($request->hasFile('product_image')){
            $file = $request->file('product_image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $path = 'uplods/productImage/';
            $file->move($path,  $filename);
        }

        $products = new ProductMaster();
        $products->product_name = $request->product_name;
        $products->company_name = $request->company_name;
        $products->category_id = $request->category_id;
        $products->product_size = $request->product_size;
        $products->product_model = $request->product_model;
        $products->product_price = $request->product_price;
        $products->final_price = $request->final_price;
        $products->product_image = $path.$filename;// image upload 
        $products->product_discount = $request->product_discount;
        $products->product_description = $request->product_description;
        $products->product_rating = $request->product_rating;
        $products->save();
        return redirect()->route('product.index')->with('success', 'product Added successfully');
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
        $products = ProductMaster::findOrFail($id);
        $category = categoryMaster::get();
        return view('admin.product.create',[
            'products' => $products,
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $products = ProductMaster::find($id);

        if(!$products){
            return redirect()->route('product.index')->with('error', 'Product Not Found');
        }

        $request->validate([    
            'product_image' =>  'required|mimes:jpg,jpeg,webp,png,gif,svg|max:2048',
            'category_id' => 'required|string|max:255'
        ]);

        if($request->hasFile('product_image')){
            $file = $request->file('product_image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $path = 'uplods/productImage/';
            $file->move($path,$filename);

            if(File::exists($products->product_image)){
                File::delete($products->product_image);
            }
        }

        $products->product_name = $request->product_name;
        $products->company_name = $request->company_name;
        $products->category_id = $request->category_id;
        $products->product_size = $request->product_size;
        $products->product_model = $request->product_model;
        $products->product_price = $request->product_price;
        $products->product_image = $path.$filename;// image upload 
        $products->product_discount = $request->product_discount;
        $products->product_description = $request->product_description;
        $products->product_rating = $request->product_rating;
        $products->save();

        return redirect()->route('product.index')->with('success', 'Product Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Request $request ,string $id)
    {
        //
        $products = ProductMaster::find($id);
        if(File::exists($products->product_image)){
            File::delete($products->product_image);
        }
        $products->delete($request->all());
        return redirect()->route('product.index')->with('success', 'Product Delete successfully');
    }
}
