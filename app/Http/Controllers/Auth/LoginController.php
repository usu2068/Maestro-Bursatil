<?php

//define el espacio de nombres de la clase para mantener el codigo organizado.
namespace App\Http\Controllers\Auth;

//importa el controlador base de laravel
use App\Http\Controllers\Controller;

//importa el trait que contiene la logica para la autenticación de usuarios.
use Illuminate\Foundation\Auth\AuthenticatesUsers;

/**
 * 
 * Este controlador gestiona la autenticación de los usuarios en la aplicación
        * y los redirecciona a una ruta determinada después del login exitoso.
        * Utiliza el trait `AuthenticatesUsers` que proporciona de forma conveniente
        * todos los métodos necesarios para manejar el proceso de autenticación.
 */

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    |  
    */

    //uncluye el trait que proporciona la logica de autenticacion (login, logout, etc.)
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     * ruta a la que seran redirigidos los usuarios despues de iniciar sesion correctamente.
     *
     * @var string
     */
    protected $redirectTo = '/master';

    /**
     * Create a new controller instance.
     * 
     * Se define el middleware `guest` para evitar que usuarios autenticados accedan
     * a las rutas de login. Se exceptúa el método `logout` para permitir que un usuario
     * autenticado pueda cerrar sesión.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

/**
 * NOTA:
 * 
 * Maneja la autenticacion de usuarios.
 * Se encarga de iniciar sesión (login) de los usuarios.
 * Define a qué ruta se redirige al usuario después de autenticarse (/master en este caso).
 * Utiliza el trait AuthenticatesUsers, que ya contiene toda la lógica predeterminada para:
 * mostrar el formulario de login,
 * validar credenciales,
 * iniciar sesión,
 * cerrar sesión (logout),
 * y redirigir según el rol o configuración definida.
 */