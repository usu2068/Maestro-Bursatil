<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo TemasOfTutoria
 * 
 * Representa la relación entre un Tutorial y los Temas que lo componen.
 * 
 * Tabla: mb04_temasOfTutoria
 * 
 * Propósito:
 * - Permite organizar qué temas pertenecen a cada tutorial.
 * - Soporta la navegación por temas dentro de un tutorial.
 * 
 * Relaciones:
 * - Pertenece a Tutorial
 * - Pertenece a ContenidoTuto (tema)
 */

class TemasOfTutoria extends Model{

    /**
     * Nombre de la tabla en la base de datos.
     * 
     * @var string
     */

    public $table = "mb04_temasOfTutoria";

    /**
     * Relación: Este tema pertenece a un tutorial.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function tutoria(){

        return $this->belongsTo(Tutorial::class, 'id_tutoria');

    }

    /**
     * Relación: Tema asociado a esta relación.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    
    public function tema(){

        return $this->belongsTo(ContenidoTuto::class, 'id_contenido');

    }
}
