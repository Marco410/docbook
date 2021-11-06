<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    protected $fillable = [
        'observaciones','importe','descripcion','clinica_id','doctor_id','paciente_id','tipo_movimiento','metodo_pago','caja_id','cerrado','razon_social','rfc','domicilio','email','is_factura'
    ];
}
