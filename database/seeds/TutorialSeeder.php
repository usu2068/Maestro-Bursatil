<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use \App\modelos\Tutorial;
use \App\modelos\ContenidoTuto;
use \App\modelos\TemasOfTutoria;

class TutorialSeeder extends Seeder{

    /**
     * Run the database seeds.
     *
     * @return void
    */

    public function run(){

    	Tutorial::create([
        	'nombre'=>'Marco Regulatorio',
        	'caracteristica' => 'segmento',
        ]);

        Tutorial::create([
        	'nombre'=>'Operador Básico',
        	'caracteristica' => 'completo',
        ]);

        ContenidoTuto::create([
        	'nombre'=>'1.1. Valor',
        	'video'=>'264070417',
        	'presentacion'=>'60097152',
        	'duracion'=>'08:24',
        ]);
        
        ContenidoTuto::create([
        	'nombre'=>'1.2 Actividades del mercado de valores',
        	'video'=>'264070451',
        	'presentacion'=>'60097135',
        	'duracion'=>'19:20',
        ]);
    }
}
