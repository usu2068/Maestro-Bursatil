<?php

namespace App\modelos;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Modelo User
 * 
 * Representa un usuario autenticable de la aplicación.
 * 
 * Tabla: mb04_users
 * 
 * Propósito:
 * - Definir las propiedades y relaciones del usuario.
 * - Permitir autenticación y notificaciones.
 * 
 * Atributos:
 * - id_entidad (int)
 * - id_perfil (int)
 * - name (string)
 * - email (string)
 * - cedula (string)
 * - password (string)
 * 
 * Relaciones:
 * - Pertenece a una Entidad.
 * - Pertenece a un Perfil.
 * - Muchos a muchos con Productos (productos adquiridos por el usuario).
 */

class User extends Authenticatable
{
    /**
     * Nombre de la tabla en la base de datos.
     * 
     * @var string
     */

    public $table = "mb04_users";

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     /**
     * Campos que se pueden asignar de manera masiva (mass assignable).
     * 
     * @var array
     */

    protected $fillable = [
        'id_entidad', 'id_perfil', 'name', 'email', 'cedula', 'password', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

     /**
     * Atributos que se deben ocultar en arrays y JSON.
     * 
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Buscar un usuario por su email.
     * 
     * @param string $email
     * @return static|null
     */

    public static function findByEmail($email){

        return static::where(compact('email'))->first();
    }

    /**- SE ESTABLECE LA RELACIONO DE EL USUARIO CON LOS PERFILES Y LAS ENTIDADES -**/

    /**
     * Relación: El usuario pertenece a una entidad.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function entidad(){

        return $this->belongsTo(Entidad::class, 'id_entidad');

    }

    /**
     * Relación: El usuario pertenece a un perfil.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function perfil(){
        
        return $this->belongsTo(Perfil::class, 'id_perfil');

    }

    /**
     * Relación: Productos asociados al usuario.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    
    public function productsUser(){

         return $this->belongsToMany('App\modelos\Producto', 'mb04_products_of_users', 'id_users', 'id_producto');
    }
}
