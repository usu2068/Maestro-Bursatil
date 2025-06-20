<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo visitas_vedeoteca
 * 
 * Representa los registros de visitas a los videos de la videoteca.
 * 
 * Tabla: mb04_vidtk_visitas
 * 
 * Propósito:
 * - Registrar las visitas de las entidades a cada video.
 * - Almacena la IP, ubicación geográfica y duración de la visualización.
 * 
 * Atributos:
 * - id_entidades (foreign key) → Relacionado con la entidad que visualizó el video.
 * - id_video (foreign key) → Relacionado con el video visualizado.
 * - dir_ip (string) → Dirección IP desde donde se hizo la visita.
 * - geo_x (decimal) → Coordenada X (latitud o longitud).
 * - geo_y (decimal) → Coordenada Y (latitud o longitud).
 * - tiempo (integer) → Tiempo de visualización en segundos.
 * - created_at (timestamp)
 * - updated_at (timestamp)
 * 
 * Relaciones:
 * - entidad(): Relación belongsTo con entidades_sub_videoteca (quién vio el video).
 * - video(): Relación belongsTo con videos_vedeoteca (video visto).
 */

class visitas_vedeoteca extends Model{
    //
    /**
     * Nombre de la tabla en la base de datos.
     * 
     * @var string
     */

    public $table = "mb04_vidtk_visitas";

    /**
     * Campos que se pueden asignar de manera masiva (mass assignable).
     * 
     * @var array
     */

    protected $fillable = [
        'id_entidades', 'id_video', 'dir_ip', 'geo_x', 'geo_y', 'tiempo', 'created_at', 'updated_at', 
    ];

    /**
     * Relación con la entidad que realizó la visita.
     */

    public function entidad(){
    	return $this->belongsTo(entidades_sub_videoteca::class, 'id_entidades');
    }

    /**
     * Relación con el video que fue visualizado.
     */
    
    public function video(){
    	return $this->belongsTo(videos_vedeoteca::class, 'id_video');
    }
}
