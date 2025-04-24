<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mb04Guia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('mb04_guia', function (Blueprint $table) {

            $table->increments('id');
            $table->string('nombre');
            $table->string('portada');
            $table->string('issu');
            $table->string('ibook');
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        
        Schema::dropIfExists('mb04_guia');
    }
}
