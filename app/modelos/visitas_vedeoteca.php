<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class visitas_vedeoteca extends Model{
    //
    public $table = "mb04_vidtk_visitas";

    protected $fillable = [
        'id_entidades', 'id_video', 'dir_ip', 'geo_x', 'geo_y', 'tiempo', 'created_at', 'updated_at', 
    ];

    public function entidad(){
    	return $this->belongsTo(entidades_sub_videoteca::class, 'id_entidades');
    }

    public function video(){
    	return $this->belongsTo(videos_vedeoteca::class, 'id_video');
    }
}
