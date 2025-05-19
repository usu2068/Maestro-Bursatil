<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Modelo User.
 *
 * Representa a los usuarios autenticables del sistema. Esta clase extiende la clase base
 * `Authenticatable` de Laravel e incluye soporte para notificaciones.
 *
 * Está asociada a la tabla personalizada `mb04_users`.
 *
 * @package App
 */

class User extends Authenticatable
{

    /**
     * Nombre de la tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'mb04_users';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     /**
     * Atributos que pueden ser asignados de forma masiva (mass assignment).
     *
     * Estos campos se pueden llenar usando métodos como `create()` o `fill()`.
     *
     * @var array
     */
    protected $fillable = [
        'name', //nombre del usuario
        'email', // correo electronico
        'password', //contraseña (encriptada)
        'cedula', //Documento de identificación
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

     /**
     * Atributos que deben ocultarse al serializar el modelo.
     *
     * Esto evita que se expongan datos sensibles cuando el modelo se convierte en array o JSON.
     *
     * @var array
     */
    protected $hidden = [
        'password', //contraseña del usuario
        'remember_token', //token de "recordarme" para autenticacion persistente
    ];
}
