<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class PreguntasQuiz extends Model{
    //
    public $table = "mb04_preguntas_quizs";

    protected $fillable = [
        'id_quizs', 'pregunta', 'r1', 'r2', 'r3', 'r4', 'correcta',
    ];

    public function quiz(){

		return $this->belongsTo(Quiz::class, 'id_quizs');
	}
}
