<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

/**
 * Clase PreguntasQuiz
 * 
 * Este modelo representa la tabla "mb04_preguntas_quizs" en la base de datos.
 * 
 * Su propósito es gestionar las preguntas que pertenecen a un Quiz.
 * 
 * Cada pregunta tiene varias opciones de respuesta y una opción correcta.
 * 
 * Atributos:
 * - id_quizs: Identificador del quiz al que pertenece la pregunta.
 * - pregunta: Texto de la pregunta.
 * - r1, r2, r3, r4: Opciones de respuesta.
 * - correcta: Indica cuál de las opciones es la respuesta correcta.
 * 
 * Relaciones:
 * - Cada pregunta pertenece a un quiz.
 */

class PreguntasQuiz extends Model{
    //
    /**
     * Nombre de la tabla asociada a este modelo.
     * 
     * @var string
     */

    public $table = "mb04_preguntas_quizs";

    /**
     * Atributos que se pueden asignar de forma masiva.
     * 
     * @var array
     */

    protected $fillable = [
        'id_quizs', 'pregunta', 'r1', 'r2', 'r3', 'r4', 'correcta',
    ];

    /**
     * Relación: Cada pregunta pertenece a un quiz.
     * 
     * Esta relación permite obtener el quiz al que está asociada la pregunta.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    
    public function quiz(){

		return $this->belongsTo(Quiz::class, 'id_quizs');
	}
}
