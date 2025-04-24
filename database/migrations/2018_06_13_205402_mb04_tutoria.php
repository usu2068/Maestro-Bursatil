<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mb04Tutoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('mb04_tutoria', function (Blueprint $table) {

            $table->increments('id');
            $table->string('nombre');
            $table->string('caracteristica');
            $table->timestamps();
        });    

        Schema::create('mb04_contenidoTuto', function (Blueprint $table){

            $table->increments('id');
            $table->string('nombre');
            $table->string('video');
            $table->string('presentacion');
            $table->string('duracion');
            $table->timestamps();
        }); 

        // Creacion relacion temas X tutoria

        Schema::create('mb04_temasOfTutoria', function (Blueprint $table){

            $table->unsignedInteger('id_tutoria');
            $table->foreign('id_tutoria')->references('id')->on('mb04_tutoria');

            $table->unsignedInteger('id_contenido');
            $table->foreign('id_contenido')->references('id')->on('mb04_contenidoTuto');

            $table->string('order');

        });

        Schema::create('mb04_log_uso_tutorial', function (Blueprint $table){

            $table->increments('id');

            $table->unsignedInteger('id_user');
            $table->foreign('id_user')->references('id')->on('mb04_users');

            $table->unsignedInteger('id_tutoria');
            $table->foreign('id_tutoria')->references('id')->on('mb04_tutoria');

            $table->string('tiempoEstudio');
            $table->string('temasVistos');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        
        Schema::dropIfExists('mb04_tutoria');
        Schema::dropIfExists('mb04_contenidoTuto');
        Schema::dropIfExists('mb04_temasOfTutoria');
        Schema::dropIfExists('mb04_log_uso_tutorial');
    }
}
