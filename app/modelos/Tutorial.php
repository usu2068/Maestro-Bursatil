<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model{
	
    public $table = "mb04_tutoria";

    protected $fillable = [
        'nombre', 'caracteristica'
    ];

    public function temsTuto(){

        return $this->belongsToMany('App\modelos\ContenidoTuto', 'mb04_temasOfTutoria', 'id_tutoria', 'id_contenido');
    }
}
