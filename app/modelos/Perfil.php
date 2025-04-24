<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model{

	public $table = "mb04_perfil"; 

	public function usuarios(){

		return $this->hasMany(User::class);
	}
}
