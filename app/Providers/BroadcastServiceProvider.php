<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

/**
 * BroadcastServiceProvider
 * 
 * Propósito:
 * - Proveedor de servicios que habilita las rutas de broadcasting (transmisión en tiempo real).
 * - Se encarga de cargar las definiciones de los canales de broadcasting de la aplicación.
 * 
 * Métodos:
 * - boot(): Método que se ejecuta durante el arranque de la aplicación.
 *   - Llama a Broadcast::routes() para registrar las rutas necesarias para broadcasting.
 *   - Incluye el archivo routes/channels.php, donde se definen los canales autorizados.
 * 
 * Notas:
 * - El broadcasting permite enviar eventos del servidor a los clientes en tiempo real, por ejemplo con WebSockets.
 * - Es comúnmente usado con librerías como Laravel Echo o Pusher.
 * - Las rutas de broadcasting son necesarias para autenticar los canales privados o de presencia.
 */

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

     /**
     * Bootstrap any application services.
     *
     * Registra las rutas de broadcasting y carga las definiciones de canales.
     *
     * @return void
     */

    public function boot()
    {
        // Registra las rutas necesarias para broadcasting (por ejemplo /broadcasting/auth)
        Broadcast::routes();

        // Carga las definiciones de los canales en routes/channels.php
        require base_path('routes/channels.php');
    }
}
