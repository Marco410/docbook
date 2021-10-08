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
        $clinicas = auth()->user("doctors")->clinicas()->orderBy("activa","desc")->get();
        return view('doctors.doctor-dashboard',['clinicas' => $clinicas]);
    }

    public function change_clinic(){
        Clinica::where("activa","1")->update(["activa" => "0"]);

        $clinica = Clinica::where("id",request()->change_clinica)->update(["activa"=>"1"]);

        return redirect()->route('doctor-inicio')->with('storeN','Correcto');
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
        $clinica_id = auth()->user("doctors")->clinicas->where('activa',1)->first()->id;
        $doctor_id = auth()->user("doctors")->get()[0]->id;

        $paciente_id = request()->paciente_id;
        $id_consulta = request()->id_consulta_rapida;
        $cobro = request()->total;
        $costo_consulta = request()->costo_consulta;
        $extra = request()->extra;
        $motivo_extra = request()->motivo_extra;
        $metodo = request()->metodo;

        
        $paciente = Paciente::where('id',$paciente_id)->get()[0];
        $doctor = Doctor::where('id',auth()->user("doctors")->get()[0]->id)->with(['clinicas'])->get()[0];
        $consulta = ConsultaRapida::where('id',$id_consulta)->get();
        
        
        $pdf = \PDF::loadView('ticket-view',['doctor'=> $doctor,'paciente'=>$paciente,'cobro'=>$cobro,'extra' => $extra,'motivo_extra'=> $motivo_extra,'costo_consulta'=> $costo_consulta,'id_consulta' => $id_consulta]);
        //ancho de la página [0,0,1,0]
        $pdf->setPaper(array(0,0,450.00,800.00), 'portrait');
        $date = Date("dmys");
        $path = 'public/recibos/p'.$paciente_id.'/r-'.$date.'.pdf';
        $pathSave = Storage::put($path, $pdf->output());

        $cr = ConsultaRapida::where('id',$id_consulta)->update([
            'cobro' => $cobro,
            'motivo_extra' => $motivo_extra,
            'recibo' => "/storage/recibos/p".$paciente_id."/r-".$date.".pdf",
            'pagado' => "1"
        ]);

        if($cr){
            $pago = Pagos::create([
                'clinica_id' => $clinica_id,
                'doctor_id' => $doctor_id,
                'tipo_movimiento' => "Entrada",
                'descripcion' => "Consulta Rápida",
                'importe' => $cobro,
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
        $doctor_id = auth()->user("doctors")->get()[0]->id;

        $pagos = Pagos::where('doctor_id',$doctor_id)->where("clinica_id",$clinica_id)->orderBy('id','desc')->get();
        $pagosH = Pagos::where('doctor_id',$doctor_id)->where("clinica_id",$clinica_id)->whereDay('created_at',Date("d"))->get();
        return view('doctors.pago')->with(['pagos' => $pagos,'pagosH'=>$pagosH]);
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
            'importe.required' => 'Añade un importe.'
        ]);

        $pago = Pagos::create([
            'clinica_id' => request()->clinica_id,
            'doctor_id' => auth()->user("doctors")->get()[0]->id,
            'tipo_movimiento' => request()->tipo_movimiento,
            'descripcion' => request()->descripcion,
            'importe' => request()->importe,
            'metodo_pago' => request()->metodo_pago,
            'observaciones' => request()->observaciones
        ]);

        return redirect()->route('pagos');
    }

    public function caja(){

        $clinica_id = auth()->user("doctors")->clinicas->where('activa',1)->first()->id;
        $doctor_id = auth()->user("doctors")->get()[0]->id;

        $countCaja = Caja::where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("abierta","1")->get()->count();

        $cajas = Caja::where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->get();

        if ($countCaja >= 1){
            $openCaja = Caja::where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("abierta","1")->get()[0];

            $entradas = Pagos::whereDay('created_at',Date("d"))->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("tipo_movimiento","Entrada")->sum("importe");

            $salidas = Pagos::whereDay('created_at',Date("d"))->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("tipo_movimiento","Salida")->sum("importe");

            $efectivo = Pagos::whereDay('created_at',Date("d"))->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("metodo_pago","Efectivo")->sum("importe");

            $tarjeta = Pagos::whereDay('created_at',Date("d"))->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("metodo_pago","Tarjeta")->sum("importe");

            $transferencia = Pagos::whereDay('created_at',Date("d"))->where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("metodo_pago","Transferencia")->sum("importe");

            $total = ($openCaja->apertura + $entradas) - $salidas;

        }else{
            $openCaja = "";
            $entradas = "";
            $salidas = "";
            $efectivo = "";
            $tarjeta = "";
            $transferencia = "";
            $total = "";
        }
        

        return view('doctors.caja',['openCaja' => $openCaja,'countCaja' => $countCaja,'entradas' => $entradas,'salidas' => $salidas,'efectivo'=>$efectivo,'tarjeta'=> $tarjeta,'transferencia'=>$transferencia,'total'=>$total,"cajas"=>$cajas]);
    }

    public function open_caja(){
        request()->validate([
            'caja_apertura' => 'required'
        ],[
            'caja_apertura.required' => 'Añade un monto para abrir la caja.'
        ]);

        $pago = Caja::create([
            'clinica_id' => auth()->user("doctors")->clinicas->where('activa',1)->first()->id,
            'doctor_id' => auth()->user("doctors")->get()[0]->id,
            'apertura' => request()->caja_apertura,
            'abierta' => 1
        ]);

        return redirect()->route('caja');
    }

    public function close_caja(){
        $doctor_id = auth()->user("doctors")->get()[0]->id;

        $clinica_id = request()->clinic_id;
        $entradas = request()->entradas;
        $salidas = request()->salidas;
        $efectivo = request()->ventas_efectivo;
        $tarjeta = request()->ventas_tarjeta;
        $trans = request()->ventas_transferencia;
        $total = request()->ventas_total;

        $pago = Caja::where("doctor_id",$doctor_id)->where("clinica_id",$clinica_id)->where("abierta","1")->update([
            "entradas" => $entradas,
            "salidas" => $salidas,
            "ventas_efectivo" => $efectivo,
            "ventas_tarjeta" => $tarjeta,
            "ventas_transferencia" => $trans,
            "total" => $total,
            "abierta" => 0
        ]);

        return redirect()->route('caja');
    }

    public function make_report(){

        $doctor = Doctor::where('id',auth()->user("doctors")->get()[0]->id)->with(['clinicas'])->get()[0];

        $caja_id = request()->caja_id;
        $apertura = request()->apertura;
        $entradas = request()->entradas;
        $salidas = request()->salidas;
        $efectivo = request()->ventas_efectivo;
        $tarjeta = request()->ventas_tarjeta;
        $trans = request()->ventas_transferencia;
        $total = request()->ventas_total;

        $pdf = \PDF::loadView('report-view',['doctor'=> $doctor,'caja_id'=>$caja_id,'apertura'=>$apertura,'entradas' => $entradas,'salidas'=> $salidas,'efectivo'=> $efectivo,'tarjeta' => $tarjeta,'transferencia' => $trans,'total'=>$total]);
        //ancho de la página [0,0,1,0]
        $pdf->setPaper(array(0,0,350.00,380.00), 'portrait');
        $date = Date("dmy");
        $path = 'public/reportes/r'.$caja_id.$date.'.pdf';
        $pathSave = Storage::put($path, $pdf->output());

        $request = [
            'pdf' => "/storage/reportes/r".$caja_id.$date.".pdf"
        ];
        return $request;
    }

    public function clinics(){

        $clinicas = auth()->user("doctors")->clinicas()->orderBy("id")->get();
        return view('doctors.clinicas',['clinicas' => $clinicas]);
        
    }

    public function new_clinic(){

       $doctor = Doctor::findOrFail(auth()->user("doctors")->get()[0]->id); 

        return view('doctors.new_clinic',['doctor' => $doctor]);
        
    }

    public function store_new_clinic(Request $request){
       $datosClinicastep2 = request()->except("_token");
       $id_dr = $datosClinicastep2['id'];

       
        $clinica_nombre = Funciones::eliminar_acentos($datosClinicastep2['nombre_consultorio']);
    
        if ($request->hasFile("logotipo")){
            
            $datosClinicastep2['logotipo'] = $request->file("logotipo")->storeAs("public","clinica_logos/logotipo_". $clinica_nombre .date('dmy') .".png");

            $datosClinicastep2['logotipo'] = "clinica_logos/logotipo_". $clinica_nombre .date('dmy') .".png";
        } 
        //se crea la clinica
        $clinica = Clinica::create($datosClinicastep2);
       
       //se busca al DR
       $doctor = Doctor::findOrFail($id_dr);

       //se guarda la relacion entre Dr y Clinica
       $clinica->doctors()->save($doctor);

       return redirect()->route('clinicas')->with(['msj' => $clinica]);

    }

    

 
}
