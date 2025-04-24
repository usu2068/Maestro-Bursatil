<?php 

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mb04Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        // Creacion tabla de productos

        Schema::create('mb04_productos', function (Blueprint $table) {

            $table->increments('id');
            $table->string('nombre');
            $table->string('valor');
            $table->string('contenido');
            $table->string('descripcion');
            $table->string('entorno');
            $table->timestamps();
        });    

        // Creacion relacion productos X usuario

        Schema::create('mb04_products_of_users', function (Blueprint $table){

            $table->unsignedInteger('id_users');
            $table->foreign('id_users')->references('id')->on('mb04_users');

            $table->unsignedInteger('id_producto');
            $table->foreign('id_producto')->references('id')->on('mb04_productos');
        });

        // Creacion relacion de productos X factura

        Schema::create('mb04_shopCar', function (Blueprint $table){

            $table->unsignedInteger('id_factura');
            $table->foreign('id_factura')->references('id')->on('mb04_factura');

            $table->unsignedInteger('id_productos');
            $table->foreign('id_productos')->references('id')->on('mb04_productos');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){

        Schema::dropIfExists('mb04_productos');
        Schema::dropIfExists('mb04_products_of_users');
        Schema::dropIfExists('mb04_shopCar');
    }
}
