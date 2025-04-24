<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class ContenidoTuto extends Model{

	public $table = "mb04_contenidoTuto";

	public function temsTuto(){

        return $this->belongsToMany('App\modelos\ContenidoTuto', 'mb04_temasOfTutoria', 'id_tutoria', 'id_contenido');
    }

}
