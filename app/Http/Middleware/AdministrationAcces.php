<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdministrationAcces
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->user() && ($request->user()->role->name == "Admin" || $request->user()->role->name == "Webmaster" || $request->user()->role->name == "Rédacteur" )){
            return $next($request);
        }else{
            return redirect('/')->withErrors('Vous devez être connecté pour accéder à cette page !');
        }
    }
}
