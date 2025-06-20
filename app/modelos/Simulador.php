<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

/**
 * Clase Simulador
 * 
 * Este modelo representa la tabla "mb04_simulador" en la base de datos.
 * 
 * Su propósito es almacenar la información de los simuladores de estudio,
 * que permiten a los usuarios realizar simulaciones con preguntas para practicar.
 * 
 * Atributos:
 * - nombre: Nombre del simulador.
 * - duracion: Duración total del simulador (posiblemente en minutos).
 * 
 * Relaciones:
 * - temsSimu(): Define una relación de muchos a muchos con el modelo ContenidoSimu.
 *   Un simulador puede estar compuesto por múltiples temas.
 * 
 * La relación usa la tabla intermedia "mb04_temasOfSimulador", que enlaza simuladores con temas.
 */

class Simulador extends Model{

    /**
     * Nombre de la tabla asociada a este modelo.
     * 
     * @var string
     */

    public $table = "mb04_simulador";

    /**
     * Atributos que se pueden asignar de forma masiva.
     * 
     * @var array
     */

    protected $fillable = [
        'nombre', 'duracion',
    ];

    /**
     * Relación: Temas asociados al simulador.
     * 
     * Un simulador puede incluir varios temas (ContenidoSimu), definidos en la tabla intermedia.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    
    public function temsSimu(){

        return $this->belongsToMany('App\modelos\ContenidoSimu', 'mb04_temasOfSimulador', 'id_simulador', 'id_tema');
    }
}
