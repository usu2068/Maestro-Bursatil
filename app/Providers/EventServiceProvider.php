<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * EventServiceProvider
 * 
 * Propósito:
 * - Proveedor de servicios que registra los eventos y listeners de la aplicación.
 * - Define el "mapeo" entre eventos que ocurren en la aplicación y los listeners que deben ejecutarse en respuesta.
 * 
 * Atributos:
 * - protected $listen: 
 *   - Array que relaciona eventos con sus listeners.
 *   - Ejemplo: cuando se dispara 'App\Events\Event', se ejecuta 'App\Listeners\EventListener'.
 * 
 * Métodos:
 * - boot(): Método que se ejecuta en el arranque de la aplicación.
 *   - Llama a parent::boot() para registrar las definiciones.
 * 
 * Notas:
 * - Este sistema permite desacoplar el código: los eventos notifican que algo ha sucedido y los listeners reaccionan.
 * - Muy útil para enviar correos, notificaciones, auditorías, log, u otras acciones posteriores a un evento.
 * - Es parte del patrón Observer.
 */

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *Relaciona los eventos de la aplicación con los listeners que deben ejecutarse.
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any events for your application.
     *Se ejecuta durante el arranque de la aplicación.
     * @return void
     */
    public function boot()
    {
        // Llama al boot() de la clase padre para registrar los eventos y listeners definidos
        parent::boot();

        // Puedes agregar lógica personalizada aquí si es necesario

        //
    }
}
