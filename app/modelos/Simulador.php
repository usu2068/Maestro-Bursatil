<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class Simulador extends Model{

    public $table = "mb04_simulador";

    protected $fillable = [
        'nombre', 'duracion',
    ];

    public function temsSimu(){

        return $this->belongsToMany('App\modelos\ContenidoSimu', 'mb04_temasOfSimulador', 'id_simulador', 'id_tema');
    }
}
