<?php
 
namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

/**
 * Clase LogAvanSimu
 * 
 * Este modelo representa la tabla "mb04_log_uso_simulador" en la base de datos.
 * 
 * Su propósito es registrar el uso que los usuarios hacen del simulador,
 * incluyendo métricas de efectividad, cantidad de preguntas respondidas y estado.
 * 
 * Es útil para el seguimiento del progreso, análisis de desempeño y control de actividad de los usuarios.
 */

class LogAvanSimu extends Model{
	
	/**
     * Nombre de la tabla asociada a este modelo.
     * 
     * @var string
     */

	public $table = "mb04_log_uso_simulador";

	/**
     * Campos que se pueden asignar masivamente (mass assignment).
     * 
     * @var array
     */
	
	protected $fillable = [
        'id_user',                // ID del usuario que usó el simulador.
        'id_simulador',           // ID del simulador utilizado.
        'efectividadTotal',       // Porcentaje de efectividad total en la sesión.
        'efectividadTema',        // Efectividad específica por tema.
        'preguntasContestadas',   // Número total de preguntas que el usuario contestó.
        'PreguntasCorrectas',     // Número de preguntas respondidas correctamente.
        'tiempo',                 // Tiempo total empleado en la sesión.
        'fechaPresentacion',      // Fecha y hora de la sesión del simulador.
        'estado'                  // Estado actual del registro (por ejemplo: completado, en progreso).
    ];

	/**
     * Relación: Un registro de uso de simulador pertenece a un usuario.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

	public function usuarios(){

		return $this->belongsTo(User::class, 'id_user');
	}

	/**
     * Relación: Un registro de uso de simulador pertenece a un simulador.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	
	public function simuladores(){

		return $this->belongsTo(Simulador::class, 'id_simulador');
	}



}


