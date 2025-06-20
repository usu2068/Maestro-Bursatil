<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

/**
 * Clase Log_Quiz
 * 
 * Este modelo representa la tabla "mb04_log_quizs" en la base de datos.
 * 
 * Su propósito es almacenar un registro (log) de los intentos de los usuarios 
 * en la presentación de quizzes. Es útil para análisis de rendimiento, control de progreso 
 * y seguimiento de la actividad del usuario.
 */

class Log_Quiz extends Model{
    //

    /**
     * Nombre de la tabla asociada a este modelo.
     * 
     * @var string
     */

    public $table = "mb04_log_quizs";

     /**
     * Campos que se pueden asignar masivamente (mass assignment).
     * 
     * Estos campos registran la información relevante de cada intento de quiz.
     * 
     * @var array
     */

	protected $fillable = [
        'id_user',               // ID del usuario que presentó el quiz.
        'id_quiz',               // ID del quiz que se presentó.
        'consecutivo_presen',    // Número de intento (por si el usuario puede presentar varias veces).
        'preguntas_correct',     // Número de preguntas que el usuario respondió correctamente.
        'resultado',             // Resultado general (puede ser porcentaje o calificación).
        'fecha_presentacion'     // Fecha y hora en que se presentó el quiz.
    ];
}
