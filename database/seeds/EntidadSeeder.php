<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \App\modelos\Entidad;
use \App\modelos\EntidadTipo;

class EntidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
       
       /*
			- Se crea los tipos de entidad que vamos a tener en la plataforma
        */

		EntidadTipo::create(['type'=>'UNI', 'permisos' => '{}', ]);
		EntidadTipo::create(['type'=>'ENT', 'permisos' => '{}', ]);
		EntidadTipo::create(['type'=>'ADMB', 'permisos' => '{}', ]);
		EntidadTipo::create(['type'=>'ADMU', 'permisos' => '{}', ]);


        $id_tipo_ent = EntidadTipo::where(['type' => 'ADMU'])->value('id');

        //dd($id_tipo_ent->id);

        Entidad::create([
        	'id_tipo_ent' => $id_tipo_ent,
        	'nombre' => 'Ustariz & Abgogados',
        	'nit' => '900054586',
        	'dominio' => 'ustarizabogados.com',
        	'logo' => 'log.jpg',
        	'licencia' => 'NA',
        ]);

    }
}
