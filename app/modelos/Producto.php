<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model {

	public $table = "mb04_productos";

	protected $fillable = [
        'nombre', 'valor', 'contenido', 'descripcion', 'image', 'entorno',
    ];

	public function productsUser(){

        return $this->belongsToMany('App\modelos\User', 'mb04_products_of_users', 'id_users', 'id_producto');
    }
    
}
