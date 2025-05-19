<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

/**
 * Middleware que recorta los espacios en blanco de los valores de entrada.
 *
 * Esta clase extiende el middleware base de Laravel y se encarga de eliminar 
 * automáticamente los espacios en blanco al inicio y al final de cada valor de entrada 
 * en las solicitudes HTTP, mejorando así la consistencia de los datos.
 *
 * Algunos campos, como contraseñas, pueden ser excluidos del recorte especificándolos 
 * en el arreglo `$except`.
 *
 * @package App\Http\Middleware
 */
class TrimStrings extends Middleware
{
    /**
     * The names of the attributes that should not be trimmed.
     *
     * @var array
     */

     /**
     * Atributos que no deben ser recortados.
     *
     * Los nombres de los campos definidos aquí se excluirán del proceso de recorte
     * para evitar modificar datos sensibles como contraseñas.
     *
     * @var array<int, string>
     */
    protected $except = [
        'password',
        'password_confirmation',
    ];
}
