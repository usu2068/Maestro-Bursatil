<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class ProductsOfUser extends Model{
    
    public $table = 'mb04_products_of_users';

    protected $fillable = [
        'id_users', 'id_producto', 'dias_licen',
    ];

    public function usuario(){

        return $this->belongsTo(User::class, 'id_users');

    }

    public function producto(){

        return $this->belongsTo(Producto::class, 'id_producto');

    }
}
