<?php

// Define el espacio de nombres donde se encuentra el controlador
namespace App\Http\Controllers\Auth;

// Importa el modelo User desde la carpeta de modelos de la aplicación
use App\modelos\User;

// Importa el controlador base de Laravel
use App\Http\Controllers\Controller;

// Importa los facades necesarios para trabajar con hash de contraseñas y validación
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

// Importa el trait RegistersUsers que contiene la lógica por defecto de registro
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.

    | Este controlador se encarga del registro de nuevos usuarios en la aplicación.
    | Maneja la validación de datos, creación de usuarios, y redirección posterior.
    | Utiliza el trait RegistersUsers para reutilizar la lógica estándar de Laravel.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     * Define a qué ruta será redirigido el usuario después de registrarse exitosamente.
     *
     * @var string
     */
    protected $redirectTo = '/master';

    /**
     * Create a new controller instance.
     * 
     * Constructor del controlador.
     * Aplica el middleware 'guest', lo que significa que este controlador solo estará
     * disponible para usuarios no autenticados (invitados).
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     * 
     * Obtiene una instancia de validador para los datos del formulario de registro.
     * Define las reglas de validación como:
     * - nombre requerido, texto, máximo 255 caracteres
     * - email requerido, válido, único en la tabla mb04_users
     * - contraseña requerida, mínimo 6 caracteres y confirmada (requiere campo password_confirmation)
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:mb04_users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     * Crea una nueva instancia del modelo User después de que los datos han sido validados.
     * Se asignan valores fijos a id_entidad (4) e id_perfil (5).
     * La contraseña es cifrada con Hash::make.
     *
     * @param  array  $data
     * @return \App\modelos\User
     */
    protected function create(array $data){
        
        return User::create([
            "id_entidad" => 4,
            "id_perfil" => 5,
            "name" => $data['name'],
            "email" => $data['email'],
            "password" =>  Hash::make($data['password'])
        ]);
    }
}
