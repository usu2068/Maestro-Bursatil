<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

/**
 * Clase entidades_sub_videoteca
 * 
 * Este modelo representa la tabla "mb04_vidtk_entidades_subs" en la base de datos.
 * 
 * Se utiliza para gestionar las suscripciones o registros relacionados con entidades dentro del módulo de Videoteca.
 * 
 * Campos que se pueden asignar de forma masiva (fillable):
 * - name        : Nombre de la suscripción o categoría de la videoteca.
 * - color       : Código de color asociado (probablemente para identificar visualmente la categoría o grupo).
 * - image       : URL o ruta de la imagen asociada.
 * - dominio     : Dominio web relacionado con esta suscripción o entidad.
 * - created_at  : Fecha de creación del registro (campo timestamp).
 * - updated_at  : Fecha de última actualización del registro (campo timestamp).
 */

class entidades_sub_videoteca extends Model{
    //

    /**
     * Nombre de la tabla asociada a este modelo.
     * 
     * @var string
     */

    public $table = "mb04_vidtk_entidades_subs";

    /**
     * Campos que se pueden asignar en masa (cuando se crean o actualizan registros).
     * 
     * @var array
     */
    
    protected $fillable = [
        'name', 'color', 'image', 'dominio', 'created_at', 'updated_at', 
    ];

}
