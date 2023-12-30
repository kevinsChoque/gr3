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
        // Deshabilitar la caché en la respuesta
        $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
        return $response;
    }
}