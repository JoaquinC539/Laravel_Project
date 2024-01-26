<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vendedor;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            "nombre" => 'required|string',
            'username' => 'required|string|unique:users',
            'password' => 'required|string|min:8',
            'vendedor' => 'required|integer',
        ]);

        $user = User::create([
            'nombre' => $request->nombre,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'vendedor' => $request->vendedor,
        ]);

        return redirect()->route('register')->with('success', 'Usuario registrado exitosamente');
    }
    public function register(Request $request)
    {
        $vendedores = Vendedor::all();
        $successMessage = $request->session()->get('success');
        $errorMessage = $request->session()->get('error');
        return view('auth.register', array_merge(compact('vendedores'),
        ['successMessage' => $successMessage, 'errorMessage' => $errorMessage]));

    }
    public function login(Request $request){
        return view('auth.login');
    }



}
