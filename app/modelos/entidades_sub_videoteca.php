<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class entidades_sub_videoteca extends Model{
    //
    public $table = "mb04_vidtk_entidades_subs";

    protected $fillable = [
        'name', 'color', 'image', 'dominio', 'created_at', 'updated_at', 
    ];

}
