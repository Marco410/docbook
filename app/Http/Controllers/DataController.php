<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Alergia;
use App\Caja;
use App\Vacuna;
use App\Medicamento;
use App\MotivoConsulta;
use App\Articulos;
use App\Diagnostic;
use App\Estudios;
use Auth;


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
        $espe_id = $request->get('espe_id');

        $querys = MotivoConsulta::where('motivo', 'LIKE' ,'%' . $term . '%' )->where('especialidad_id',$espe_id)->get();

        return $querys;
    }

    public function save_new_motivo(Request $request){
        
        $motivo = MotivoConsulta::create([
            'especialidad_id' => request()->especialidad,
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
    public function save_new_estudio(Request $request){
        
        $estudio = Estudios::create([
            'estudio' => request()->estudio
        ]);

        return $estudio;
    }

    public function get_diagnostics(){
        $d = Diagnostic::all();

        $array["data"]=$d;
                
         echo json_encode($array);
    }

    public function get_articulos(){
        $a = Articulos::where('clinica_id', $_GET['user'])->get();
        $array["data"]=$a;     
        echo json_encode($array);
    }

    public function get_estudios(){
        $e = Estudios::all();
        $array["data"]=$e;     
        echo json_encode($array);
    }

    public function get_cajas(){
        $e = Caja::where("doctor_id",$_GET['user'])->where("clinica_id",$_GET['clinic'])->get();
        $array["data"]=$e;     
        echo json_encode($array);
    }


}
