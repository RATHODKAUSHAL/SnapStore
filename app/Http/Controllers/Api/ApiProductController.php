<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\categoryMaster;
use App\Models\ProductMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ApiProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $product = ProductMaster::all();

        if ($product->count() > 0) {
            return response()->json([
                'status' => 200,
                'product' => $product->toArray(),
                'success' => true
            ], 200);
        } else {
            return  response()->json([
                'status' => 404,
                'message' => 'No product found'
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //
        $product = ProductMaster::find($id);
        if ($product) {
            return response()->json([
                'status' => 200,
                'product' => $product
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Product not found'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422);
        }
    
        // Set default values for image path and filename
        $path = '';
        $filename = '';
    
        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/productImage/';
            $file->move($path, $filename);
        }
    
        // Save the product
        $product = new ProductMaster();
        $product->product_name = $request->product_name;
        $product->company_name = $request->company_name;
        $product->category_id = (int) $request->category_id;
        $product->product_size = $request->product_size;
        $product->product_model = $request->product_model;
        $product->product_price = $request->product_price;
        $product->final_price = $request->final_price;
        $product->product_image = $path . $filename; // image upload
        $product->product_discount = $request->product_discount;
        $product->product_description = $request->product_description;
        $product->product_rating = $request->product_rating;
        $product->save();
    
        if ($product) {
            return response()->json([
                'status' => 200,
                'message' => 'Product Created Successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Data not responding'
            ], 500);
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
        $product = ProductMaster::find($id);
        if($product){
            return response()->json([
                'status' => 200,
                'product' => $product
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'No Such Product Found'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(),[

        ]);


        $path = '';
        $filename = '';
    
        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/productImage/';
            $file->move($path, $filename);
        }

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }else{
            $product = ProductMaster::find($id);

            if($product){
               $product->update([
                "product_name" => $request->product_name,
                "company_name" => $request->company_name,
                "category_id" => $request->category_id,
                "product_size" => $request->product_size,
                "product_model" => $request->product_model,
                "product_price" => $request->product_price,
                "final_price" => $request->final_price,
                "product_image" => $path.$filename, // image upload
                "product_discount" => $request->product_discount,
                "product_description" => $request->product_description,
                "product_rating" => $request->product_rating,
               ]);
                // $product->save();

                return response()->json([
                    'status' => 200,
                    'message' => 'product data Updated Successfully' 
                ],200);
            }else{
                return response()->json([
                    'status' => 404,
                    'message' => 'data not responding' 
                ],404);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
