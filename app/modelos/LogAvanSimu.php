<?php
 
namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class LogAvanSimu extends Model{
	
	public $table = "mb04_log_uso_simulador";

	protected $fillable = [
        'id_user', 'id_simulador', 'efectividadTotal', 'efectividadTema', 'preguntasContestadas', 'PreguntasCorrectas', 'tiempo', 'fechaPresentacion', 'estado'
    ];

	public function usuarios(){

		return $this->belongsTo(User::class, 'id_user');
	}

	public function simuladores(){

		return $this->belongsTo(Simulador::class, 'id_simulador');
	}



}


