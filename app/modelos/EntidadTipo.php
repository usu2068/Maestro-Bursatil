<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

/**
 * Clase EntidadTipo
 * 
 * Este modelo representa la tabla "mb04_tipo_ent" en la base de datos.
 * 
 * Se utiliza para gestionar los diferentes tipos o clasificaciones de entidades que existen en el sistema.
 * 
 * Por ejemplo: empresas, organizaciones, instituciones educativas, etc.
 * 
 * Actualmente, este modelo no tiene relaciones ni campos definidos, pero sirve como representación básica de la tabla.
 */

class EntidadTipo extends Model{

    /**
     * Nombre de la tabla asociada a este modelo.
     * 
     * @var string
     */
    
    public $table = "mb04_tipo_ent";

}
