<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;
	

class Quiz extends Model{
    //
	public $table = "mb04_quizs";

    protected $fillable = [
        'name', 'num_pregs',
    ];

}
