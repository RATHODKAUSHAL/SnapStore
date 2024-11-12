<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
// use Illuminate\Support\Facades\Log;

class SellerAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next)
    {
        // Get the JWT token from the request's Authorization header
        $token = $request->bearerToken();
        // dd($token);
        // If no token is provided, return an error response
        if (!$token) {
            return response()->json(['message' => 'Token not provided'], 401);
        }

        try {
            // Try to parse and authenticate the token
            $seller = JWTAuth::parseToken()->authenticate();
           
            // If authentication fails, return an error response
            if (!$seller) {
                return response()->json(['message' => 'User not found'], 404);
            }
            
            // Set the authenticated user to the request for further use
            $request->attributes->set('ApiSellerAuth', $seller);
        }
         catch (\Exception $e) {
            // Catch errors like token not found or expired
            // dd($token);
            return response()->json(['message' => 'Token invalid or expired'], 401);
        }
        // Proceed with the next middleware or controller
        return $next($request);
    }
}
