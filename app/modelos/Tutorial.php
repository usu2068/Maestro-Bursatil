<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Tutorial
 * 
 * Representa un tutorial dentro de la aplicación.
 * 
 * Tabla: mb04_tutoria
 * 
 * Propósito:
 * - Definir un tutorial con su nombre y características.
 * - Asociar múltiples temas a un tutorial.
 * 
 * Atributos:
 * - nombre (string)
 * - caracteristica (string)
 * 
 * Relaciones:
 * - Muchos a muchos con ContenidoTuto (temas del tutorial)
 */

class Tutorial extends Model{
	
    /**
     * Nombre de la tabla en la base de datos.
     * 
     * @var string
     */

    public $table = "mb04_tutoria";

    /**
     * Campos que se pueden asignar de manera masiva (mass assignable).
     * 
     * @var array
     */

    protected $fillable = [
        'nombre', 'caracteristica'
    ];

    /**
     * Relación: Temas asociados a este tutorial.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function temsTuto(){

        return $this->belongsToMany('App\modelos\ContenidoTuto', 'mb04_temasOfTutoria', 'id_tutoria', 'id_contenido');
    }
}
