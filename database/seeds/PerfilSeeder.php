<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \App\modelos\Perfil;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

    	Perfil::create(['perfil' => 'Super Administrador',]);
    	Perfil::create(['perfil' => 'Administrador',]);
    	Perfil::create(['perfil' => 'Corporativo',]);
    	Perfil::create(['perfil' => 'Universitario',]);
    	Perfil::create(['perfil' => 'Personal',]);
      
    }
}
