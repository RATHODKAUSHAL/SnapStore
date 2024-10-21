<?php

namespace App\Http\Controllers;

use App\Models\ApiTesting;
use App\Http\Requests\StoreApiTestingRequest;
use App\Http\Requests\UpdateApiTestingRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ApiTestingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = ApiTesting::all();
        //in this APiTesting name is from model 
        if($customer-> count() > 0){
            return response() -> json([
                'status' => 200,
                'customer' => $customer
            ], 200);
        } else{
            return response()->json([
                'status' => 404,
                'message' => 'No Customer data Found'
            ], 404);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $customer = ApiTesting::find($id);
        if($customer){
            return response()->json([   
                'status' => 200,
                'Student' => $customer
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'No Such data Found' 
            ],404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApiTestingRequest $request)
{
    // Fixing the validation rules
    $validator = Validator::make($request->all(),[
       
    ]);

    if($validator->fails()){
        return response()->json([
            'status' => 422,
            'errors' => $validator->messages()
        ],422);
    }else{
        // Attempt to create the customer
        $customer = ApiTesting::create([
            'product' => $request->product,
            'category' => $request->category,
            'brand' => $request->brand,
            'price' => $request->price,
        ]);

        // Check if the creation was successful
        if($customer){
            return response()->json([
                'status' => 200,
                'message' => 'Customer Created Successfully'
            ],200);
        }else{
            return response()->json([
                'status' => 500,
                'message' => 'Data not responding'
            ],500);
        }   
    }
}

    

    /**
     * Display the specified resource.
     */
    public function show(ApiTesting $apiTesting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer = ApiTesting::find($id);
        if($customer){
            return response()->json([
                'status' => 200,
                'student' => $customer 
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'No Such Student Found' 
            ],404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApiTestingRequest $request, ApiTesting $apiTesting, int $id)
    {
        $validator = Validator::make($request->all(), [

        ]);

        if($validator->fails()){
            return response()->json()([
                'status' => 422,
                'errors' => $validator->messages()
            ],422);
        }else{
            $customer = ApiTesting::find($id);

            if($customer){
                $customer->update([
                    'product' => $request->product,
                    'category' => $request->category,
                    'brand' => $request->brand,
                    'price' => $request->price,
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => 'customer data Updated Successfully' 
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
    public function destroy(int $id)
    {
        $customer = ApiTesting::find($id);
        if($customer){
            $customer->delete();
            DB::statement('ALTER TABLE students AUTO_INCREMENT = 1');
            return response()->json([
                'status' => 200,
                'message' => 'Student Deleted Successfully' 
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'No Such Student Found' 
            ],404);
        }
    }
}
