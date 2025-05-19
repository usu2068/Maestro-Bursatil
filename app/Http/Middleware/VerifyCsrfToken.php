<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

/**
 * Middleware para la verificación del token CSRF (Cross-Site Request Forgery).
 *
 * Esta clase protege la aplicación contra ataques CSRF al verificar que cada 
 * solicitud POST, PUT, PATCH o DELETE contenga un token válido que coincida 
 * con el generado por la aplicación.
 *
 * Puedes excluir ciertas rutas de la verificación agregándolas al arreglo `$except`.
 *
 * @package App\Http\Middleware
 */

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */

     /**
     * URIs que deben excluirse de la verificación CSRF.
     *
     * Aquí puedes especificar rutas (o patrones de rutas) que no requieren 
     * validación del token CSRF. Esto es útil cuando se integran servicios externos
     * o APIs que no pueden manejar el token.
     *
     * Ejemplo:
     * protected $except = [
     *     'api/*',
     *     'webhook/recibir',
     * ];
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
