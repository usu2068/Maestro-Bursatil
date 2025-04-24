<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \App\modelos\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run(){
        
        Producto::create([
        	'nombre'=>'Guía Operador Básico',
        	'valor' => '69600',
        	'contenido' => 'GUI;;1',
        	'descripcion' => 'Guia de preparacion para el examen ante el autorregulador del mercado de valores.',
        	'entorno' => '1',
        ]);

        Producto::create([
        	'nombre'=>'Simulador Operador Básico',
        	'valor' => '81200',
        	'contenido' => 'SIM;;1',
        	'descripcion' => 'Simulador del examen ante el autorregulador del mercado de valores.',
        	'entorno' => '2',
        ]);

        Producto::create([
        	'nombre'=>'Tutorial Operador Básico',
        	'valor' => '446600',
        	'contenido' => 'TUT;;1;;2;;3;;4;;5',
        	'descripcion' => 'Guia de preparacion para el examen ante el autorregulador del mercado de valores.',
        	'entorno' => '3', 
        ]);
    }
} 
