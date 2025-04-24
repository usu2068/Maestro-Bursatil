<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMb04EntidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mb04_entidad', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_tipo_ent');
            $table->foreign('id_tipo_ent')->references('id')->on('mb04_tipo_ent');
            $table->string('nombre');
            $table->string('nit')->unique();
            $table->string('dominio');
            $table->string('logo');
            $table->string('licencia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mb04_entidad');
    }
}
