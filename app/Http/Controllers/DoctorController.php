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
use Maatwebsite\Excel\Facades\Excel;

use App\Caja;
use App\Pagos;
use App\Doctor;
use App\Clinica;
use App\Paciente;
use App\Historial;
use App\Funciones;
use App\Especialidad;
use App\Diagnostic;
use App\Estudios;
use App\Articulos;
use App\ConsultaRapida;
use App\Consultas;
use App\MotivoConsulta;

use App\Exports\DiagnosticsExport;
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
        $clinicas = auth()->user("doctors")->clinicas()->orderBy("activa","desc")->get();
        if(auth()->user("doctors")->clinicas->where('activa',1)->count() != 0){
            
            $clinica_id = auth()->user("doctors")->clinicas->where('activa',1)->first()->id;
            
            $doctor_id = auth()->user("doctors")->id;
    
            $countCaja = Caja::where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("abierta","1")->get()->count();
            $caja = Caja::where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("abierta","1")->get();
        }else{
            $countCaja = 0;
            $caja = "";
        }

        return view('doctors.doctor-dashboard',['clinicas' => $clinicas,'countCaja'=>$countCaja,'cajaOpen'=> $caja]);
    }

    public function change_clinic(){
        Clinica::where("activa","1")->update(["activa" => "0"]);

        $clinica = Clinica::where("id",request()->change_clinica)->update(["activa"=>"1"]);

        return redirect()->route('doctor-inicio')->with('storeN','Correcto');
    }
    
    public function profile(){
        
        return view('doctors.doctor-profile');
    }

    public function edit_patient($paciente){
        $paciente = Paciente::where('id',$paciente)->get()[0];

        return view('doctors.doctor-patient-edit',['paciente'=> $paciente]);

    }

    public function profile_patient($paciente){
        $paciente = Paciente::where('id',$paciente)->get()[0];

        $consultas = ConsultaRapida::where('paciente_id',$paciente->id)->get();
        
        return view('doctors.patient-profile',['paciente'=> $paciente,'consultas'=> $consultas]);
    }

    public function my_patients(){
        $clinica_id = auth()->user("doctors")->clinicas->where('activa',1)->first()->id;
        $doctor_id = auth()->user("doctors")->id;
        //$doctor = Doctor::findOrFail(1);

        $pacientes = Auth::user()->pacientes()->where("status","1")->orderBy("created_at","desc")->get();
        $countCaja = Caja::where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("abierta","1")->get()->count();
        $caja = Caja::where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("abierta","1")->get();

        return view('doctors.my-patients',['pacientes' => $pacientes,'countCaja'=>$countCaja,'openCaja'=> $caja]);
    }

    public function get_patient($paciente){

        $paciente = Paciente::where('id',$paciente)->select('id','nombre','apellido_p','apellido_m','sexo','tipo_sangre','telefono','email','created_at')->get();
        return $paciente;
    }

    public function delete_patient($paciente){

        $paciente = Paciente::where('id',$paciente)->update(["status"=>"0"]);
        return $paciente;

    }

    public function historial($paciente){

        $pa =  Paciente::where('id',$paciente)->with(['historial','alergias'])->get();
        //return $paciente[0]->get_edad();

        if(!Historial::where('paciente_id',$paciente)->exists()){
            $historial = Historial::create([
                'paciente_id' => $paciente
            ]);
            $countCaja = Caja::where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("abierta","1")->get()->count();

            $pacientes = Auth::user()->pacientes()->get();
            return view('doctors.historial', ['paciente' => $pa,'consultas' => $consultas,'countCaja'=>$countCaja]);
            return view('doctors.my-patients',['pacientes' => $pacientes,]);

        }else{

           $consultas_rapidas =  ConsultaRapida::query()->where("paciente_id",$paciente)->with(['diagnostico'])->orderBy("created_at","DESC")->paginate(3);

           $consultas =  Consultas::query()->where("paciente_id",$paciente)->with(['diagnostico'])->orderBy("created_at","DESC")->paginate(3);

           $consulta_actual =  Consultas::where("paciente_id",$paciente)->where("termino","No")->get()->count();

           if($consulta_actual == 0){
               $consulta_actual = null;
            }else{
                $consulta_actual =  Consultas::where("paciente_id",$paciente)->where("termino","No")->with(['motivo','diagnostico'])->get();
           }
            
            return view('doctors.historial', ['paciente' => $pa,'consultasr' => $consultas_rapidas,'consulta_actual'=> $consulta_actual,'consultas'=>$consultas]);
        }
    }
     
    public function new_patient(){
         return view('doctors.doctor-patient-register');
    }
     
    public function patient_registro(){

        $datosPaciente = request()->except("_token");
        
        $datosPaciente = request()->validate([
            /* 'email' => ['required', 'email','unique:pacientes,email'], */
            'nombre' => 'required',
            'apellido_p' => 'required',
            'sexo' => 'required',
            'fecha_nacimiento' => 'required',
            'telefono' => 'required|min:10',
            'terminos' => 'required'
        ],[
            /* 'email.unique' => 'Este correo ya se encuentra registrado', */
            /* 'email.required' => 'Ingresa un correo electronico valido', */
            'email.email' => 'Ingresa un correo electronico valido',
            'nombre.required' => 'Ingresa tu nombre',
            'terminos.required' => 'El paciente debe aceptar los terminos y condiciones',
            'apellido_p.required' => 'Ingresa tu Apellido Paterno',
            'telefono.required' => 'Ingresa un número de teléfono con Whatsapp',
            'telefono.min' => 'Ingresa un número de teléfono válido',
            'sexo.required' => 'Ingresa el género del paciente',
            'fecha_nacimiento.required' => 'Ingresa la fecha de nacimiento'

        ]);

        $pass = "P" . date('Y') . substr($datosPaciente['nombre'],0,2) . substr($datosPaciente['apellido_p'],0,2) . "DBk" ;
        
        $datosPaciente['email'] = request()->email;
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
        $datosPaciente['nombre_familiar'] = request()->nombre_familiar;
        $datosPaciente['telefono_familiar'] = request()->telefono_familiar;

        $datosPaciente['seguro_social'] = request()->seguro_social;
        $datosPaciente['nacionalidad'] = request()->nacionalidad;
        $datosPaciente['empleo'] = request()->empleo;

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

    public function patient_editar(){

        $datosPaciente = request()->except("_token");

        $paciente_id = request()->paciente_id;
        
        $datosPaciente = request()->validate([
            'nombre' => 'required',
            'apellido_p' => 'required',
            'sexo' => 'required',
            'fecha_nacimiento' => 'required',
            'telefono' => 'required|min:10'
        ],[
            'nombre.required' => 'Ingresa tu nombre',
            'apellido_p.required' => 'Ingresa tu Apellido Paterno',
            'telefono.required' => 'Ingresa un número de teléfono con Whatsapp',
            'telefono.min' => 'Ingresa un número de teléfono válido',
            'sexo.required' => 'Ingresa el género del paciente',
            'fecha_nacimiento.required' => 'Ingresa la fecha de nacimiento'

        ]);
        /* 
        $pass = "P" . date('Y') . substr($datosPaciente['nombre'],0,2) . substr($datosPaciente['apellido_p'],0,2) . "DBk" ; */
        
        $datosPaciente['apellido_m'] = request()->apellido_m;
        $datosPaciente['status'] = "1";
        /* $datosPaciente['pass'] = $pass; */
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
        
        
        $userPa = Paciente::where("id",$paciente_id)->update($datosPaciente);
         if (request()->hasFile("foto")){
            request()->file("foto")->storeAs('public','paciente_perfil/p-'.$paciente_id.".png");
            $datosPacienteU['foto'] = 'paciente_perfil/p-'.$paciente_id.".png";
            Paciente::where('id','=',$paciente_id)->update($datosPacienteU);
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

        $doctor = Doctor::where('id',auth()->user("doctors")->id)->with(['clinicas'])->get()[0];
        $paciente = Paciente::where('id',request()->paciente_id)->get()[0];
        if(strlen(request()->diagnostico) > 5){
            $diagnostico = request()->diagnostico;
        }else {
            $diagnostico = Diagnostic::where('id',request()->diagnostico)->get()[0]->descripcion_4;
            $diagnostico_id = request()->diagnostico;
        }

        $temp = request()->temperatura;
        $motivo = MotivoConsulta::where('id', request()->motivo)->get()[0]->motivo;

        $arrayIdArt = json_decode(request()->id_articulos);
        $arrayIndi = json_decode(request()->indiArticulos);
        $i = 0;
        
        $arrayIdEst = json_decode(request()->id_estudios);
        $arrayObs = json_decode(request()->obsEstudios);
        $j = 0;
        
        if (!empty($arrayIdArt)) {
            foreach ($arrayIdArt as $idArticulo){
                $articulo = Articulos::where('id', $idArticulo)->get()[0];
                $articulosF[$i] = array(
                    "articulo" =>$articulo->articulo,
                    "indicaciones" => $arrayIndi[$i]
                );  
                $i++;
            }
        }else{
            $articulosF = [];
        }
        if (!empty($arrayIdEst)) {
            foreach ($arrayIdEst as $idEstudio){
                $estudio = Estudios::where('id', $idEstudio)->get()[0];
                $estudiosF[$j] = array(
                    "estudio" => $estudio->estudio,
                    "observaciones" => $arrayObs[$j]
                );  
                $j++;
            }
        }else{
           $estudiosF = [];
        }

        $url = request()->root();
        
        $pdf = \PDF::loadView('invoice-view',['doctor'=> $doctor,'paciente'=>$paciente,'indicaciones' => $articulosF,'estudios' => $estudiosF,'diagnostico' => $diagnostico,'temp'=>$temp,'url'=> $url]);
        $pdf->setPaper(array(0,0,595.28,420.94), 'portrait');
        $date = Date("dmys");
        $path = 'public/recetas/p'.request()->paciente_id.'/r-'.$date.'.pdf';
        $pathSave = Storage::put($path, $pdf->output());
        
        if(strlen(request()->diagnostico) > 5){

            $consulta_rapida = ConsultaRapida::create([
                'paciente_id' => request()->paciente_id, 
                'doctor_id' => auth()->user("doctors")->id, 
                'motivo_consulta_id' => request()->motivo, 
                'diagnostico_str' => request()->diagnostico, 
                'notas_consulta_rapida' => request()->notas,
                'receta' => "/storage/recetas/p".request()->paciente_id."/r-".$date.".pdf",
                'motivo_extra' => "-",
                'pagado' => "0" 
            ]);
        }else {
            
            $consulta_rapida = ConsultaRapida::create([
                'paciente_id' => request()->paciente_id, 
                'doctor_id' => auth()->user("doctors")->id, 
                'motivo_consulta_id' => request()->motivo, 
                'diagnostico_id' => $diagnostico_id, 
                'notas_consulta_rapida' => request()->notas,
                'receta' => "/storage/recetas/p".request()->paciente_id."/r-".$date.".pdf",
                'motivo_extra' => "-",
                'pagado' => "0" 
            ]);
        }
        $request = [
            'consulta' => $consulta_rapida,
            'motivo' => $motivo,
            'diagnostico' => $diagnostico,
            'pdf' => "/storage/recetas/p".request()->paciente_id."/r-".$date.".pdf"
        ];

        return $request;
    }

    public function new_consulta(){

       $doctor = Doctor::where('id',auth()->user("doctors")->id)->with(['clinicas'])->get()[0];
       $paciente = Paciente::where('id',request()->paciente_id)->get()[0];
       if(strlen(request()->diagnostico) > 5){
           $diagnostico = request()->diagnostico;
       }else {
           $diagnostico = Diagnostic::where('id',request()->diagnostico)->get()[0]->descripcion_4;
           $diagnostico_id = request()->diagnostico;
       }

       $motivo = MotivoConsulta::where('id', request()->motivo)->get()[0]->motivo;
       
       
       if(strlen(request()->diagnostico) > 5){

           $consulta = Consultas::create([
               'paciente_id' => request()->paciente_id, 
               'doctor_id' => auth()->user("doctors")->id, 
               'motivo_consulta_id' => request()->motivo, 
               'diagnostico_str' => request()->diagnostico, 
               'notas_consulta' => request()->notas,
               'motivo_extra' => "-",
               'termino' => "No",
               'pagado' => "0" 
           ]);
       }else {
           
           $consulta = Consultas::create([
               'paciente_id' => request()->paciente_id, 
               'doctor_id' => auth()->user("doctors")->id, 
               'motivo_consulta_id' => request()->motivo, 
               'diagnostico_id' => $diagnostico_id, 
               'notas_consulta' => request()->notas,
               'motivo_extra' => "-",
               'termino' => "No",
               'pagado' => "0" 
           ]);
       }
       $request = [
           'consulta' => $consulta,
           'motivo' => $motivo,
           'diagnostico' => $diagnostico
       ];

       return $request;
    }

    public function end_consulta(){
       
       Historial::where('paciente_id','=',request()->paciente_id)->update([
           'estatura' => request()->estatura,
           'peso' => request()->peso,
           'masa_corporal' => request()->masa_corporal,
           'temperatura' => request()->temperatura,
           'frec_respiratoria' => request()->frec_signos,
           'sistolica' => request()->sistolica,
           'diastolica' => request()->diastolica
       ]);

       $doctor = Doctor::where('id',auth()->user("doctors")->id)->with(['clinicas'])->get()[0];
       $paciente = Paciente::where('id',request()->paciente_id)->get()[0];
       if(strlen(request()->diagnostico) > 5){
           $diagnostico = request()->diagnostico;
       }else {
           $diagnostico = Diagnostic::where('id',request()->diagnostico)->get()[0]->descripcion_4;
           $diagnostico_id = request()->diagnostico;
       }

       $temp = request()->temperatura;
       $motivo = MotivoConsulta::where('id', request()->motivo)->get()[0]->motivo;

       $arrayIdArt = json_decode(request()->id_articulos);
       $arrayIndi = json_decode(request()->indiArticulos);
       $i = 0;
       
       $arrayIdEst = json_decode(request()->id_estudios);
       $arrayObs = json_decode(request()->obsEstudios);
       $j = 0;
       
       if (!empty($arrayIdArt)) {
           foreach ($arrayIdArt as $idArticulo){
               $articulo = Articulos::where('id', $idArticulo)->get()[0];
               $articulosF[$i] = array(
                   "articulo" =>$articulo->articulo,
                   "indicaciones" => $arrayIndi[$i]
               );  
               $i++;
           }
       }else{
           $articulosF = [];
       }
       if (!empty($arrayIdEst)) {
           foreach ($arrayIdEst as $idEstudio){
               $estudio = Estudios::where('id', $idEstudio)->get()[0];
               $estudiosF[$j] = array(
                   "estudio" => $estudio->estudio,
                   "observaciones" => $arrayObs[$j]
               );  
               $j++;
           }
       }else{
          $estudiosF = [];
       }
       
       $pdf = \PDF::loadView('invoice-view',['doctor'=> $doctor,'paciente'=>$paciente,'indicaciones' => $articulosF,'estudios' => $estudiosF,'diagnostico' => $diagnostico,'temp'=>$temp]);
       $pdf->setPaper(array(0,0,595.28,420.94), 'portrait');
       $date = Date("dmys");
       $path = 'public/recetas/p'.request()->paciente_id.'/r-'.$date.'.pdf';
       $pathSave = Storage::put($path, $pdf->output());
       
       $id_consulta = request()->id_consulta_actual;

       if(strlen(request()->diagnostico) > 5){

           $consulta = Consultas::where("id",$id_consulta)->update([
               'paciente_id' => request()->paciente_id, 
               'doctor_id' => auth()->user("doctors")->id, 
               'motivo_consulta_id' => request()->motivo, 
               'diagnostico_str' => request()->diagnostico, 
               'notas_consulta' => request()->notas,
               'receta' => "/storage/recetas/p".request()->paciente_id."/r-".$date.".pdf",
               'motivo_extra' => "-",
               'termino' => "Si" 
           ]);
       }else {
           
           $consulta = Consultas::where("id",$id_consulta)->update([
               'paciente_id' => request()->paciente_id, 
               'doctor_id' => auth()->user("doctors")->id, 
               'motivo_consulta_id' => request()->motivo, 
               'diagnostico_id' => $diagnostico_id, 
               'notas_consulta' => request()->notas,
               'receta' => "/storage/recetas/p".request()->paciente_id."/r-".$date.".pdf",
               'motivo_extra' => "-",
               'termino' => "Si" 
           ]);
       }
       $request = [
           'consulta' => $id_consulta,
           'motivo' => $motivo,
           'diagnostico' => $diagnostico,
           'pdf' => "/storage/recetas/p".request()->paciente_id."/r-".$date.".pdf"
       ];

       return $request;
    }

    public function make_pay(){
        $clinica_id = auth()->user("doctors")->clinicas->where('activa',1)->first()->id;
        $doctor_id = auth()->user("doctors")->id;

        $paciente_id = request()->paciente_id;
        $id_consulta = request()->id_consulta;
        $cobro = request()->total;
        $costo_consulta = request()->costo_consulta;
        $extra = request()->extra;
        $motivo_extra = request()->motivo_extra;
        $metodo = request()->metodo;
        $tipo_consulta = request()->tipo_consulta;
        $descuento = request()->descuento;
        $subtotal = $extra + $costo_consulta;

        
        $paciente = Paciente::where('id',$paciente_id)->get()[0];
        $doctor = Doctor::where('id',auth()->user("doctors")->id)->with(['clinicas'])->get()[0];
        $consulta = ConsultaRapida::where('id',$id_consulta)->get();
        
        
        $pdf = \PDF::loadView('ticket-view',['doctor'=> $doctor,'paciente'=>$paciente,'cobro'=>$cobro,'extra' => $extra,'motivo_extra'=> $motivo_extra,'costo_consulta'=> $costo_consulta,'id_consulta' => $id_consulta,'tipo_consulta' => $tipo_consulta,'descuento'=>$descuento,'subtotal'=>$subtotal]);
        //ancho de la página [0,0,1,0]
        $pdf->setPaper(array(0,0,450.00,800.00), 'portrait');
        $date = Date("dmys");
        $path = 'public/recibos/p'.$paciente_id.'/r-'.$date.'.pdf';
        $pathSave = Storage::put($path, $pdf->output());

        if($tipo_consulta == "Rapida"){
            $cr = ConsultaRapida::where('id',$id_consulta)->update([
                'cobro' => $cobro,
                'motivo_extra' => $motivo_extra,
                'costo_consulta' => $costo_consulta,
                'costo_extra' => $extra,
                'recibo' => "/storage/recibos/p".$paciente_id."/r-".$date.".pdf",
                'pagado' => "1"
            ]);
        }else if ($tipo_consulta == "Consulta"){
            $cr = Consultas::where('id',$id_consulta)->update([
                'cobro' => $cobro,
                'motivo_extra' => $motivo_extra,
                'costo_consulta' => $costo_consulta,
                'costo_extra' => $extra,
                'recibo' => "/storage/recibos/p".$paciente_id."/r-".$date.".pdf",
                'pagado' => "1"
            ]);
        }
        if($costo_consulta != "0"){

            $pago = Pagos::create([
                'clinica_id' => $clinica_id,
                'doctor_id' => $doctor_id,
                'paciente_id' => $paciente_id,
                'tipo_movimiento' => "Entrada",
                'descripcion' => $tipo_consulta,
                'importe' => $costo_consulta,
                'metodo_pago' => $metodo,
                'cerrado' => "0",
                'observaciones' => "Paciente: ".$paciente->nombre. " ". $paciente->apellido_p
            ]);
        }
        if(!empty($extra)){
            $pago = Pagos::create([
                'clinica_id' => $clinica_id,
                'doctor_id' => $doctor_id,
                'paciente_id' => $paciente_id,
                'tipo_movimiento' => "Entrada",
                'descripcion' => $tipo_consulta . " cobro extra ".$motivo_extra,
                'importe' => $extra,
                'metodo_pago' => $metodo,
                'observaciones' => "Paciente: ".$paciente->nombre. " ". $paciente->apellido_p
            ]);
        }
        
        $request = [
            'pdf' => "/storage/recibos/p".$paciente_id."/r-".$date.".pdf"
        ];
        return $request;

    
    }

    public function pagos(){
        $clinica_id = auth()->user("doctors")->clinicas->where('activa',1)->first()->id;
        $doctor_id = auth()->user("doctors")->id;

        $pagos = Pagos::where('doctor_id',$doctor_id)->where("clinica_id",$clinica_id)->orderBy('id','desc')->get();
        $pagosH = Pagos::where('doctor_id',$doctor_id)->where("clinica_id",$clinica_id)->whereDate('created_at',Date("Y-m-d"))->where("cerrado","0")->get();
        $countCaja = Caja::where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("abierta","1")->get()->count();

        //saber total en caja
        $openCaja = Caja::where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("abierta","1")->get()[0];
        $entradas = Pagos::whereDate('created_at',Date("Y-m-d"))->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("tipo_movimiento","Entrada")->where("cerrado","0")->sum("importe");
        $salidas = Pagos::whereDate('created_at',Date("Y-m-d"))->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("tipo_movimiento","Salida")->where("cerrado","0")->sum("importe");

        $total = ($openCaja->apertura + $entradas) - $salidas;
        

        return view('doctors.pago')->with(['pagos' => $pagos,'pagosH'=>$pagosH,'countCaja'=>$countCaja,'total'=>$total]);
    }

    public function save_pago(){

        request()->validate([
            'tipo_movimiento' => 'required',
            'descripcion' => 'required',
            'metodo_pago' => 'required',
            'importe' => 'required'
        ],[
            'tipo_movimiento.required' => 'Debes seleccionar un tipo de movimiento.',
            'descripcion.required' => 'Añade la descripción.',
            'metodo_pago.required' => 'Seleccione el metodo de pago.',
            'importe.required' => 'Añade un importe'
        ]);

        $total = request()->total;
        $importe = request()->importe;
        $tipo_movimiento = request()->tipo_movimiento;

        if($tipo_movimiento == "Salida" && $total < $importe){
            return redirect()->route('pagos')->with('errorSaldo',"Error de saldo");
        }else{
            if (request()->is_factura == "si"){
                $pago = Pagos::create([
                    'clinica_id' => request()->clinica_id,
                    'doctor_id' => auth()->user("doctors")->id,
                    'tipo_movimiento' => $tipo_movimiento,
                    'descripcion' => request()->descripcion,
                    'importe' => $importe,
                    'metodo_pago' => request()->metodo_pago,
                    'observaciones' => request()->observaciones,
                    'cerrado' => "0",
                    'is_factura' => "si",
                    'razon_social' => request()->razon_social,
                    'rfc' => request()->rfc,
                    'domicilio' => request()->domicilio,
                    'email' => request()->email
                ]);
                
                return redirect()->route('pagos');
            }else{
                $pago = Pagos::create([
                    'clinica_id' => request()->clinica_id,
                    'doctor_id' => auth()->user("doctors")->id,
                    'tipo_movimiento' => $tipo_movimiento,
                    'descripcion' => request()->descripcion,
                    'importe' => $importe,
                    'metodo_pago' => request()->metodo_pago,
                    'observaciones' => request()->observaciones,
                    'cerrado' => "0"
                ]);
                 return redirect()->route('pagos');
            }
    
            
        }

    }

    public function caja(){

        $clinica_id = auth()->user("doctors")->clinicas->where('activa',1)->first()->id;
        $doctor_id = auth()->user("doctors")->id;

        $countCaja = Caja::where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("abierta","1")->get()->count();

        $cajas = Caja::where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->get();

        if ($countCaja >= 1){
            $openCaja = Caja::where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("abierta","1")->get()[0];

            $entradas = Pagos::whereDate('created_at',Date("Y-m-d"))->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("tipo_movimiento","Entrada")->where("cerrado","0")->sum("importe");

            $salidas = Pagos::whereDate('created_at',Date("Y-m-d"))->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("tipo_movimiento","Salida")->where("cerrado","0")->sum("importe");

            $efectivo = Pagos::whereDate('created_at',Date("Y-m-d"))->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("tipo_movimiento","Entrada")->where("metodo_pago","Efectivo")->where("cerrado","0")->sum("importe");

            $tarjeta = Pagos::whereDate('created_at',Date("Y-m-d"))->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("tipo_movimiento","Entrada")->where("metodo_pago","Tarjeta")->where("cerrado","0")->sum("importe");

            $transferencia = Pagos::whereDate('created_at',Date("Y-m-d"))->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("tipo_movimiento","Entrada")->where("metodo_pago","Transferencia")->where("cerrado","0")->sum("importe");

            $efectivoS = Pagos::whereDate('created_at',Date("Y-m-d"))->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("tipo_movimiento","Salida")->where("metodo_pago","Efectivo")->where("cerrado","0")->sum("importe");

            $tarjetaS = Pagos::whereDate('created_at',Date("Y-m-d"))->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("tipo_movimiento","Salida")->where("metodo_pago","Tarjeta")->where("cerrado","0")->sum("importe");

            $transferenciaS = Pagos::whereDate('created_at',Date("Y-m-d"))->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("tipo_movimiento","Salida")->where("metodo_pago","Transferencia")->where("cerrado","0")->sum("importe");

            $total = ($openCaja->apertura + $entradas) - $salidas;

        }else{
            $openCaja = "";
            $entradas = "";
            $salidas = "";
            $efectivo = "";
            $tarjeta = "";
            $transferencia = "";
            $efectivoS = "";
            $tarjetaS = "";
            $transferenciaS = "";
            $total = "";
        }
        

        return view('doctors.caja',['openCaja' => $openCaja,'countCaja' => $countCaja,'entradas' => $entradas,'salidas' => $salidas,'efectivo'=>$efectivo,'tarjeta'=> $tarjeta,'transferencia'=>$transferencia,'efectivoS' => $efectivoS, 'tarjetaS'=>$tarjetaS,'transferenciaS'=> $transferenciaS,'total'=>$total,"cajas"=>$cajas]);
    }

    public function open_caja(){
        request()->validate([
            'caja_apertura' => 'required'
        ],[
            'caja_apertura.required' => 'Añade un monto para abrir la caja.'
        ]);

        $pago = Caja::create([
            'clinica_id' => auth()->user("doctors")->clinicas->where('activa',1)->first()->id,
            'doctor_id' => auth()->user("doctors")->id,
            'apertura' => request()->caja_apertura,
            'abierta' => 1
        ]);

        return redirect()->route('caja');
    }

    public function close_caja(){
        $doctor_id = auth()->user("doctors")->id;

        $clinica_id = request()->clinic_id;
        $caja_id = request()->caja_id;
        $entradas = request()->entradas;
        $salidas = request()->salidas;
        $efectivo = request()->ventas_efectivo;
        $tarjeta = request()->ventas_tarjeta;
        $trans = request()->ventas_transferencia;
        $efectivoS = request()->salidas_efectivo;
        $tarjetaS = request()->salidas_tarjeta;
        $transS = request()->salidas_transferencia;
        $total = request()->ventas_total;

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

        return redirect()->route('caja');
    }

    public function make_report(){

        $doctor = Doctor::where('id',auth()->user("doctors")->id)->with(['clinicas'])->get()[0];

        $caja_id = request()->caja_id;
        $apertura = request()->apertura;
        $entradas = request()->entradas;
        $salidas = request()->salidas;
        $efectivo = request()->ventas_efectivo;
        $tarjeta = request()->ventas_tarjeta;
        $trans = request()->ventas_transferencia;
        $efectivoS = request()->salidas_efectivo;
        $tarjetaS = request()->salidas_tarjeta;
        $transS = request()->salidas_transferencia;
        $total = request()->ventas_total;
        $clinic_id = request()->clinic_id;

        $pagos = Pagos::whereDate('created_at',Date('Y-m-d'))->where("clinica_id",$clinic_id)->where("cerrado","0")->get();

        $pdf = \PDF::loadView('report-view',['doctor'=> $doctor,'caja_id'=>$caja_id,'apertura'=>$apertura,'entradas' => $entradas,'salidas'=> $salidas,'efectivo'=> $efectivo,'tarjeta' => $tarjeta,'transferencia' => $trans,'efectivoS' => $efectivoS, 'tarjetaS'=>$tarjetaS,'transferenciaS'=> $transS,'total'=>$total,'pagos'=>$pagos]);


        //ancho de la página [0,0,1,0]
        $pdf->setPaper(array(0,0,350.00,430.00), 'portrait');
        $date = Date("dmy");
        $path = 'public/reportes/r'.$caja_id.$date.'.pdf';
        $pathSave = Storage::put($path, $pdf->output());

        $request = [
            'pdf' => "/storage/reportes/r".$caja_id.$date.".pdf"
        ];
        return $request;
    }

    public function make_report_close(){
        $doctor_id = auth()->user("doctors")->id;
        $doctor = Doctor::where('id',$doctor_id)->with(['clinicas'])->get()[0];

        $caja_id = request()->caja_id;
        $report_type = request()->report_type;
        $clinic_id = request()->clinic_id;
        $dateRequest = request()->date;
        $date = Date("dmy");
        
        $caja = Caja::where("id",$caja_id)->get()[0];
        if($report_type == "Sencillo"){
    
            $pdf = \PDF::loadView('report-view',['doctor'=> $doctor,'caja_id'=>$caja_id,'apertura'=>$caja->apertura,'entradas' => $caja->entradas,'salidas'=> $caja->salidas,'efectivo'=> $caja->ventas_efectivo,'tarjeta' => $caja->ventas_tarjeta,'transferencia' => $caja->ventas_transferencia,'efectivoS'=> $caja->salidas_efectivo,'tarjetaS' => $caja->salidas_tarjeta,'transferenciaS' => $caja->salidas_transferencia,'total'=>$caja->total]);
            //ancho de la página [0,0,1,0]
            $pdf->setPaper(array(0,0,300.00,430.00), 'portrait');
            $path = 'public/reportes/r'.$caja_id.$date.'.pdf';
            $pathSave = Storage::put($path, $pdf->output());

        }else{

            $pagos = Pagos::whereDate('created_at',Date('Y-m-d', strtotime($dateRequest)))->where("clinica_id",$clinic_id)->where("caja_id",$caja_id)->get();

            $pdf = \PDF::loadView('report-view-global',['doctor'=> $doctor,'caja_id'=>$caja_id,'apertura'=>$caja->apertura,'entradas' => $caja->entradas,'salidas'=> $caja->salidas,'efectivo'=> $caja->ventas_efectivo,'tarjeta' => $caja->ventas_tarjeta,'transferencia' => $caja->ventas_transferencia,'efectivoS'=> $caja->salidas_efectivo,'tarjetaS' => $caja->salidas_tarjeta,'transferenciaS' => $caja->salidas_transferencia,'total'=>$caja->total,'pagos'=>$pagos,'fecha_ini'=>"",'fecha_fin'=>""]);
            //ancho de la página [0,0,1,0]
            $pdf->setPaper("A4", 'portrait');
            $path = 'public/reportes/r'.$caja_id.$date.'.pdf';
            $pathSave = Storage::put($path, $pdf->output());
           
        }
        $request = [
            'pdf' => "/storage/reportes/r".$caja_id.$date.".pdf",
            'date' => $dateRequest
        ];
        return $request;
    }

    public function make_report_date(){
        $doctor_id = auth()->user("doctors")->id;
        $doctor = Doctor::where('id',$doctor_id)->with(['clinicas'])->get()[0];

        $clinica_id = request()->clinic_id;
        $date = Date("dmy");    
        //se obtiene la fecha por dia, mes y año
        $dateIniArray = explode('/', request()->fecha_ini);
        $dayIni = $dateIniArray[0];
        $monthIni = $dateIniArray[1];
        $yearIni = $dateIniArray[2];
        $dateFinArray = explode('/', request()->fecha_fin);
        $dayFin = $dateFinArray[0];
        $monthFin = $dateFinArray[1];
        $yearFin = $dateFinArray[2];

        $dayF = intval($dayFin) + 1;

        $fecha_ini = date($yearIni.'-'.$monthIni.'-'.$dayIni);
        $fecha_fin = date($yearFin.'-'.$monthFin.'-'.$dayF);
        //se obtienen los movimientos entre las fechas seleccionadas
        $pagos = Pagos::whereBetween('created_at',[$fecha_ini,$fecha_fin])->where("clinica_id",$clinica_id)->get();
        //se obtienen los totales de las cajas entre las fechas
        $cajas = Caja::whereBetween('created_at',[$fecha_ini,$fecha_fin])->where("clinica_id",$clinica_id)->get();

        $apertura = Caja::whereBetween('created_at',[$fecha_ini,$fecha_fin])->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("abierta","0")->sum("apertura");

        $entradas = Caja::whereBetween('created_at',[$fecha_ini,$fecha_fin])->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("abierta","0")->sum("entradas");

        $salidas = Caja::whereBetween('created_at',[$fecha_ini,$fecha_fin])->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("abierta","0")->sum("salidas");

        $ventas_efectivo = Caja::whereBetween('created_at',[$fecha_ini,$fecha_fin])->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("abierta","0")->sum("ventas_efectivo");

        $ventas_tarjeta = Caja::whereBetween('created_at',[$fecha_ini,$fecha_fin])->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("abierta","0")->sum("ventas_tarjeta");

        $ventas_transferencia = Caja::whereBetween('created_at',[$fecha_ini,$fecha_fin])->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("abierta","0")->sum("ventas_transferencia");

        $salidas_efectivo = Caja::whereBetween('created_at',[$fecha_ini,$fecha_fin])->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("abierta","0")->sum("salidas_efectivo");

        $salidas_tarjeta = Caja::whereBetween('created_at',[$fecha_ini,$fecha_fin])->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("abierta","0")->sum("salidas_tarjeta");

        $salidas_transferencia = Caja::whereBetween('created_at',[$fecha_ini,$fecha_fin])->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("abierta","0")->sum("salidas_transferencia");

        $total = Caja::whereBetween('created_at',[$fecha_ini,$fecha_fin])->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("abierta","0")->sum("total");
        //se obtienen las cajas que se cerraron entre las fechas
        $cajas = Caja::whereBetween('created_at',[$fecha_ini,$fecha_fin])->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("abierta","0")->get();

        $pdf = \PDF::loadView('report-view-global',['doctor'=> $doctor,'caja_id'=>"-",'apertura'=>$apertura,'entradas' => $entradas,'salidas'=> $salidas,'efectivo'=> $ventas_efectivo,'tarjeta' => $ventas_tarjeta,'transferencia' => $ventas_transferencia,'efectivoS'=> $salidas_efectivo,'tarjetaS' => $salidas_tarjeta,'transferenciaS' => $salidas_transferencia,'total'=>$total,'pagos'=>$pagos,'cajas'=>$cajas,'fecha_ini'=>request()->fecha_ini,'fecha_fin'=>request()->fecha_fin]);
        //ancho de la página [0,0,1,0]
        $pdf->setPaper("A4", 'portrait');
        $path = 'public/reportesfecha/r'.$doctor_id.$date.'.pdf';
        $pathSave = Storage::put($path, $pdf->output());
           
        $request = [
            'pdf' => "/storage/reportesfecha/r".$doctor_id.$date.".pdf"
        ];
        return $request;
    }

    public function clinics(){

        $clinicas = auth()->user("doctors")->clinicas()->orderBy("id")->get();
        return view('doctors.clinicas',['clinicas' => $clinicas]);
        
    }

    public function new_clinic(){

       $doctor = Doctor::findOrFail(auth()->user("doctors")->id); 

        return view('doctors.new_clinic',['doctor' => $doctor]);
        
    }

    public function store_new_clinic(Request $request){
       $datosClinicastep2 = request()->except("_token");
       $id_dr = $datosClinicastep2['id'];

       
        $clinica_nombre = Funciones::eliminar_acentos($datosClinicastep2['nombre_consultorio']);
    
        if ($request->hasFile("logotipo")){
            
            $datosClinicastep2['logotipo'] = $request->file("logotipo")->storeAs("public","clinica_logos/logotipo_". $clinica_nombre .date('dmy') .".png");

            $datosClinicastep2['logotipo'] = "clinica_logos/logotipo_". $clinica_nombre .date('dmy') .".png";

            $logotipo_base64 = base64_encode(file_get_contents($request->file('logotipo')->pat‌​h()));

            $datosClinicastep2['logotipo_base64'] = $logotipo_base64;

        } 
        $datosClinicastep2['activa'] = "0";
        //se crea la clinica
        $clinica = Clinica::create($datosClinicastep2);
       
       //se busca al DR
       $doctor = Doctor::findOrFail($id_dr);

       //se guarda la relacion entre Dr y Clinica
       $clinica->doctors()->save($doctor);

       return redirect()->route('clinicas')->with(['msj' => $clinica]);

    }

    public function reports(){
        $pacientes = Auth::user()->pacientes()->get();

        return view('doctors.reportes',['pacientes'=>$pacientes]);
        
    }

    public function make_report_diario(){

        $doctor_id = auth()->user("doctors")->id;
        $doctor = Doctor::where('id',$doctor_id)->with(['clinicas'])->get()[0];
        $dateRequest = request()->date_diario;
        $date = Date("dmy");    

        $consultasR = ConsultaRapida::whereDate('created_at',Date('Y-m-d', strtotime($dateRequest)))->where('doctor_id',$doctor_id)->get();

        $pdf = \PDF::loadView('report-view-diario',['doctor'=> $doctor,'fecha'=> $dateRequest,'consultasRs'=> $consultasR]);
        //ancho de la página [0,0,1,0]
        $pdf->setPaper("A4", 'portrait');
        $path = 'public/reportesdiario/d'.$doctor_id.'/r'.$date.'.pdf';
        $pathSave = Storage::put($path, $pdf->output());
           
        $request = [
            'pdf' => "/storage/reportesdiario/d".$doctor_id."/r".$date.".pdf"
        ];
        return $request;
    }

    public function make_report_resumen(){

        $doctor_id = auth()->user("doctors")->id;
        $doctor = Doctor::where('id',$doctor_id)->with(['clinicas'])->get()[0];
        $paciente_id = request()->paciente_id;
        $date = Date("dmy");    
        
        $paciente = Paciente::where('id',$paciente_id)->with(['historial','vacunas','medis','alergias'])->get()[0];

        $pdf = \PDF::loadView('report-view-resumen',['doctor'=> $doctor,'paciente'=> $paciente]);
        //ancho de la página [0,0,1,0]
        $pdf->setPaper("A4", 'portrait');
        $path = 'public/reportesresumen/d'.$doctor_id.'/r'.$date.'.pdf';
        $pathSave = Storage::put($path, $pdf->output());
           
        $request = [
            'pdf' => "/storage/reportesresumen/d".$doctor_id."/r".$date.".pdf"
        ];
        return $request;
    }

    public function make_report_suive(){

        /* $doctor_id = auth()->user("doctors")->id;
        $doctor = Doctor::where('id',$doctor_id)->with(['clinicas'])->get()[0];
        $paciente_id = request()->paciente_id;
        $date = Date("dmy");    
        
        $paciente = Paciente::where('id',$paciente_id)->with(['historial','vacunas','medis','alergias'])->get()[0];

        $pdf = \PDF::loadView('report-view-resumen',['doctor'=> $doctor,'paciente'=> $paciente]);
        //ancho de la página [0,0,1,0]
        $pdf->setPaper("A4", 'portrait');
        $path = 'public/reportesresumen/d'.$doctor_id.'/r'.$date.'.pdf';
        $pathSave = Storage::put($path, $pdf->output());
           
        $request = [
            'pdf' => "/storage/reportesresumen/d".$doctor_id."/r".$date.".pdf"
        ];
        return $request; */

        $path  = "excel/suive.xlsx";
        $date_ini = request()->date_ini;
        $date_fin = request()->date_fin;

        Excel::store(new DiagnosticsExport($date_ini,$date_fin), $path ,'public');

        $request = [
            'excel' => "storage/".$path
        ];
        return $request; 
    }

 
}
