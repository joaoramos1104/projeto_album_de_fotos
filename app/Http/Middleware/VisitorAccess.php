<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VisitorAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() AND auth()->user()->active) {

            if (auth()->check() AND auth()->user()->visitor AND auth()->user()->active){
                return $next($request);
            }
        }
        return redirect('/login')->with('message', 'É preciso realizar login, verfique em seu E-mail se seu convite foi aprovado! ');
    }
}
