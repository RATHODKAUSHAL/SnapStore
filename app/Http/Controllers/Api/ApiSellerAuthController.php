<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ApiSellerAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiSellerAuthController extends Controller
{
    //
    public function index()
    {

        $seller = ApiSellerAuth::all();

        if ($seller->count() > 0) {
            return response()->json([
                'status' => 200,
                'product' => $seller->toArray(),
                'success' => true
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No seller Data found'
            ], 404);
        }
    }


    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            // 'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        $seller = ApiSellerAuth::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            // 'profile_image' => $request->profile_image,
            'gender' => $request->gender,
            'password' => bcrypt($request->password),

        ]);

        $token = JWTAuth::fromUser($seller);


        return response()->json([
            'seller' => $seller,
            'token' => $token
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = Auth::guard('seller')->attempt($credentials)) {
            return response()->json([
                'error' => 'Unothorized'
            ], 401);
        }
        return response()->json([
            'seller' => Auth::guard('seller')->user(),
            'token' => $token,
        ]);
    }
}
