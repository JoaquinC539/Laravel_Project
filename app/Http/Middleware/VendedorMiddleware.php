<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class VendedorMiddleware
{
   
    public function handle(Request $request, Closure $next): Response
    {
        $user=Auth ::user();
        if($user && $user->vendedor<20){
            return $next($request);
        }
        else{
            return redirect('/')->with('error','No tienes permiso para ver esta pagina');
        }
        
    }
}
