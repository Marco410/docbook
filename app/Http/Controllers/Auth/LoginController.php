<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Doctor;
use App\Paciente;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function login_dr(Request $request)
    {

        $datosDoctor = request()->only('email','password');

        $datosDoctor = request()->validate([
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ],[
            'email.failed' => 'Correo no encontrado',
        ]);

        $doctor = DB::table('doctors')->where('email',$datosDoctor['email'])->first();

        if($doctor){

            if(Hash::check($datosDoctor['password'], $doctor->password))
            {
                Auth::guard('doctors')->loginUsingId($doctor->id);
    
                //return Auth::guard('doctors')->user();
                return redirect()->route('doctor-inicio');

            }else{
                return view('login')->with(['errorL'=>'La contraseña es incorrecta'])->with(['route'=>'login-dr','tipo' => 'Doctor']);
            }

        }else{
            return view('login')->with(['errorL'=>'Esta cuenta de correo no esta registrada'])->with(['route'=>'login-dr','tipo' => 'Doctor']);
        }

      
        /*

        if(Auth::attempt($datosDoctor)){
            return "Inicio";
        }else{
            return "No inicio sesion";
        }*/

        

        /*if (Auth::guard('doctors')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $msj = "";
            if(Auth::check()){
                $msj = "Se inicio la sesion";
                return redirect()->route('doctor-inicio')->with(["msj" => $msj ]);
            }else{
                $msj = "No se inicio la sesion";
                return redirect()->route('doctor-inicio')->with(["msj" => $msj ]);
            }
           
        }*/
    }

    public function login_pa(Request $request)
    {

        $datosPaciente = request()->only('email','password');

        $datosPaciente = request()->validate([
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ],[
            'email.failed' => 'Correo no encontrado',
        ]);

        $paciente = DB::table('pacientes')->where('email',$datosPaciente['email'])->first();

        if($paciente){

            if(Hash::check($datosPaciente['password'], $paciente->password))
            {
                Auth::guard('pacientes')->loginUsingId($paciente->id);
    
                //return Auth::guard('patients')->user();
                return redirect()->route('paciente-inicio');

            }else{
                return view('login')->with(['errorL'=>'La contraseña es incorrecta'])->with(['route'=>'login-paciente','tipo' => 'Paciente']);
            }

        }else{
            return view('login')->with(['errorL'=>'Esta cuenta de correo no esta registrada'])->with(['route'=>'login-paciente','tipo' => 'Paciente']);
        }
    }

  
}
