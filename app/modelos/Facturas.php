<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

/**
 * Clase Facturas
 * 
 * Este modelo representa la tabla "mb04_factura" en la base de datos.
 * 
 * Su función es gestionar las facturas generadas en el sistema.
 * 
 * Cada factura incluye información sobre:
 *  - El usuario que la generó.
 *  - El número de referencia de pago.
 *  - Los productos asociados.
 *  - El valor total de la factura.
 *  - El tiempo de la licencia comprada.
 *  - El estado actual de la factura (pendiente, pagada, cancelada, etc).
 */

class Facturas extends Model{

    /**
     * Nombre de la tabla asociada a este modelo.
     * 
     * @var string
     */

	public $table = "mb04_factura";

    /**
     * Campos que se pueden asignar masivamente (mass assignment).
     * 
     * Estos campos se pueden rellenar automáticamente al crear o actualizar una factura.
     * 
     * @var array
     */

    protected $fillable = [
        'id_user',         // ID del usuario que realizó la factura.
        'ref_pay',         // Referencia de pago.
        'products',        // Productos incluidos en la factura.
        'total',           // Total en valor monetario de la factura.
        'time_licencia',   // Tiempo de licencia asociado a la compra.
        'estado_fac',      // Estado de la factura (ejemplo: pagada, pendiente, cancelada).
    ];

    /**
     * Relación: Cada factura pertenece a un usuario.
     * 
     * Define la relación entre la factura y el usuario (tabla users).
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    
    public function users(){

        return $this->belongsTo(User::class, 'id_user');

    }
}
