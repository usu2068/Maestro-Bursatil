<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

/**
 * Middleware para cifrar automáticamente las cookies en la aplicación.
 *
 * Esta clase extiende el middleware base `EncryptCookies` de Laravel y se utiliza para 
 * garantizar que todas las cookies salientes estén cifradas, excepto aquellas 
 * explícitamente especificadas en la propiedad `$except`.
 *
 * Laravel desencripta automáticamente las cookies entrantes si fueron previamente cifradas.
 *
 * @package App\Http\Middleware
 */
class EncryptCookies extends Middleware
{

    /**
     * Lista de nombres de cookies que no deben ser cifradas.
     *
     * Si necesitas que alguna cookie esté exenta del cifrado por cualquier razón 
     * (por ejemplo, interoperabilidad con servicios externos), puedes incluir 
     * su nombre en este arreglo.
     *
     * @var array<int, string>
     */

    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
     */
    protected $except = [
        // Agrega aquí los nombres de cookies que no deban cifrarse
    ];
}
