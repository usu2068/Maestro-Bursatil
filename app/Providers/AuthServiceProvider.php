<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

/**
 * AuthServiceProvider
 * 
 * Propósito:
 * - Proveedor de servicios encargado de registrar las políticas de autorización.
 * - Define las reglas de autorización y vincula modelos con sus respectivas políticas.
 * 
 * Propiedades:
 * - $policies: Array que mapea modelos de la aplicación a sus correspondientes políticas.
 *   Ejemplo: 'App\Model' => 'App\Policies\ModelPolicy'
 * 
 * Métodos:
 * - boot(): Método que se ejecuta durante el arranque de la aplicación. Llama a registerPolicies() para registrar las políticas definidas en $policies.
 * 
 * Notas:
 * - Aquí también se pueden definir manualmente Gates (puertas) personalizadas, usando Gate::define().
 * - Actualmente no contiene lógica personalizada, pero sirve como punto central para manejar permisos y políticas.
 */

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     * Mapea modelos a sus políticas de autorización.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *se registran las políticas y se pueden definir Gates personalizadas.
     * @return void
     */
    public function boot()
    {
        // Registra las políticas definidas en $policies
        $this->registerPolicies();

        // Aquí se podrían definir Gates personalizadas si es necesario
        // Ejemplo:
        // Gate::define('edit-posts', function ($user) {
        //     return $user->isAdmin();
        // });

        //
    }
}
