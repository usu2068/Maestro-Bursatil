<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

/**
 * Clase contenido Tuto
 * Esta clase representa la tabla "mb04_contenidoTuto" en la base de datos.
 * 
 * Es un modelo de Eloquent (ORM de Laravel), que permite interactuar con los registros
 * de esta tabla como si fueran objetos de PHP.
 * 
 * Cada instancia de esta clase corresponde a un registro (fila) de la tabla.
 * 
 */
class ContenidoTuto extends Model{

    /**
     * Nombre de la tabla asociada en la base de datos.
     * 
     * Laravel por defecto intenta usar el nombre de la clase en minúsculas y pluralizado como nombre de la tabla,
     * pero aquí se indica explícitamente que la tabla es "mb04_contenidoTuto".
     *
     * @var string
     */

	public $table = "mb04_contenidoTuto";

    /**
     * Relación de muchos a muchos (belongsToMany) con la propia tabla ContenidoTuto.
     * 
     * Esto significa que una "tutoria" (ContenidoTuto) puede estar asociada a múltiples "temas de tutoría",
     * y un tema de tutoría puede pertenecer a múltiples tutorías.
     * 
     * La tabla intermedia que gestiona esta relación es "mb04_temasOfTutoria", que contiene los campos:
     * - id_tutoria (referencia al id de esta tabla)
     * - id_contenido (referencia a otro contenido relacionado)
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

	public function temsTuto(){

        return $this->belongsToMany('App\modelos\ContenidoTuto', 'mb04_temasOfTutoria', 'id_tutoria', 'id_contenido');
    }

}

/**
 * NOTA:
 * 
 * Declara un modelo llamado ContenidoTuto que representa la tabla mb04_contenidoTuto.
 * Define una relación de muchos a muchos consigo misma (auto-relación), para representar que las tutorías pueden tener varios temas, y los temas pueden estar en varias tutorías.
 * La tabla intermedia es mb04_temasOfTutoria.
 */
