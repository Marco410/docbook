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
use App\Funciones;


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

        //$doctors = Doctor::all();
        return view('admin.doctor-list',['doctors'=> $doctors]);

    }

    public function patient_list(){
        $pacientes = Paciente::all();

        return view('admin.patient-list',compact('pacientes'));
    }

    public function clinic_list(){
        $clinicas = Clinica::where("status","1")->get();

        return view('admin.pharmacy-list',compact('clinicas'));
    }

    public function edit_clinic($clinica){
        $clinica = Clinica::where('id',$clinica)->get()[0];

        return view('admin.clinics.edit',['clinica'=> $clinica]);
    }

    public function edit_doctor($doctor){
        $doctor = Doctor::where('id',$doctor)->get()[0];

        return view('admin.doctors.edit',['doctor'=> $doctor]);
    }

    public function update_clinic(Request $request){
        $datosClinica = request()->except("_token");

        $clinica_id = request()->clinica_id;
        $datosClinica['nombre_consultorio'] = request()->nombre_consultorio;
        $datosClinica['status'] = "1";
        $datosClinica['fecha_nacimiento'] = request()->fecha_nacimiento;
        $datosClinica['sexo'] = request()->sexo;
        $datosClinica['tipo_sangre'] = request()->tipo_sangre;
        
        $nombre_consultorio = request()->nombre_consultorio;
        $tipo_logo = request()->tipo_logo;
        $tel_consultorio = request()->tel_consultorio;
        $no_medicos = request()->no_medicos;
        $calle_consultorio = request()->calle_consultorio;
        $colonia_consultorio = request()->colonia_consultorio;
        $ciudad_consultorio = request()->ciudad_consultorio;
        $estado_consultorio = request()->estado_consultorio;
        $pais_consultorio = request()->pais_consultorio;
        
        $cliniaUpdated = Clinica::where("id",$clinica_id)->update([
            "nombre_consultorio" => $nombre_consultorio,
            "tipo_logo" => $tipo_logo,
            "tel_consultorio" => $tel_consultorio,
            "no_medicos" => $no_medicos,
            "calle_consultorio" => $calle_consultorio,
            "colonia_consultorio" => $colonia_consultorio,
            "ciudad_consultorio" => $ciudad_consultorio,
            "estado_consultorio" => $estado_consultorio,
            "pais_consultorio" => $pais_consultorio
        ]);

        $clinica_nombre = Funciones::eliminar_acentos($nombre_consultorio);
        
         if (request()->hasFile("logotipo")){

            if($datosClinica["antigua_imagen"] != null){

                unlink("storage/".$datosClinica['antigua_imagen']);
            }

            $datosClinicaU['logotipo'] = $request->file("logotipo")->storeAs("public","clinica_logos/logotipo_". $clinica_nombre .date('dmy') .".png");

            $datosClinicaU['logotipo'] = "clinica_logos/logotipo_". $clinica_nombre .date('dmy').".png";

            $logotipo_base64 = base64_encode(file_get_contents($request->file('logotipo')));

            $datosClinicaU['logotipo_base64'] = $logotipo_base64;
            Clinica::where('id','=',$clinica_id)->update($datosClinicaU);

        }

        return redirect()->route('lista-clinicas');
    }

    public function update_doctor(Request $request){
        $datosDoctor = request()->except("_token");

        $doctor_id = request()->doctor_id;

        unset($datosDoctor['doctor_id']);
        
        $cliniaUpdated = Doctor::where("id",$doctor_id)->update($datosDoctor);
        
         if (request()->hasFile("institucion_logo")){

            $logotipo_base64 = base64_encode(file_get_contents($request->file('institucion_logo')));

            $datosDoctorU['institucion_logo'] = $logotipo_base64;
            Doctor::where('id','=',$doctor_id)->update($datosDoctorU);

        }

        return redirect()->route('lista-doctor');
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

        $nombre_imagen = Funciones::eliminar_acentos($especialidad['nombre']);

        $date = Date("ishdmy");

        if ($request->hasFile("imagen")){
            
            $request->file("imagen")->storeAs("public","especialidades/".$nombre_imagen.".png");

            $especialidad['imagen'] = "especialidades/".$nombre_imagen.".png";
        } 

        Especialidad::create($especialidad);

        $msj = "Especialidad creada con éxito";

        return redirect()->route('especialidades')->with(["msj" => $msj]);

    }

    public function edit_especialidad(Request $request){
        $especialidad = request()->except("_token");

        $id =  $especialidad['id_espe'];

        $date = Date("ishdmy");

        $nombre_imagen = Funciones::eliminar_acentos($especialidad['nombre_edit']);


        if ($request->hasFile("imagen")){
            
             $request->file("imagen")->storeAs("public","especialidades/".$nombre_imagen.".png");

             $especialidad['imagen'] = "especialidades/".$nombre_imagen.".png";

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