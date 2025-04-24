<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class videos_vedeoteca extends Model{

	public $table = "mb04_vidtk_video";

    protected $fillable = [
        'id_categoria', 'name', 'image', 'ubicacion', 'duracion', 'reproducciones', 'created_at', 'updated_at', 
    ];

    public function categoria(){
    	return $this->belongsTo(videoteca_categoria::class, 'id_categoria');
    }
    
}
