<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mb04Simulador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('mb04_simulador', function (Blueprint $table) {

            $table->increments('id');
            $table->string('nombre');
            $table->string('duracion');
            $table->timestamps();
        }); 

        Schema::create('mb04_contenidoSimu', function (Blueprint $table) {

            $table->increments('id');
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('mb04_preguntas', function (Blueprint $table) {

            $table->increments('id');
            
            $table->unsignedInteger('id_tema');
            $table->foreign('id_tema')->references('id')->on('mb04_contenidoSimu');

            $table->string('pregunta');
            $table->string('r1');
            $table->string('r2');
            $table->string('r3');
            $table->string('r4');
            $table->string('correcta');
            $table->string('explicacion', '5000');
            $table->timestamps();
        });

        Schema::create('mb04_temasOfSimulador', function (Blueprint $table) {

            $table->unsignedInteger('id_simulador');
            $table->foreign('id_simulador')->references('id')->on('mb04_simulador');

            $table->unsignedInteger('id_tema');
            $table->foreign('id_tema')->references('id')->on('mb04_contenidoSimu');
        });

        Schema::create('mb04_log_uso_simulador', function (Blueprint $table) {

            $table->increments('id');
            
            $table->unsignedInteger('id_simulador');
            $table->foreign('id_simulador')->references('id')->on('mb04_simulador');

            $table->unsignedInteger('id_user');
            $table->foreign('id_user')->references('id')->on('mb04_users');            

            $table->string('efectividadTotal');
            $table->string('efectividadTema');
            $table->string('preguntasContestadas');
            $table->string('PreguntasCorrectas');
            $table->string('tiempo');
            $table->string('fechaPresentacion');
            $table->string('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        
        Schema::dropIfExists('mb04_simulador');
        Schema::dropIfExists('mb04_contenidoSimu');
        Schema::dropIfExists('mb04_preguntas');
        Schema::dropIfExists('mb04_temasOfSimulador');
    }
}
