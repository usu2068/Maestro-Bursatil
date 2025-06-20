<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

/**
 * Clase TemasOfSimulador
 * 
 * Este modelo representa la tabla intermedia "mb04_temasOfSimulador",
 * que relaciona los simuladores con los temas que contiene cada simulador.
 * 
 * Es un modelo típico para gestionar relaciones muchos a muchos, con un campo adicional:
 * 
 * Atributos:
 * - id_simulador: ID del simulador al que pertenece este tema.
 * - id_tema: ID del tema (ContenidoSimu) asociado.
 * - NoPreg: Número de preguntas que se tomarán de este tema para el simulador.
 * 
 * Relaciones:
 * - simulador(): Relación inversa hacia el simulador (Simulador).
 * - tema(): Relación hacia el tema de contenido (ContenidoSimu).
 * 
 * Nota: aunque la relación a tema se implementa con "hasOne", 
 * normalmente en relaciones intermedias sería más común usar "belongsTo" (como tienes comentado).
 */

class TemasOfSimulador extends Model{

    /**
     * Nombre de la tabla asociada a este modelo.
     * 
     * @var string
     */

    public $table = "mb04_temasOfSimulador";

    /**
     * Atributos que se pueden asignar de forma masiva.
     * 
     * @var array
     */

    protected $fillable = [
        'id_simulador', 'id_tema', 'NoPreg',
    ];

    /**
     * Relación: Simulador al que pertenece este tema.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function simulador(){

        return $this->belongsTo(Simulador::class, 'id_simulador');

    }

    /**
     * Relación: Tema asociado a este registro.
     * 
     * Actualmente definido como "hasOne", aunque "belongsTo" también sería válido.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    
    public function tema(){

        //return $this->belongsTo(ContenidoSimu::class, 'id_contenido');
        return $this->hasOne(ContenidoSimu::class, 'id_contenido');

    }
}
