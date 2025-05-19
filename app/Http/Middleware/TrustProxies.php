<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Fideloper\Proxy\TrustProxies as Middleware;

/**
 * Middleware para confiar en proxies inversos.
 *
 * Esta clase permite configurar los proxies confiables para la aplicación, 
 * como balanceadores de carga o servidores de gateway, asegurando que Laravel 
 * interprete correctamente las cabeceras de la solicitud como `X-Forwarded-For`, 
 * `X-Forwarded-Host`, `X-Forwarded-Proto`, etc.
 *
 * Es útil en entornos donde la aplicación se ejecuta detrás de proxies (como Nginx, 
 * HAProxy o servicios en la nube como AWS ELB).
 *
 * @package App\Http\Middleware
 */

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array
     */

     /**
     * Lista de direcciones IP de proxies confiables.
     *
     * Puede ser una lista de direcciones IP, rangos CIDR o `*` para confiar en todos los proxies.
     *
     * @var array|string|null
     */
    protected $proxies;

    /**
     * The headers that should be used to detect proxies.
     *
     * @var int
     */

     /**
     * Cabeceras que deben usarse para detectar proxies.
     *
     * Laravel usará estas cabeceras para obtener la IP real del cliente, el host, el protocolo, etc.
     * Por defecto se usa `HEADER_X_FORWARDED_ALL`.
     *
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
