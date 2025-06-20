<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \App\modelos\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        $id_perfil = DB::table('mb04_perfil')
    		-> where(['perfil'=>'Super Administrador', ]) 
    		-> value('id');

    	$id_entidad = DB::table('mb04_entidad')
    		-> where(['id'=>'1',]) 
    		-> value('id');

        User::create([
            'id_entidad' => $id_entidad,
            'id_perfil' => $id_perfil,
            'name' => 'Carlos Aguirre',
            'email' => 'carlos.aguirre@ustarizabogados.com',
            'cedula' => '555555',
            'password' => bcrypt('1234567890'),
        ]);
    }
}

