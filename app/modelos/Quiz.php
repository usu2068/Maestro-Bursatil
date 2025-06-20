<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;
	
/**
 * Clase Quiz
 * 
 * Este modelo representa la tabla "mb04_quizs" en la base de datos.
 * 
 * Su propósito es almacenar la información de los diferentes quizzes (cuestionarios)
 * que existen en el sistema.
 * 
 * Atributos:
 * - name: Nombre o título del quiz.
 * - num_pregs: Número de preguntas que contiene el quiz.
 * 
 * Nota:
 * - Por el momento no se definen relaciones explícitas con otros modelos,
 *   aunque normalmente un quiz podría tener muchas preguntas asociadas.
 */

class Quiz extends Model{
    //

    /**
     * Nombre de la tabla asociada a este modelo.
     * 
     * @var string
     */

	public $table = "mb04_quizs";

    /**
     * Atributos que se pueden asignar de forma masiva.
     * 
     * @var array
     */
    
    protected $fillable = [
        'name', 'num_pregs',
    ];

}
