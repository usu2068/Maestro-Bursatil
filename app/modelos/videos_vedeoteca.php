<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo videos_vedeoteca
 * 
 * Representa un video dentro de la videoteca.
 * 
 * Tabla: mb04_vidtk_video
 * 
 * Propósito:
 * - Definir las propiedades y relaciones de los videos de la videoteca.
 * 
 * Atributos:
 * - id_categoria (int)
 * - name (string)
 * - image (string)
 * - ubicacion (string) → Ubicación física o URL del video.
 * - duracion (string) → Duración del video (por ejemplo, en minutos o formato HH:MM:SS).
 * - reproducciones (int) → Número de veces que se ha reproducido el video.
 * - created_at (timestamp)
 * - updated_at (timestamp)
 * 
 * Relaciones:
 * - Pertenece a una categoría de videoteca.
 */

class videos_vedeoteca extends Model{

    /**
     * Nombre de la tabla en la base de datos.
     * 
     * @var string
     */

	public $table = "mb04_vidtk_video";

    /**
     * Campos que se pueden asignar de manera masiva (mass assignable).
     * 
     * @var array
     */

    protected $fillable = [
        'id_categoria', 'name', 'image', 'ubicacion', 'duracion', 'reproducciones', 'created_at', 'updated_at', 
    ];

    /**
     * Relación: El video pertenece a una categoría de videoteca.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    
    public function categoria(){
    	return $this->belongsTo(videoteca_categoria::class, 'id_categoria');
    }
    
}
