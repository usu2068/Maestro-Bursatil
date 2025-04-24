<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mb04Factura extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up(){

        Schema::create('mb04_factura', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('id_user');
            $table->foreign('id_user')->references('id')->on('mb04_users');

            $table->unsignedInteger('total');
            $table->unsignedInteger('time_licencia');
            $table->string('estado_fac');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down(){

        Schema::dropIfExists('mb04_factura');
    }
}
