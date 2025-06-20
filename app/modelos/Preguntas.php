<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

/**
 * Clase Preguntas
 * 
 * Este modelo representa la tabla "mb04_preguntas" en la base de datos.
 * 
 * Su propósito es gestionar las preguntas que forman parte de los simuladores o evaluaciones.
 * 
 * Cada pregunta pertenece a un tema específico y contiene varias opciones de respuesta,
 * así como la respuesta correcta y una posible explicación.
 * 
 * Atributos:
 * - id_tema: Identificador del tema al que pertenece la pregunta.
 * - pregunta: Texto de la pregunta.
 * - r1, r2, r3, r4: Opciones de respuesta.
 * - correcta: Indica cuál de las opciones es la correcta.
 * - explicacion: Explicación de la respuesta correcta.
 * 
 * Relaciones:
 * - Cada pregunta pertenece a un tema de simulador.
 */

class Preguntas extends Model{
	
    /**
     * Nombre de la tabla asociada a este modelo.
     * 
     * @var string
     */

    public $table = "mb04_preguntas"; 

    /**
     * Atributos que se pueden asignar de forma masiva.
     * 
     * @var array
     */

    protected $fillable = [
        'id_tema', 'pregunta', 'r1', 'r2', 'r3', 'r4', 'correcta', 'explicacion', 
    ];

    /**
     * Relación: Cada pregunta pertenece a un tema de simulador.
     * 
     * Esta relación permite obtener el tema al que está asociada la pregunta.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    
    public function tema(){

        return $this->belongsTo(ContenidoSimu::class, 'id_tema');

    }
}
