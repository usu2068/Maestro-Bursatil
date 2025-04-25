<?php

//define el espacio de nombres para este controlador, indicando que pertenece a la carpeta auth dentro de los controladores
namespace App\Http\Controllers\Auth;

//importa la clase base controller, que todos los controladores en laravel extienden
use App\Http\Controllers\Controller;

//importa el trait senspasswordresetemail, que contiene la logica para enviar correos de reestablecimiento de contraseña
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

/**
 * clase ForgotPaswwordControlle
 * 
 * Este controlador se encarga de manejar el envio de correo para el reestablecimiento de contraseñas.
 * Utiliza el trait SendsPasswordResetEmails proporcionado por Laravel, el cual contiene toda la lógica
 * necesaria para enviar enlaces de restablecimiento de contraseña a los usuarios registrados.
 */
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    //usa el trait que proporciona metodos listos para enviar correos de reestablecimiento.
    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     * crea una nueva instancia del controlador.
     * 
     * Aplica el middleware 'guest', lo que significa que solo los usuarios no autenticados
     * pueden acceder a las rutas controladas por este controlador.
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
 * Este archivo es uno de los controladores predeterminados que laravel incluye para gestionar el flujo del restablecimiento de la contraseña.
 * 
 * TRAIT: herramienta que permite reutilizar metodos en multiples clase, sin necesidad de usar herencia directa.
 * los trait se usan cuando varia clases necesitan compartir logica comun, pero no tienen una relacion de herencia entre ellas. Es una forma elegante de evitar duplicar codigo.
 */