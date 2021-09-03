<?php

namespace App\Http\Controllers;

use App\cr;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->get();
        return view('admin.users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
    
    public function register()
    {
        return view('admin.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')){

            $datosUser = request()->except("_token");
        
            $datosUser = request()->validate([
                'email' => ['required','email','unique:users,email'],
                'nombre' => 'required',
                'password' => 'required',
                'password_confirm' => 'required|required_with:password|same:password',
            ],[
                'email.unique' => 'Este correo ya se encuentra registrado',
                'password_confirm.same' => 'Las contraseñas deben de coincidir.'
            ]);
            
            $datosUser['created_at'] = date('Y-m-d H:i:s');
            $datosUser['password'] = bcrypt($datosUser['password']);
            
            unset($datosUser['password_confirm']);
    
            $u = User::create([
                'nombre' => $datosUser['nombre'],
                'email' => $datosUser['email'],
                'password' => $datosUser['password'],
                'created_at' => $datosUser['created_at'],
            ]);
            
            $id_role = DB::table('roles')->select('id')->where('name', '=', 'Admin')->first();

            $id = User::latest('id')->first();
            $user = User::findOrFail($id)->first();

            
            $msj += "Registro éxitoso, ahora ingresa con tus datos que acabas de registrar";
             
            return redirect()->route('login')->with(["msj" => $msj]);

        }else {
            return redirect()->route('index-admin');
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy(cr $cr)
    {
        //
    }
}
