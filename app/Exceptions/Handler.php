<?php

//Define el espacio de nombres al que pernetece la clase
//App\Exceptions es el directorio predeterminado donde laravel coloca clases relacionadas con el manejo de excepciones
namespace App\Exceptions;

//importa la clase base exception de php
use Exception;

//importa la clase exceptionhandler de laravel, que contiene la logica predeterminada para el manejo de excepciones
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

/**
 * Clase handler
 * 
 * Esta clase maneja todas las excepciones no capturadas que ocurren en la aplicacion
 * Extiene la funcionalidad de laravel para permitir personalizacion del registro (loggin),
 * reporte y renderizado de errores.
 */
class Handler extends ExceptionHandler
{
    /**
     * Lista de tipos de excepciones que no deben ser reportadas (enviadas a logs o sistemas de monitoreo).
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //Aquí se pueden agregar clases de excepciones específicas que no se deben reportar.
    ];

    /**
     * Lista de campos del formulario que nunca deben ser enviados de vuelta al usuario
     * si ocurre una excepción de validación. Protege datos sensibles.
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',    // No mostrar el campo de contraseña.
        'password_confirmation', //Ni la confirmación de la contraseña.
    ];

    /**
     * Reportar o registrar una excepción.
     * 
     * Aquí se puede enviar la excepción a servicios externos como Sentry, Bugsnag, etc.
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        //Utiliza el comportamiento predeterminado de Laravel
        parent::report($exception);
    }

    /**
     * Renderiza una excepción en una respuesta HTTP.
     * 
     * Convierte la excepción en una respuesta adecuada para mostrar al usuario.
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // Utiliza la lógica predeterminada de Laravel.
        return parent::render($request, $exception);
    }
}
