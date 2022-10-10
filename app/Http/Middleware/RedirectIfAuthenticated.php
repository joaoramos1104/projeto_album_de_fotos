<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check() AND Auth::guard($guard)->user()->active) {
                return redirect(RouteServiceProvider::HOME);
            }

            $credentials = [
                'email' => $request->email,
                "password" => $request->password,
            ];


            if (Auth::attempt($credentials))
            {
                $login['success'] = true;
                $login['message'] = 'Tudo certo';
                $login['user'] = Auth::guard($guard)->user();
                return response()->json([
                    'message' => $login,
                    'success' => $login,
                    'user' => $login,
                ]);
            }

            $login['success'] = false;
            $login['message'] = 'Os dados informados não conferem. Confira se os dados estão corretos e se seu convite foi aceito! ';
            return response()->json([
                'message' => $login,
                'success' => $login,
            ]);
        }
        return $next($request);
    }


}
