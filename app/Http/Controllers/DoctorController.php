<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\PDF;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response as FacadeResponse;

use App\Doctor;
use App\Paciente;
use App\Historial;
use App\Especialidad;
use App\Diagnostic;
use App\Estudios;
use App\Articulos;
use App\ConsultaRapida;
use App\MotivoConsulta;
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

        if(!Historial::where('paciente_id',$paciente)->exists()){
            $historial = Historial::create([
                'paciente_id' => $paciente
            ]);

            $pacientes = Auth::user()->pacientes()->get();
            return view('doctors.my-patients',['pacientes' => $pacientes]);

        }else{

           $consultas =  ConsultaRapida::query()->where("paciente_id",$paciente)->with(['diagnostico'])->orderBy("created_at","DESC")->paginate(5);
            
            return view('doctors.historial', ['paciente' => $pa,'consultas' => $consultas]);
        }
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

        
        Historial::where('paciente_id','=',request()->paciente_id)->update([
            'estatura' => request()->estatura,
            'peso' => request()->peso,
            'masa_corporal' => request()->masa_corporal,
            'temperatura' => request()->temperatura,
            'frec_respiratoria' => request()->frec_signos,
            'sistolica' => request()->sistolica,
            'diastolica' => request()->diastolica
        ]);

        $doctor = Doctor::where('id',auth()->user("doctors")->get()[0]->id)->with(['clinicas'])->get()[0];
        $paciente = Paciente::where('id',request()->paciente_id)->get()[0];
        $diagnostico = Diagnostic::where('id',request()->diagnostico)->get()[0]->descripcion_4  ;
        $temp = request()->temperatura;
        $motivo = MotivoConsulta::where('id', request()->motivo)->get()[0]->motivo;

        $arrayIdArt = json_decode(request()->id_articulos);
        $arrayIndi = json_decode(request()->indiArticulos);
        $i = 0;

        foreach ($arrayIdArt as $idArticulo){
            $articulo = Articulos::where('id', $idArticulo)->get()[0];
            $articulosF[$i] = array(
                "articulo" =>$articulo->articulo,
                "indicaciones" => $arrayIndi[$i]
            );  
            $i++;
        }

        $arrayIdEst = json_decode(request()->id_estudios);
        $arrayObs = json_decode(request()->obsEstudios);
        $j = 0;

        foreach ($arrayIdEst as $idEstudio){
            $estudio = Estudios::where('id', $idEstudio)->get()[0];
            $estudiosF[$j] = array(
                "estudio" => $estudio->estudio,
                "observaciones" => $arrayObs[$j]
            );  
            $j++;
        }
        
        $pdf = \PDF::loadView('invoice-view',['doctor'=> $doctor,'paciente'=>$paciente,'indicaciones' => $articulosF,'estudios' => $estudiosF,'diagnostico' => $diagnostico,'temp'=>$temp]);
        $pdf->setPaper(array(0,0,595.28,420.94), 'portrait');
        $date = Date("dmys");
        $path = 'public/recetas/p'.request()->paciente_id.'/r-'.$date.'.pdf';
        $pathSave = Storage::put($path, $pdf->output());
        
        $consulta_rapida = ConsultaRapida::create([
            'paciente_id' => request()->paciente_id, 
            'doctor_id' => auth()->user("doctors")->get()[0]->id, 
            'motivo_consulta_id' => request()->motivo, 
            'diagnostico_id' => request()->diagnostico, 
            'notas_consulta_rapida' => request()->notas,
            'receta' => "/storage/recetas/p".request()->paciente_id."/r-".$date.".pdf",
            'motivo_extra' => "-",
            'pagado' => "0" 
        ]);
        $request = [
            'consulta' => $consulta_rapida,
            'motivo' => $motivo,
            'diagnostico' => $diagnostico,
            'pdf' => "/storage/recetas/p".request()->paciente_id."/r-".$date.".pdf"
        ];

        return $request;
    }

    public function make_pay(){
        $paciente_id = request()->paciente_id;
        $id_consulta = request()->id_consulta_rapida;
        $cobro = request()->total;
        $costo_consulta = request()->costo_consulta;
        $extra = request()->extra;
        $motivo_extra = request()->motivo_extra;

        
        $paciente = Paciente::where('id',$paciente_id)->get()[0];
        $doctor = Doctor::where('id',auth()->user("doctors")->get()[0]->id)->with(['clinicas'])->get()[0];
        $consulta = ConsultaRapida::where('id',$id_consulta)->get();
        
        
        $pdf = \PDF::loadView('ticket-view',['doctor'=> $doctor,'paciente'=>$paciente,'cobro'=>$cobro,'extra' => $extra,'motivo_extra'=> $motivo_extra,'costo_consulta'=> $costo_consulta,'id_consulta' => $id_consulta]);
        $pdf->setPaper("A4", 'portrait');
        $date = Date("dmys");
        $path = 'public/recibos/p'.$paciente_id.'/r-'.$date.'.pdf';
        $pathSave = Storage::put($path, $pdf->output());

        ConsultaRapida::where('id',$id_consulta)->update([
            'cobro' => $cobro,
            'motivo_extra' => $motivo_extra,
            'recibo' => "/storage/recibos/p".$paciente_id."/r-".$date.".pdf",
            'pagado' => "1"
        ]);
        
        $request = [
            'pdf' => "/storage/recibos/p".$paciente_id."/r-".$date.".pdf"
        ];
        return $request;

    
    }

    

 
}
