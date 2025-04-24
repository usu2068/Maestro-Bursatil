<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class Guia extends Model{
	
    public $table = "mb04_guia";

    protected $fillable = [
        'nombre', 'portada', 'issu', 'ibook', 
    ];
}
