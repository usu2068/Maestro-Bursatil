<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

/**
 * Clase Guia
 * 
 * Este modelo representa la tabla "mb04_guia" en la base de datos.
 * 
 * Su función es gestionar las guías que se almacenan en el sistema.
 * 
 * Cada guía contiene información como:
 *  - Nombre de la guía.
 *  - Imagen de portada.
 *  - Enlace a un recurso en ISSUU.
 *  - Enlace a un libro en formato iBook.
 */

class Guia extends Model{
	
    /**
     * Nombre de la tabla asociada a este modelo.
     * 
     * @var string
     */

    public $table = "mb04_guia";

    /**
     * Campos que se pueden asignar masivamente (mass assignment).
     * 
     * Estos campos se pueden rellenar automáticamente al crear o actualizar una guía.
     * 
     * @var array
     */


    protected $fillable = [
        'nombre',   // Nombre de la guía.
        'portada',  // Imagen de portada asociada a la guía.
        'issu',     // URL o identificador de la guía en ISSUU.
        'ibook',    // URL o identificador de la guía en iBook.
    ];
}
