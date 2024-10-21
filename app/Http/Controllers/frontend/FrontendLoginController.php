<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendLoginController extends Controller
{
    //
    public function login(){
        return view('frontend.auth.login');
    }

    public function loginSubmit(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:6'
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if(!empty($user)){
            if(!is_null($user->password)){
                if(Auth::guard()->attempt($credentials)){
                    return redirect()->route('dashboard');
                }
            }
        }
        return redirect()->route('auth.login');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate(); 
        return redirect()->route('dashboard');
    }
}
