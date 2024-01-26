<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller{
    public function __construct(){
    }
    public function login(Request $request){
        $credentials=$request->only('username','password');
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            return redirect()->intended('/home');
        }else{
            return redirect()->back()->withErrors('Credenciales incorrectas');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->intended('/');
    }
    
}
