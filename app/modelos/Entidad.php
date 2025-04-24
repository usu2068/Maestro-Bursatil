<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class Entidad extends Model{

	public $table = "mb04_entidad";

	protected $fillable = [
        'id_tipo_ent', 'nombre', 'nit', 'dominio', 'logo', 'licencia', 
    ];

	public function TipoEntidad(){

		return $this->belongsTo(EntidadTipo::class, 'id_tipo_ent');
	}

	/*public function TipoEntidad(){

        return $this->belongsTo(EntidadTipo::class, 'id_tipo_ent');

    }

    public function usuarios(){

		return $this->hasMany(User::class);
	}*/
    
}
