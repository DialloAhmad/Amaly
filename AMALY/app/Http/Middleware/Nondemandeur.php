<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Nondemandeur
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        if (auth()->user() && !(auth()->user()->profil=="Demandeur")) {
            return $next($request);
        }
        return redirect()->route('login');
    }
}
