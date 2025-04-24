<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class LogAvanTuto extends Model{

    public $table = "mb04_log_uso_tutorial";

    protected $fillable = [
        'id_user', 'id_tutoria', 'tiempoEstudio', 'temasVistos', 
    ];

    public function usuarios(){

    	return $this->belongsTo(User::class, 'id_user');
	}

	public function tutoriales(){

		return $this->belongsTo(Tutorial::class, 'id_tutoria');
	}
}
