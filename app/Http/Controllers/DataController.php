<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Alergia;
use App\Vacuna;
use App\Medicamento;
use App\MotivoConsulta;
use App\Articulos;

class DataController extends Controller
{
    
    public function get_alergias(Request $request){
        $term = $request->get('term');

        $querys = Alergia::where('alergia', 'LIKE' ,'%' . $term . '%' )->get();

        return $querys;
    }

    public function save_new_alergia(Request $request){
        
        $alergia = Alergia::create([
            'alergia' => request()->otras_alergias
        ]);

        return $alergia;
    }

    public function get_vacunas(Request $request){
        $term = $request->get('term');

        $querys = Vacuna::where('vacuna', 'LIKE' ,'%' . $term . '%' )->get();

        return $querys;
    }

    public function save_new_vacuna(Request $request){
        
        $vacuna = Vacuna::create([
            'vacuna' => request()->otras_vacunas
        ]);

        return $vacuna;
    }

    public function get_medis(Request $request){
        $term = $request->get('term');

        $querys = Medicamento::where('medicamento', 'LIKE' ,'%' . $term . '%' )->get();

        return $querys;
    }

    public function save_new_medi(Request $request){
        
        $medi = Medicamento::create([
            'medicamento' => request()->otros_medis
        ]);

        return $medi;
    }

    public function get_motivo_consulta(Request $request){
        $term = $request->get('term');

        $querys = MotivoConsulta::where('motivo', 'LIKE' ,'%' . $term . '%' )->get();

        return $querys;
    }

    public function save_new_motivo(Request $request){
        
        $motivo = MotivoConsulta::create([
            'motivo' => request()->motivo
        ]);

        return $motivo;
    }

    public function save_new_articulo(Request $request){
        
        $articulo = Articulos::create([
            'articulo' => request()->articulo,
            'descripcion' => request()->descripcion,
            'clinica_id' => request()->clinica_id
        ]);

        return $articulo;
    }
}
