<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\PDF;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Hash;
use App\Doctor;
use App\Paciente;
use App\Historial;
use App\Especialidad;
use App\Diagnostic;
use App\Estudios;
use App\Articulos;
use Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class DoctorController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('auth:doctors');
    }
    
    public function doctor_dashboard(){
        
        return view('doctors.doctor-dashboard');
    }
    
    public function profile(){
        
        return view('doctors.doctor-profile');
    }

    public function my_patients(){

        //$doctor = Doctor::findOrFail(1);

       $pacientes = Auth::user()->pacientes()->get();

        return view('doctors.my-patients',['pacientes' => $pacientes]);
    }

    public function get_patient($paciente){

        $paciente = Paciente::where('id',$paciente)->select('id','nombre','apellido_p','apellido_m','sexo','edad','tipo_sangre','telefono','email','created_at')->get();
        return $paciente;

    }

    public function historial($paciente){

        $pa =  Paciente::where('id',$paciente)->with(['historial','alergias'])->get();

        //return $paciente[0]->get_edad();

        if(!Historial::where('paciente_id',$pa->pluck('id')[0])->exists()){
            $historial = Historial::create([
                'paciente_id' => $pa->pluck('id')[0]
            ]);
        }

        $d = Diagnostic::all();
        $e = Estudios::all();
        $a = Articulos::where('clinica_id', Auth::user()->clinicas()->get()[0]->id)->get();

        return view('doctors.historial', ['paciente' => $pa,'diagnosticos'=> $d,'estudios'=> $e,'articulos'=> $a]);
     }

     
     public function new_patient(){
 
         return view('doctors.doctor-patient-register');
     }

     public function patient_registro(){

        $datosPaciente = request()->except("_token");
        
        $datosPaciente = request()->validate([
            'email' => ['required','email','unique:pacientes,email'],
            'nombre' => 'required',
            'apellido_p' => 'required',
            'sexo' => 'required',
            'fecha_nacimiento' => 'required',
            'telefono' => 'required|min:10'
        ],[
            'email.unique' => 'Este correo ya se encuentra registrado',
            'email.required' => 'Ingresa un correo electronico valido',
            'email.email' => 'Ingresa un correo electronico valido',
            'nombre.required' => 'Ingresa tu nombre',
            'apellido_p.required' => 'Ingresa tu Apellido Paterno',
            'telefono.required' => 'Ingresa un número de teléfono con Whatsapp',
            'telefono.min' => 'Ingresa un número de teléfono válido',
            'sexo.required' => 'Ingresa el género del paciente',
            'fecha_nacimiento.required' => 'Ingresa la fecha de nacimiento'

        ]);

        $pass = "P" . date('Y') . substr($datosPaciente['nombre'],0,2) . substr($datosPaciente['apellido_p'],0,2) . "DBk" ;
        
        $datosPaciente['apellido_m'] = request()->apellido_m;
        $datosPaciente['created_at'] = date('Y-m-d H:i:s');
        $datosPaciente['password'] = bcrypt($pass);
        $datosPaciente['status'] = "1";
        $datosPaciente['pass'] = $pass;
        $datosPaciente['fecha_nacimiento'] = request()->fecha_nacimiento;
        $datosPaciente['sexo'] = request()->sexo;
        $datosPaciente['tipo_sangre'] = request()->tipo_sangre;
        $datosPaciente['curp'] = request()->curp;
        $datosPaciente['calle'] = request()->calle;
        $datosPaciente['colonia'] = request()->colonia;
        $datosPaciente['cp'] = request()->cp;
        $datosPaciente['ciudad'] = request()->ciudad;
        $datosPaciente['estado'] = request()->estado;
        $datosPaciente['recordatorio'] = request()->recordatorio;
        $datosPaciente['correo_bienvenida'] = request()->correo_bienvenida;
        
       
        if($datosPaciente['correo_bienvenida'] === "1"){
            //enviar correo de bienvenida
        }
        
        $userPa = Paciente::create($datosPaciente);
        
        $userPa->assignRole('Paciente');

        Auth::guard('doctors')->user()->pacientes()->save($userPa);

        $paciente = Paciente::latest('id')->first();

         if (request()->hasFile("foto")){
            request()->file("foto")->storeAs('public','paciente_perfil/p-'.$paciente['id'].".png");
            $datosPacienteU['foto'] = 'paciente_perfil/p-'.$paciente['id'].".png";
            Paciente::where('id','=',$paciente['id'])->update($datosPacienteU);
        }

        return redirect()->route('mis-pacientes');
    
    }

    public function new_consulta_rapida(){

         $data = "Paciente: " . request()->paciente_id . "Motivo: " . request()->motivo . "Diagnostico: " . request()->diagnostico . "Notas: " . request()->notas . "Estatura: " . request()->estatura . "Peso: " . request()->peso . "Masa: " . request()->masa_corporal . "Temp: " . request()->temperatura . "Signos: " . request()->frec_signos . "Sis: " . request()->sistolica . "Dias: " . request()->diastolica . "IdEstudios: " . request()->id_estudios . "ObsEstudios: " . request()->obsEstudios . "IdArticulos: " . request()->id_articulos . "IndiArticulo: " . request()->indiArticulos;

        $doctor = Doctor::where('id',1)->with(['clinicas'])->get()[0];
        $paciente = Paciente::where('id',request()->paciente_id)->get()[0];

        $arrayIdArt = json_decode(request()->id_articulos);
        $arrayIndi = json_decode(request()->indiArticulos);
        $i = 0;

       /*  for ($i = 1; $i <= count($arrayIdArt); $i++) {
            echo $i;
        } */
        foreach ($arrayIdArt as $idArticulo){
            $articulo = Articulos::where('id', $idArticulo)->get()[0];
            $articulos[$i] = array(
                "articulo" =>$articulo->articulo,
                "indicaciones" => $arrayIndi[$i]
            );  
            $i++;
        }

        

        //$arrayIndi = explode(",",request()->indiArticulos);

        //return view('invoice-view',['doctor'=> $doctor,'paciente'=>$paciente ]);

        //$pdf = App::make('dompdf.wrapper');
        $pdf = \PDF::loadView('invoice-view',['doctor'=> $doctor,'paciente'=>$paciente,'indicaciones' => $articulos]);
        $pdf->save("storage/receta.pdf");
        //$pdf->download("receta.pdf");
        return  "Se guardo";

       /*  return "Paciente: " . request()->paciente_id . "Motivo: " . request()->motivo . "Diagnostico: " . request()->diagnostico . "Notas: " . request()->notas . "Estatura: " . request()->estatura . "Peso: " . request()->peso . "Masa: " . request()->masa_corporal . "Temp: " . request()->temperatura . "Signos: " . request()->frec_signos . "Sis: " . request()->sistolica . "Dias: " . request()->diastolica . "IdEstudios: " . request()->id_estudios . "ObsEstudios: " . request()->obsEstudios . "IdArticulos: " . request()->id_articulos . "IndiArticulo: " . request()->indiArticulos ; */
    }

    

 
}
