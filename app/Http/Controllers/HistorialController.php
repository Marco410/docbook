<?php

namespace App\Http\Controllers;

use App\Alergia;
use App\Vacuna;
use App\Paciente;
use App\Medicamento;
use App\Historial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HistorialController extends Controller
{
    //

    public function store_signos(){
        $datosSignos = request()->except("_token");
        $id = $datosSignos['paciente_id'];
        
        Historial::where('paciente_id','=',$id)->update($datosSignos);
        
        $paciente = Paciente::findOrFail($id);

        return redirect()->route('historial',$paciente)->with('storeS','Correcto');
    }

    public function store_notas_internas(){
        $datosNotas = request()->except("_token");
        $id = $datosNotas['paciente_id'];
        
        Historial::where('paciente_id','=',$id)->update($datosNotas);
        
        $paciente = Paciente::findOrFail($id);

        return redirect()->route('historial',$paciente)->with('storeN','Correcto');
    }

    public function store_alergias_option(){
        $id = request()->paciente_id;

        Historial::where('paciente_id','=',$id)->update([
            'alergias_option' => request()->alergias_option
        ]);

        return request();
    }

    public function store_alergias(){
         $id = request()->paciente_id;
        $paciente = Paciente::findOrFail($id);

        $alergias = explode(",",request()->alergias);

        $aleArray = [];

        foreach ($alergias as $alergia) {
            $ale = Alergia::findOrFail($alergia);
            array_push($aleArray, ["alergia" => $ale->alergia, 'id' => $ale->id]);
            $paciente->alergias()->save($ale);
        }

        return $aleArray;
    }
    public function destroy_alergias(){
        $paciente_id = request()->paciente_id;
        $alergia_id = request()->alergia_id;

        return DB::table('pacientes_has_alergias')->where('paciente_id', '=', $paciente_id)->where('alergia_id','=',$alergia_id)->delete();
  
        
    }

    public function store_patologicos(){
        $id = request()->paciente_id;
        $datosPato = request()->except(["_token",'paciente_id']);

        return Historial::where('paciente_id','=',$id)->update($datosPato);
    }

    public function store_npatologicos(){
        $id = request()->paciente_id;
        $datosNPato = request()->except(["_token",'paciente_id']);

        return Historial::where('paciente_id','=',$id)->update($datosNPato);
    }

    
    public function store_heredo(){
        $id = request()->paciente_id;
        $datosHeredo = request()->except(["_token",'paciente_id']);

        return Historial::where('paciente_id','=',$id)->update($datosHeredo);
    }

    public function store_esquema_vacuna(){
        $id = request()->paciente_id;
        $datosEsquemaVacuna = request()->except(["_token",'paciente_id']);

        return Historial::where('paciente_id','=',$id)->update($datosEsquemaVacuna);
    }

    public function store_gineco(){
        $id = request()->paciente_id;
        $datosGineco = request()->except(["_token",'paciente_id']);

        return Historial::where('paciente_id','=',$id)->update($datosGineco);
    }

    public function store_perinatal(){
        $id = request()->paciente_id;
        $datosPerinatal = request()->except(["_token",'paciente_id']);

        return Historial::where('paciente_id','=',$id)->update($datosPerinatal);
    }

    public function store_postnatal(){
        $id = request()->paciente_id;
        $datosPostnatal = request()->except(["_token",'paciente_id']);

        return Historial::where('paciente_id','=',$id)->update($datosPostnatal);
    }

    public function store_psiqui(){
        $id = request()->paciente_id;
        $datosPsiqui = request()->except(["_token",'paciente_id']);

        return Historial::where('paciente_id','=',$id)->update($datosPsiqui);
    }

    public function store_nutri(){
        $id = request()->paciente_id;
        $datosNutri = request()->except(["_token",'paciente_id']);

        return Historial::where('paciente_id','=',$id)->update($datosNutri);
    }

    public function store_notas_his(){
        $id = request()->paciente_id;
        $datosNotas = request()->except(["_token",'paciente_id']);

        return Historial::where('paciente_id','=',$id)->update($datosNotas);
    }

    public function store_vacunas(){
        $id = request()->paciente_id;
       $paciente = Paciente::findOrFail($id);

       $vacunas = explode(",",request()->vacunas);

       $vacunaArray = [];

       foreach ($vacunas as $vacuna) {
           $vacuna = Vacuna::findOrFail($vacuna);
           array_push($vacunaArray, ["vacuna" => $vacuna->vacuna, 'id' => $vacuna->id]);
           $paciente->vacunas()->save($vacuna);
       }

       return $vacunaArray;
    }

    public function destroy_vacunas(){
       $paciente_id = request()->paciente_id;
       $vacuna_id = request()->vacuna_id;

       return DB::table('pacientes_has_vacunas')->where('paciente_id', '=', $paciente_id)->where('vacuna_id','=',$vacuna_id)->delete();
 
       
    }

    public function store_medis(){
        $id = request()->paciente_id;
       $paciente = Paciente::findOrFail($id);

       $medis = explode(",",request()->medis);

       $mediArray = [];

       foreach ($medis as $medi) {
           $medi = Medicamento::findOrFail($medi);
           array_push($mediArray, ["medi" => $medi->medicamento, 'id' => $medi->id]);
           $paciente->medis()->save($medi);
       }

       return $mediArray;
    }

    public function destroy_medis(){
       $paciente_id = request()->paciente_id;
       $medi_id = request()->medi_id;

       return DB::table('pacientes_has_medis')->where('paciente_id', '=', $paciente_id)->where('medicamento_id','=',$medi_id)->delete();
 
       
    }
}
