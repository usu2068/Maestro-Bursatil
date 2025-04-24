<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class TemasOfSimulador extends Model{

    public $table = "mb04_temasOfSimulador";

    protected $fillable = [
        'id_simulador', 'id_tema', 'NoPreg',
    ];

    public function simulador(){

        return $this->belongsTo(Simulador::class, 'id_simulador');

    }

    public function tema(){

        //return $this->belongsTo(ContenidoSimu::class, 'id_contenido');
        return $this->hasOne(ContenidoSimu::class, 'id_contenido');

    }
}
