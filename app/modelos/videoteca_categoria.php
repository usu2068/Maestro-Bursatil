<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class videoteca_categoria extends Model{
    //
	public $table = "mb04_vidtk_categorias";

    protected $fillable = [
        'nombre', 'descripcion', 'image', 'created_at', 'updated_at', 
    ];
}
