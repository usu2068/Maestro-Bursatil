<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class Preguntas extends Model{
	
    public $table = "mb04_preguntas"; 

    protected $fillable = [
        'id_tema', 'pregunta', 'r1', 'r2', 'r3', 'r4', 'correcta', 'explicacion', 
    ];

    public function tema(){

        return $this->belongsTo(ContenidoSimu::class, 'id_tema');

    }
}
