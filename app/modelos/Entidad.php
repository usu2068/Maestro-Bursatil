<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

/**
 * Clase Entidad
 * 
 * Este modelo representa la tabla "mb04_entidad" en la base de datos.
 * 
 * Se utiliza para gestionar registros relacionados con entidades (por ejemplo: empresas, organizaciones, etc.).
 * 
 * Campos que se pueden asignar de forma masiva (fillable):
 * - id_tipo_ent : ID que indica el tipo de entidad (relacionado con la tabla de tipos de entidad)
 * - nombre      : Nombre de la entidad
 * - nit         : Número de Identificación Tributaria (o equivalente fiscal)
 * - dominio     : Dominio web asociado a la entidad
 * - logo        : URL o ruta al logo de la entidad
 * - licencia    : Información sobre la licencia asociada a la entidad
 * 
 * Relaciones definidas:
 * - TipoEntidad(): Relación de pertenencia (belongsTo) hacia la tabla de tipos de entidad.
 *                  Permite acceder al tipo asociado a cada entidad.
 * 
 * Comentado (no activo actualmente):
 * - usuarios(): Relación de uno-a-muchos (hasMany) hacia el modelo User (usuarios asociados a la entidad).
 */

class Entidad extends Model{

	/**
     * Nombre de la tabla asociada a este modelo.
     * 
     * @var string
     */

	public $table = "mb04_entidad";

	protected $fillable = [
        'id_tipo_ent', 'nombre', 'nit', 'dominio', 'logo', 'licencia', 
    ];

	/**
     * Relación: Una entidad pertenece a un tipo de entidad.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

	public function TipoEntidad(){

		return $this->belongsTo(EntidadTipo::class, 'id_tipo_ent');
	}

	/**
     * Relación comentada (no activa):
     * Una entidad podría tener muchos usuarios asociados.
     * 
     * Si se descomenta, permitirá obtener todos los usuarios relacionados con esta entidad.
     */
    /*
    public function usuarios()
    {
        return $this->hasMany(User::class);
    }
    */
	
	/*public function TipoEntidad(){

        return $this->belongsTo(EntidadTipo::class, 'id_tipo_ent');

    }

    public function usuarios(){

		return $this->hasMany(User::class);
	}*/
    
}
