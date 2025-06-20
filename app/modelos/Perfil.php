<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

/**
 * Clase Perfil
 * 
 * Este modelo representa la tabla "mb04_perfil" en la base de datos.
 * 
 * Su propósito es gestionar los perfiles o roles de los usuarios en el sistema.
 * 
 * A través de esta clase se puede definir qué tipo de perfil tiene cada usuario 
 * (por ejemplo: administrador, editor, estudiante, etc.).
 * 
 * Relaciones:
 * - Un perfil puede tener muchos usuarios asociados.
 */

class Perfil extends Model{

	/**
     * Nombre de la tabla asociada a este modelo.
     * 
     * @var string
     */

	public $table = "mb04_perfil"; 

	/**
     * Relación: Un perfil tiene muchos usuarios.
     * 
     * Esta relación permite obtener todos los usuarios que tienen asignado este perfil.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	
	public function usuarios(){

		return $this->hasMany(User::class);
	}
}
