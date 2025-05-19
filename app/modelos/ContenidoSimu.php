<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo ContenidoSimu
 * 
 * Representa la tabla `mb04_contenidoSimu` en la base de datos y define
 * sus relaciones y atributos configurables.
 */

class ContenidoSimu extends Model{

    /**
     * Nombre de la tabla asociada a este modelo.
     *
     * @var string
     */

    public $table = "mb04_contenidoSimu";

    /**
     * Atributos que se pueden asignar de forma masiva (mass assignment).
     *
     * @var array
     */

    protected $fillable = [
        'nombre', //nombre del contenido del simulador
        'BasiEspe', //tipo: basico o especifico
    ];

    /**
     * Relación muchos a muchos con otros temas del simulador.
     *
     * Este método define la relación con la tabla intermedia `mb04_temasOfSimulador`,
     * que conecta contenidos del simulador con temas específicos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function temsSimu(){

        return $this->belongsToMany(
            'App\modelos\ContenidoSimu', //modelo relacionado
            'mb04_temasOfSimulador',  //tabla pivote
            'id_simulador',  //clave foranea del modelo actual en la tabla pivote
            'id_tema'); //clave foranea del modelo relacionado
    }
}
