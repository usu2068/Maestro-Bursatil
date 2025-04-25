<?php

/**
 * Clase Kernel, corazón de la consola de Artisan en la aplicación laravel.
 * Artisan en la interfaz de linea de comandos que viene incluida con laravel y proporciona una serie de comandos utiles para el desarrollo de la aplicación.
 */

 /**decalra el espacio de nombres, se utilizan en php para organizar el codigo y evitar conflictos de nombres entre clases. */
namespace App\Console;

/**importa la clase schedule desde el espacio de nombres Illuminate\Console\Scheduling. la clase shedule es fundamental para definir tareas programadas (cron jobs). */
use Illuminate\Console\Scheduling\Schedule;

/**contiene la funcionalidad base que laravel utiliza para registrar y programar comandos artisan */
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     * Comandos artisan personalizados proporcionados por la aplicación
     *
     * @var array
     */
    protected $commands = [
        //se pueden registrar comandos personalizados en esta sección del codigo, por ejemplo
        //\App\Console\Commands\MiComandoPersonalizado::class,
    ];

    /**
     * Define the application's command schedule.
     * define la programacion de tareas de la aplicacion
     *
     * Este metodo se utiliza para registrar tareas programas que se ejecutaran automaticamente segun el cron configurado
     * 
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //ejemplo de tarea programa que ejecuta cada hora
        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the commands for the application.
     * registra los comandos de la apliacion
     * 
     * este metodo carga automaticamente todos los comandos personalizados ubicados en la carpeta
     * app\console\commands y tambien incluye las definiciones adicionales en routes/console.php.
     *
     * @return void
     */
    protected function commands()
    {
        //carga todos los comandos definidos en la carpeta commands
        $this->load(__DIR__.'/Commands');

        //carga el archivo de rutas para comandos de consola.
        require base_path('routes/console.php');
    }
}

/**NOTA:
 * kernel.php actua como un nucleo de la consola de comandos de artisan gestioando:
 * 1. El registro de comandos personalizados que crea el desarrollador para ser ejecutados desde la línea de comandos.
 * 2. La programación de tareas automáticas (cron jobs) mediante el componente Schedule, como enviar correos diarios, limpiar logs, hacer respaldos, etc.
 * 3. La carga de rutas de comandos adicionales definidas en el archivo routes/console.php.
 */