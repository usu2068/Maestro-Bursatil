<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

/**
 * Clase Producto
 * 
 * Este modelo representa la tabla "mb04_productos" en la base de datos.
 * 
 * Su propósito es gestionar los productos que se ofrecen en la plataforma.
 * 
 * Atributos:
 * - nombre: Nombre del producto.
 * - valor: Precio o valor del producto.
 * - contenido: Contenido incluido en el producto.
 * - descripcion: Descripción del producto.
 * - image: Imagen asociada al producto.
 * - entorno: Entorno o categoría al que pertenece el producto.
 * 
 * Relaciones:
 * - Un producto puede estar asociado a múltiples usuarios.
 * - Esta asociación se realiza a través de la tabla intermedia "mb04_products_of_users".
 */

class Producto extends Model {

    /**
     * Nombre de la tabla asociada a este modelo.
     * 
     * @var string
     */

	public $table = "mb04_productos";

    /**
     * Atributos que se pueden asignar de forma masiva.
     * 
     * @var array
     */

	protected $fillable = [
        'nombre', 'valor', 'contenido', 'descripcion', 'image', 'entorno',
    ];

    /**
     * Relación: Un producto puede pertenecer a muchos usuarios.
     * 
     * Esta relación usa una tabla intermedia "mb04_products_of_users" 
     * para gestionar los productos adquiridos por los usuarios.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

	public function productsUser(){

        return $this->belongsToMany(
            'App\modelos\User',         // Modelo relacionado
            'mb04_products_of_users',   // Tabla intermedia
            'id_users',                 // Clave foránea en la tabla intermedia que referencia al usuario
            'id_producto'               // Clave foránea en la tabla intermedia que referencia al producto
    }
    
}
