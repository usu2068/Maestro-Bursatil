<?php

//define el espacio de nombres para organizar el codigo y evitar colisiones de clases
namespace App\Http\Controllers;

//importa traits que proporcionan funcionalidades comunes para los controladores
use Illuminate\Foundation\Bus\DispatchesJobs; //permite despachar trabajos (jobs) dentro de la aplicacion
use Illuminate\Routing\Controller as BaseController; //clase base para todos los controladores de laravel
use Illuminate\Foundation\Validation\ValidatesRequests; //proporciona metodos para validar solicitudes HTTP
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; //permite aplicar politicas de autorización

/**
 * clase base para los controladores de la aplicacion
 * Todos los controladores personalizados deben heredar de esta clase.
 * 
 * Esta clase agrupa funcionalidades comunes como:
 * - autorizacion de acciones del usuario
 * - validacion de solicitudes entrantes
 *  - despacho de trabajos en segundo plano
 */
class Controller extends BaseController
{
    //usa los traits para incluir sus funcionalidades en esta clase
    use AuthorizesRequests, //para verificar permisos y politicas
    DispatchesJobs, //para enviar trabajos a la cola
    ValidatesRequests; //para validar datos de entrada
}
