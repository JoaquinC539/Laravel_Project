<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
    }
    public function welcome(Request $request)
    {

        return view('home.welcome');
    }
    public function dashboard(Request $request)
    {        
        $user = auth()->user();
        return view('home.dashboard', [ 'user' => $user]);
    }

}
