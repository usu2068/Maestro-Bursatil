<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class Facturas extends Model{

	public $table = "mb04_factura";

    protected $fillable = [
        'id_user', 'ref_pay', 'products', 'total', 'time_licencia', 'estado_fac',
    ];

    public function users(){

        return $this->belongsTo(User::class, 'id_user');

    }
}
