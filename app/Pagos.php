<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    protected $fillable = [
        'observaciones','importe','descripcion','clinica_id','doctor_id','tipo_movimiento','metodo_pago','caja_id','cerrado'
    ];
}
