<?php

// Define el espacio de nombres del controlador
namespace App\Http\Controllers\Auth;

// Importa el controlador base
use App\Http\Controllers\Controller;

// Importa el trait que contiene la lógica para restablecimiento de contraseñas
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.

    | Este controlador se encarga de manejar las solicitudes para restablecer 
    | contraseñas. Utiliza el trait ResetsPasswords, que proporciona toda la 
    | funcionalidad necesaria, como mostrar el formulario de restablecimiento, 
    | validar el token, actualizar la contraseña, y redirigir al usuario.
    |
    */

    // Incluye el trait que implementa la lógica de restablecimiento de contraseña
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     * Ruta a la cual se redirige al usuario luego de restablecer su contraseña.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     * 
     * Constructor del controlador.
     * Aplica el middleware 'guest', lo que significa que este controlador 
     * solo puede ser accedido por usuarios no autenticados.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}

/**
 * NOTA:
 * Este controlador forma parte del sistema de autenticación de Laravel y su función principal es gestionar el proceso de restablecimiento de contraseñas. 
 * Usa el trait ResetsPasswords que ya contiene la lógica necesaria, permitiendo mantener el controlador limpio y conciso. 
 * Solo se define la ruta de redirección y el middleware para usuarios no autenticados.
 */