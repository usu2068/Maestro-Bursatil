<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo videoteca_categoria
 * 
 * Representa una categoría dentro de la videoteca.
 * 
 * Tabla: mb04_vidtk_categorias
 * 
 * Propósito:
 * - Definir las propiedades de las categorías de la videoteca.
 * - Las categorías organizan los videos dentro de la videoteca.
 * 
 * Atributos:
 * - nombre (string) → Nombre de la categoría.
 * - descripcion (string) → Descripción de la categoría.
 * - image (string) → Imagen representativa de la categoría.
 * - created_at (timestamp)
 * - updated_at (timestamp)
 */

class videoteca_categoria extends Model{
    //
    /**
     * Nombre de la tabla en la base de datos.
     * 
     * @var string
     */

	public $table = "mb04_vidtk_categorias";

    /**
     * Campos que se pueden asignar de manera masiva (mass assignable).
     * 
     * @var array
     */
    
    protected $fillable = [
        'nombre', 'descripcion', 'image', 'created_at', 'updated_at', 
    ];
}
