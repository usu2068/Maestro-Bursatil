<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * AppServiceProvider
 * 
 * Propósito:
 * - Es un proveedor de servicios de Laravel.
 * - Permite registrar servicios en el contenedor de la aplicación.
 * - Permite ejecutar lógica de inicialización durante el arranque de la aplicación.
 * 
 * Métodos:
 * - boot(): Se ejecuta después de que todos los demás servicios han sido registrados. Aquí se puede colocar lógica para inicializar configuraciones, extender clases, definir macros, etc.
 * - register(): Se utiliza para registrar bindings en el contenedor de servicios. Aquí se declaran servicios personalizados, singletons, o paquetes externos.
 * 
 * Actualmente, este proveedor no contiene lógica personalizada, sirve como plantilla base para ser extendido en el futuro.
 */

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(){

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
