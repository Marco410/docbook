<?php

namespace App\Http\Controllers;

use App\Pagos;
use App\Caja;
use Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CajasController extends Controller
{
    public function close_caja_check(){
            
        $caja_id = request()->caja;
        $fecha = request()->fecha;
        $clinica_id = request()->clinica;
        $doctor_id = request()->doctor;
        $apertura = request()->apertura;

        $entradas = Pagos::whereDate('created_at',Date($fecha))->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("tipo_movimiento","Entrada")->where("cerrado","0")->sum("importe");

        $salidas = Pagos::whereDate('created_at',Date($fecha))->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("tipo_movimiento","Salida")->where("cerrado","0")->sum("importe");

        $efectivo = Pagos::whereDate('created_at',Date($fecha))->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("tipo_movimiento","Entrada")->where("metodo_pago","Efectivo")->where("cerrado","0")->sum("importe");

        $tarjeta = Pagos::whereDate('created_at',Date($fecha))->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("tipo_movimiento","Entrada")->where("metodo_pago","Tarjeta")->where("cerrado","0")->sum("importe");

        $trans = Pagos::whereDate('created_at',Date($fecha))->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("tipo_movimiento","Entrada")->where("metodo_pago","Transferencia")->where("cerrado","0")->sum("importe");

        $efectivoS = Pagos::whereDate('created_at',Date($fecha))->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("tipo_movimiento","Salida")->where("metodo_pago","Efectivo")->where("cerrado","0")->sum("importe");

        $tarjetaS = Pagos::whereDate('created_at',Date($fecha))->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("tipo_movimiento","Salida")->where("metodo_pago","Tarjeta")->where("cerrado","0")->sum("importe");

        $transS = Pagos::whereDate('created_at',Date($fecha))->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("tipo_movimiento","Salida")->where("metodo_pago","Transferencia")->where("cerrado","0")->sum("importe");

        $total = ($apertura + $entradas) - $salidas;

        $caja = Caja::where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("abierta","1")->update([
            "entradas" => $entradas,
            "salidas" => $salidas,
            "ventas_efectivo" => $efectivo,
            "ventas_tarjeta" => $tarjeta,
            "ventas_transferencia" => $trans,
            "salidas_efectivo" => $efectivoS,
            "salidas_tarjeta" => $tarjetaS,
            "salidas_transferencia" => $transS,
            "total" => $total,
            "abierta" => 0
        ]);

        $pagos = Pagos::where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("cerrado","0")->update([
            "cerrado" => 1,
            "caja_id" => $caja_id
        ]);

        $request = [
            'cerrada' => "true"
        ];

        return request();
    }
}
