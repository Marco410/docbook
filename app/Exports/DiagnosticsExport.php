<?php

namespace App\Exports;

use App\ConsultaRapida;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DiagnosticsExport implements FromView
{
    protected $date_ini;

    function __construct($date_ini,$date_fin) {
           $this->date_ini = $date_ini;
           $this->date_fin = $date_fin;
    }

    public function view() : View
    {
        $fecha_ini = Date('Y-m-d', strtotime($this->date_ini));
        $fecha_fin = Date('Y-m-d', strtotime($this->date_fin."+ 1 days"));
        return view('exports.suive', [
            'consultaRs' => ConsultaRapida::whereBetween('created_at',[$fecha_ini,$fecha_fin])->get(),
            'fecha_ini' => $fecha_ini,
            'fecha_fin' => $this->date_fin
        ]);
    }
}
