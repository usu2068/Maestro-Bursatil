<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Middleware que redirige a usuarios autenticados lejos de rutas públicas.
 *
 * Este middleware se utiliza para evitar que usuarios autenticados accedan a rutas 
 * destinadas solo a usuarios no autenticados (como el login o el registro).
 *
 * Si el usuario ya ha iniciado sesión, será redirigido automáticamente a la ruta `/home`.
 *
 * @package App\Http\Middleware
 */

class RedirectIfAuthenticated
{
    /**
     * Maneja una solicitud entrante.
     *
     * Si el usuario está autenticado bajo el guard especificado (o el predeterminado),
     * se redirige a la ruta `/home`. Si no está autenticado, se continúa con la 
     * solicitud normalmente.
     *
     * @param  \Illuminate\Http\Request  $request  La solicitud HTTP entrante.
     * @param  \Closure  $next  La siguiente función o middleware en la cadena.
     * @param  string|null  $guard  El guard de autenticación a verificar (opcional).
     * @return mixed  La respuesta HTTP, ya sea una redirección o el siguiente middleware.
     */
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
    }
}
