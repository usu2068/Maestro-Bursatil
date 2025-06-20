<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePasswordResetsTable
 *
 * Esta migración crea la tabla 'password_resets' en la base de datos.
 * 
 * La tabla se utiliza para almacenar los tokens de recuperación de contraseñas
 * que se generan cuando un usuario solicita restablecer su contraseña.
 * 
 * El token se envía por email al usuario, y este lo utiliza para poder
 * cambiar su contraseña de forma segura. 
 */

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     /**
     * Ejecuta la migración.
     *
     * Crea la tabla 'password_resets' con las siguientes columnas:
     * - email: El correo del usuario (indexado para búsquedas rápidas).
     * - token: El token generado para la recuperación de contraseña.
     * - created_at: La fecha y hora en que se creó el token.
     *
     * @return void
     */

    public function up(){
        Schema::create('password_resets', function (Blueprint $table) {
            // Campo 'email': almacena el correo electrónico del usuario
            // Se crea un índice para permitir búsquedas rápidas por email
            $table->string('email')->index();
            // Campo 'token': almacena el token que se envía al usuario
            $table->string('token');
            // Campo 'created_at': almacena la fecha y hora de creación
            // Puede ser null (nullable), ya que no siempre se requiere
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

     /**
     * Revierte la migración.
     *
     * 
     * Se usa cuando se hace un rollback de la migración:
     * php artisan migrate:rollback
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('password_resets');
    }
}
