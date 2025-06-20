<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

/**
 * Clase ProductsOfUser
 * 
 * Este modelo representa la tabla "mb04_products_of_users" en la base de datos.
 * 
 * Su propósito es gestionar la relación entre usuarios y productos.
 * 
 * Esta tabla intermedia permite registrar qué productos ha adquirido cada usuario
 * y por cuántos días tiene licencia para usarlos.
 * 
 * Atributos:
 * - id_users: Identificador del usuario que posee el producto.
 * - id_producto: Identificador del producto que ha adquirido el usuario.
 * - dias_licen: Número de días de licencia del producto para el usuario.
 * 
 * Relaciones:
 * - Pertenece a un usuario.
 * - Pertenece a un producto.
 */

class ProductsOfUser extends Model{
    
    /**
     * Nombre de la tabla asociada a este modelo.
     * 
     * @var string
     */

    public $table = 'mb04_products_of_users';

    /**
     * Atributos que se pueden asignar de forma masiva.
     * 
     * @var array
     */

    protected $fillable = [
        'id_users', 'id_producto', 'dias_licen',
    ];

    /**
     * Relación: Este registro pertenece a un usuario.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

     
    public function usuario(){

        return $this->belongsTo(User::class, 'id_users');

    }

    /**
     * Relación: Este registro pertenece a un producto.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    
    public function producto(){

        return $this->belongsTo(Producto::class, 'id_producto');

    }
}
