<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class Log_Quiz extends Model{
    //

    public $table = "mb04_log_quizs";

	protected $fillable = [
        'id_user', 'id_quiz', 'consecutivo_presen', 'preguntas_correct', 'resultado', 'fecha_presentacion'
    ];
}
