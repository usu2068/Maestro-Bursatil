<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('mb04_users', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('id_entidad');
            $table->foreign('id_entidad')->references('id')->on('mb04_entidad');

            $table->unsignedInteger('id_perfil');
            $table->foreign('id_perfil')->references('id')->on('mb04_perfil');
            
            $table->string('name');
            $table->string('email', '250')->unique();
            $table->string('cedula', '250')->unique();
            $table->string('password');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){

        Schema::dropIfExists('mb04_users');
    }
}
