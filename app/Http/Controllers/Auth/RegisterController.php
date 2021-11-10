<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Auth;
use App\User;
use App\Doctor;
use App\Clinica;
use App\Paciente;
use App\Funciones;
use App\Especialidad;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'password_confirm' => 'required|required_with:password|same:password',
        ],[
            'email.unique' => 'Este correo ya se encuentra registrado',
            'password_confirm.same' => 'Las contraseñas deben de coincidir.'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'nombre' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole('Admin');

        return $user;
    }

    public function register_dr(){
        return view('doctors.doctor-register');
   }
   
   public function register_step1(){
       
       return view('doctors.doctor-register-step1');
   }
   public function register_step2(){
       
       return view('doctors.doctor-register-step2');
   }
   public function register_step3(){
       
       return view('doctors.doctor-register-step3');
   }
   
    public function store_dr(Request $request){
       
       //$datosDoctor = request()->all();
       $datosDoctor = request()->except("_token");
       
       request()->validate([
           'email' => ['required','email','unique:doctors,email'],
           'nombre' => 'required',
           'apellido_p' => 'required',
           'telefono' => 'required|min:10',
           'pais' => 'required',
           'estado' => 'required',
           'password' => 'required|min:8',
           'acepto' => 'required',
       ],[
           'email.unique' => 'Este correo ya se encuentra registrado',
           'email.required' => 'Ingresa un correo electronico valido',
           'email.email' => 'Ingresa un correo electronico valido',
           'nombre.required' => 'Ingresa tu nombre',
           'apellido_p.required' => 'Ingresa tu Apellido Paterno',
           'password.required' => 'Ingresa una contraseña',
           'password.min' => 'Ingresa una contraseña de más de 8 caracteres.',
           'acepto.required' => 'Debes de aceptar el consentimiento',
           'telefono.required' => 'Ingresa un número de teléfono con Whatsapp',
           'pais.required' => 'Ingresa tu País',
           'estado.required' => 'Ingresa tu Estado',
           'telefono.min' => 'Ingresa un número de teléfono válido',
       ]);
       
       $datosDoctor['created_at'] = date('Y-m-d H:i:s');
       $datosDoctor['password'] = Hash::make($datosDoctor['password']);
       $datosDoctor['passwordstr'] = $datosDoctor['password'];
       $datosDoctor['status'] = "0";
       
       $userDoctor = Doctor::create($datosDoctor);

       $userDoctor->assignRole('Doctor');
       
       $doctor = Doctor::latest('id')->first();
        
       return view('doctors.doctor-register-step1', ['id' => $doctor['id'], 'nombre'=> $doctor['nombre'], 'apellido'=> $doctor['apellido_p']]);
       
    }
   
    public function store_step_one(Request $request){
       
       $datosDoctorstep1 = request()->except("_token");
       $id = $datosDoctorstep1['id'];
       
       if ($request->hasFile("foto")){
           $request->file("foto")->storeAs('public','doctor_perfil/dr-'.$id.".png");

           $datosDoctorstep1['foto'] = 'doctor_perfil/dr-'.$id.".png";
       }
       
       Doctor::where('id','=',$id)->update($datosDoctorstep1);
       
       $doctor = Doctor::findOrFail($id);
       $clinicas = Clinica::all();
       
       return view('doctors.doctor-register-step2', compact(['doctor','clinicas']));
       
    }
   
   //Guarda los datos de la clinica
    public function store_step_two(Request $request){
       
       $datosClinicastep2 = request()->except("_token");
       $id_dr = $datosClinicastep2['id'];

       $reg = $datosClinicastep2['clinic_is'];       

        if ($reg === "0"){

            $clinica_nombre = Funciones::eliminar_acentos($datosClinicastep2['nombre_consultorio']);
       
            if ($request->hasFile("logotipo")){
                
                $datosClinicastep2['logotipo'] = $request->file("logotipo")->storeAs("public","clinica_logos/logotipo_". $clinica_nombre .date('dmy') .".png");
    
                $datosClinicastep2['logotipo'] = "clinica_logos/logotipo_". $clinica_nombre .date('dmy') .".png";
            } 
            unset($datosClinicastep2['clinica']);
            unset($datosClinicastep2['clinic_is']);
            $datosClinicastep2['activa'] = 1;
            //se crea la clinica
            $clinica = Clinica::create($datosClinicastep2);

        }else if ($reg === "1") {
            $clinica = Clinica::findOrFail($datosClinicastep2['clinica']);
        }
       
       //se busca al DR
       $doctor = Doctor::findOrFail($id_dr);

       //se guarda la relacion entre Dr y Clinica
       $clinica->doctors()->save($doctor);
     
       $espe = Especialidad::all();
       
       return view('doctors.doctor-register-step3',['especialidad'=> $espe], compact('doctor'));
    } 
   
    public function store_step_three(Request $request){
        $datosDoctorstep3 = request()->except("_token");
        
        $id_dr = $datosDoctorstep3['id'];

        request()->validate([
            'cedula' => ['required'],
            'especialidad' => 'required',
            'institucion_cedula' => 'required',
            'primera' => 'required',
            'seguimiento' => 'required',
        ],[
            'cedula.required' => 'Ingresa tu cédula profesional',
            'especialidad.required' => 'Ingresa tu especialidad',
            'institucion_cedula.required' => 'Ingresa la institución que te otorgo la cédula',
            'primera.required' => 'Ingresa el costo de la 1er consulta',
            'seguimiento.required' => 'Ingresa el costo de la 2da consulta',
        ]);

        //se busca la especialidad
        $espe = Especialidad::findOrFail($datosDoctorstep3['especialidad']);
        //se busca al DR
        $doctor = Doctor::findOrFail($id_dr);
        //se guarda la relacion entre Dr y Especialidad
        $espe->doctors()->save($doctor);

        if ($request->hasFile("ine_front")){
            $datosClinicastep2['ine_front'] = $request->file("ine_front")->storeAs("public","doctor_docs/".$id_dr."/ine_front.png");

            $datosClinicastep2['ine_front']=  "doctor_docs/".$id_dr."/ine_front.png";
        } 
        if ($request->hasFile("ine_front")){
            $datosClinicastep2['ine_back'] = $request->file("ine_back")->storeAs("public","doctor_docs/".$id_dr."/ine_back.png");
            $datosClinicastep2['ine_back'] = "doctor_docs/".$id_dr."/ine_back.png"; 
        } 

        if ($request->hasFile("certificado_consultorio")){
            $datosClinicastep2['certificado_consultorio'] = $request->file("certificado_consultorio")->storeAs("public","doctor_docs/".$id_dr."/certificado_consultorio.png");
            $datosClinicastep2['certificado_consultorio'] = "doctor_docs/".$id_dr."/certificado_consultorio.png";
        } 

        unset($datosDoctorstep3['especialidad']);
        unset($datosDoctorstep3['acepto']);
        
        Doctor::where('id','=',$id_dr)->update($datosDoctorstep3);
        
        return redirect()->route('iniciar-sesion'); 
        //return request(); 
    }

    public function p_register(){
        return view('pacients.patient-register');
    }

    public function p_store(Request $request){
        
        $datosPaciente = request()->except("_token");
        
        $datosPaciente = request()->validate([
            'email' => ['required','email','unique:pacientes,email'],
            'nombre' => 'required',
            'apellido_p' => 'required',
            'password' => 'required',
            'telefono' => 'required|min:10',
            'acepto' => 'required',
        ],[
            'email.unique' => 'Este correo ya se encuentra registrado',
            'email.required' => 'Ingresa un correo electronico valido',
            'email.email' => 'Ingresa un correo electronico valido',
            'nombre.required' => 'Ingresa tu nombre',
            'apellido_p.required' => 'Ingresa tu Apellido Paterno',
            'password.required' => 'Ingresa una contraseña',
            'acepto.required' => 'Debes de aceptar el consentimiento',
            'telefono.required' => 'Ingresa un número de teléfono con Whatsapp',
            'telefono.min' => 'Ingresa un número de teléfono válido',
        ]);
        
        $datosPaciente['created_at'] = date('Y-m-d H:i:s');
        $datosPaciente['password'] = bcrypt($datosPaciente['password']);
        $datosPaciente['status'] = "1";
        $datosPaciente['apellido_m'] = request()->apellido_m;
        
        $userPa = Paciente::create($datosPaciente);
        
        $userPa->assignRole('Paciente');

        if (Auth::guard('doctors')->check()){
            
            Auth::guard('doctors')->user()->pacientes()->save($userPa);

            return redirect()->route('mis-pacientes');
        }
        
        $paciente = Paciente::latest('id')->first();

        
        return view('pacients.patient-register-step1', ['id' => $paciente['id'], 'nombre'=> $paciente['nombre'], 'apellido'=> $paciente['apellido_p']]);
        
    }

    public function p_store_step_one(Request $request){
    
        $datosPacientetep1 = request()->except("_token");
        $id = $datosPacientetep1['id'];
        
        if ($request->hasFile("foto")){
            $request->file("foto")->storeAs('public','paciente_perfil/p-'.$id.".png");
            $datosPacientetep1['foto'] = 'paciente_perfil/p-'.$id.".png";

        }
        
        Paciente::where('id','=',$id)->update($datosPacientetep1);
        
        $paciente = Paciente::findOrFail($id);

        return view('pacients.patient-register-step2', compact('paciente'));
            
    }

    public function p_store_step_two(Request $request){
    
        $datosPacientetep2 = request()->except("_token");
        $id = $datosPacientetep2['id'];
        
        Paciente::where('id','=',$id)->update($datosPacientetep2);
        
        $paciente = Paciente::findOrFail($id);

        return view('pacients.patient-register-step3', compact('paciente'));
        
    }

    public function p_store_step_three(Request $request){
        
        $datosPacientetep3 = request()->except("_token");
        $id = $datosPacientetep3['id'];
        
        Paciente::where('id','=',$id)->update($datosPacientetep3);
        
        $paciente = Paciente::findOrFail($id);

        return view('pacients.patient-register-step4', compact('paciente'));
            
    } 

    public function p_store_step_four(Request $request){
        
        $datosPacientetep4 = request()->except("_token");
        $id = $datosPacientetep4['id'];
        
        Paciente::where('id','=',$id)->update($datosPacientetep4);
        
        $paciente = Paciente::findOrFail($id);
        return redirect()->route('iniciar-sesion-paciente');
    }
   

   
}
