<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Doctor;
use App\Clinica;
use App\Paciente;
use App\Diagnostic;
use App\Especialidad;


class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function doctor_list(){

         $doctors = DB::table('doctors')
            
            ->join('doctor_has_especialidad', 'doctors.id', '=', 'doctor_has_especialidad.doctor_id')
            ->join('especialidads', 'doctor_has_especialidad.especialidad_id', '=', 'especialidads.id')
            ->select('doctors.id','doctors.nombre','doctors.apellido_p','doctors.created_at','doctors.status','doctors.foto','especialidads.nombre as espe')
            ->get();

        $doctorse =  DB::table('doctors')
            
        ->rightJoin('doctor_has_especialidad', 'doctors.id', '=', 'doctor_has_especialidad.doctor_id')
        ->rightJoin('especialidads', 'doctor_has_especialidad.especialidad_id', '=', 'especialidads.id')
        ->select('doctors.id','doctors.nombre','doctors.apellido_p','doctors.created_at','doctors.status','doctors.foto')
        ->get();

        //$doctors = Doctor::all();
        return view('admin.doctor-list',['doctors'=> $doctors, 'doctorse' => $doctorse]);

    }

    public function patient_list(){
        $pacientes = Paciente::all();

        return view('admin.patient-list',compact('pacientes'));
    }

    public function clinic_list(){
        $clinicas = Clinica::all();

        return view('admin.pharmacy-list',compact('clinicas'));
    }

    public function doctor_profile(){

        $doctor = Doctor::findOrFail(1);

        return view('admin.profile-doctor',['doctor'=> $doctor]);
    }

    public function especialidades(){
        $especialidades = Especialidad::all();
        return view('admin.specialities',['especialidades'=>$especialidades]);
        
    }

    public function guardar_especialidad(Request $request){

        $especialidad = request()->except("_token");

        $nombre_imagen = $this->eliminar_acentos($especialidad['nombre']);

        $date = Date("ishdmy");

        if ($request->hasFile("imagen")){
            
            $request->file("imagen")->storeAs("public","especialidades/".$nombre_imagen.$date.".png");

            $especialidad['imagen'] = "especialidades/".$nombre_imagen.$date.".png";
        } 

        Especialidad::create($especialidad);

        $msj = "Especialidad creada con éxito";

        return redirect()->route('especialidades')->with(["msj" => $msj]);

    }

    public function edit_especialidad(Request $request){
        $especialidad = request()->except("_token");

        $id =  $especialidad['id_espe'];

        $date = Date("ishdmy");

        $nombre_imagen = $this->eliminar_acentos($especialidad['nombre_edit']);


        if ($request->hasFile("imagen")){
            
             $request->file("imagen")->storeAs("public","especialidades/".$nombre_imagen.$date.".png");

             $especialidad['imagen'] = "especialidades/".$nombre_imagen.$date.".png";

            Especialidad::where('id','=',$id)->update([
                'nombre' => $especialidad['nombre_edit'],
                'imagen' => $especialidad['imagen']
            ]);
        } else{

            Especialidad::where('id','=',$id)->update([
                'nombre' => $especialidad['nombre_edit']
            ]);
        }

        $msj = "Especialidad actualizada con éxito";

        return redirect()->route('especialidades')->with(["msj" => $msj]);

    }

    public function destroy_especialidad(Request $request){

        $espe = request()->except("_token");

        $espe  = Especialidad::find($espe['id_espe_d']);

        unlink("storage/".$espe['imagen']);

        $espe->delete();

        $msj = "Especialidad borrada con éxito";

        return redirect()->route('especialidades')->with(["msj" => $msj]);
    }

    public function change_status(){

        $doctor = request();

        Doctor::where('id','=',$doctor['id'])->update([
            'status' => $doctor['status']
        ]);

        return response($doctor,200,);
    }

    public function diagnostics(){


        return view('admin.diagnostics');
    }

    public function save_diagnostic(Request $request){

        $cod_3 = request()->letra_3 . request()->number_3;
        $cod_4 = request()->letra_4 . request()->number_4;

        $d =  Diagnostic::create([
            'cod_3' => $cod_3,
            'descripcion_3' => request()->descripcion_3,
            'cod_4' => $cod_4,
            'descripcion_4' => request()->descripcion_4,
        ]); 
        return redirect()->route('diagnosticos')->with(["registro" => $d]);
    }



    function eliminar_acentos($cadena){
		
		//Reemplazamos la A y a
		$cadena = str_replace(
		array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
		array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
		$cadena
		);

		//Reemplazamos la E y e
		$cadena = str_replace(
		array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
		array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
		$cadena );

		//Reemplazamos la I y i
		$cadena = str_replace(
		array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
		array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
		$cadena );

		//Reemplazamos la O y o
		$cadena = str_replace(
		array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
		array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
		$cadena );

		//Reemplazamos la U y u
		$cadena = str_replace(
		array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
		array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
		$cadena );

		//Reemplazamos la N, n, C y c
		$cadena = str_replace(
		array('Ñ', 'ñ', 'Ç', 'ç'),
		array('N', 'n', 'C', 'c'),
		$cadena
		);
		
		return $cadena;
	}
    
}