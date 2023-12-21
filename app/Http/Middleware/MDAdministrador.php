<?php
namespace App\Http\Middleware;

use Closure;
use Session;

class MDAdministrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if(!Session::has('usuario'))
        // {
        //     dd('no hay usuario comos sesion');
        // }
        // else
        // {
        //     dd('si hay');
        // }
        if(!Session::has('usuario'))
        {
            return redirect('login/login');
        }
        $response = $next($request);
        return $response;
    }
}