<?php

namespace App\modelos;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    
    public $table = "mb04_users";

    use Notifiable;

    /**
     * The attributes that are mass assignable.
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
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function findByEmail($email){

        return static::where(compact('email'))->first();
    }

    /**- SE ESTABLECE LA RELACIONO DE EL USUARIO CON LOS PERFILES Y LAS ENTIDADES -**/

    public function entidad(){

        return $this->belongsTo(Entidad::class, 'id_entidad');

    }

    public function perfil(){
        
        return $this->belongsTo(Perfil::class, 'id_perfil');

    }

    public function productsUser(){

         return $this->belongsToMany('App\modelos\Producto', 'mb04_products_of_users', 'id_users', 'id_producto');
    }
}
