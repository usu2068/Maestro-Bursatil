<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class ContenidoSimu extends Model{

    public $table = "mb04_contenidoSimu";

    protected $fillable = [
        'nombre', 'BasiEspe',
    ];

    public function temsSimu(){

        return $this->belongsToMany('App\modelos\ContenidoSimu', 'mb04_temasOfSimulador', 'id_simulador', 'id_tema');
    }
}
