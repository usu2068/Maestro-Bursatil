<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

/**
 * RouteServiceProvider
 * 
 * Propósito:
 * - Proveedor de servicios que define cómo se cargan y organizan las rutas de la aplicación.
 * - Establece el namespace por defecto para los controladores.
 * - Mapea los archivos de rutas (web y API) a la configuración de la aplicación.
 * 
 * Atributos:
 * - protected $namespace: 
 *   - Define el espacio de nombres que se aplica a las rutas de los controladores.
 *   - También se utiliza como el namespace raíz del generador de URLs.
 * 
 * Métodos:
 * - boot(): 
 *   - Método que se ejecuta durante el arranque de la aplicación.
 *   - Puede usarse para definir patrones globales, filtros de rutas, o binding de modelos.
 *   - Aquí llama a parent::boot() para conservar la funcionalidad base.
 * 
 * - map(): 
 *   - Método que registra los grupos de rutas que serán utilizados en la aplicación.
 *   - Llama a mapApiRoutes() y mapWebRoutes() para registrar las rutas correspondientes.
 * 
 * - mapWebRoutes(): 
 *   - Define las rutas del grupo "web" (reciben estado de sesión, protección CSRF, etc.).
 *   - Aplica el middleware 'web' y asocia el namespace definido.
 *   - Carga las rutas definidas en routes/web.php.
 * 
 * - mapApiRoutes(): 
 *   - Define las rutas del grupo "api" (normalmente stateless).
 *   - Aplica el middleware 'api', con prefijo 'api' en la URL.
 *   - Carga las rutas definidas en routes/api.php.
 * 
 * Notas:
 * - Este proveedor permite separar claramente las rutas API y las rutas web.
 * - Facilita la configuración centralizada de las rutas en la aplicación.
 */

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */

     /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */

    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
