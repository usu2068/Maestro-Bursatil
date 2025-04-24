<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class TemasOfTutoria extends Model{

    public $table = "mb04_temasOfTutoria";

    public function tutoria(){

        return $this->belongsTo(Tutorial::class, 'id_tutoria');

    }

    public function tema(){

        return $this->belongsTo(ContenidoTuto::class, 'id_contenido');

    }
}
