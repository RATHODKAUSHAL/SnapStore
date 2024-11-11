<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class SellerAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if(!$token) {
            return response()->json(['message' => 'Token not Provided'], 401);
        }

        $accessToken = PersonalAccessToken::findToken($token);

        if(!$accessToken || !$accessToken->tokenable()){    
            return response()->json(['message' => 'Invalid or expired token'], 401);
        }

        //Authenticate the user with the tokenable model(usually the User model)
        $request->ApiSellerAuth = $accessToken->tokenable;

        return $next($request);
    }
}
