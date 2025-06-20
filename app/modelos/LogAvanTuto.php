<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

/**
 * Clase LogAvanTuto
 * 
 * Este modelo representa la tabla "mb04_log_uso_tutorial" en la base de datos.
 * 
 * Su propósito es registrar el uso que los usuarios hacen de los tutoriales,
 * incluyendo tiempo dedicado, temas visualizados y la relación con el usuario y el tutorial.
 * 
 * Es útil para el seguimiento del progreso de aprendizaje, análisis de actividad y reportes.
 */

class LogAvanTuto extends Model{

    /**
     * Nombre de la tabla asociada a este modelo.
     * 
     * @var string
     */
    public $table = "mb04_log_uso_tutorial";

    /**
     * Campos que se pueden asignar masivamente (mass assignment).
     * 
     * @var array
     */
    protected $fillable = [
        'id_user',         // ID del usuario que utilizó el tutorial.
        'id_tutoria',      // ID del tutorial utilizado.
        'tiempoEstudio',   // Tiempo total de estudio en el tutorial (minutos/horas).
        'temasVistos',     // Temas que el usuario ha visto o completado (puede ser un texto o json). 
    ];

    /**
     * Relación: Un registro de uso de tutorial pertenece a un usuario.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function usuarios(){

    	return $this->belongsTo(User::class, 'id_user');
	}

    /**
     * Relación: Un registro de uso de tutorial pertenece a un tutorial.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	public function tutoriales(){

		return $this->belongsTo(Tutorial::class, 'id_tutoria');
	}
}
