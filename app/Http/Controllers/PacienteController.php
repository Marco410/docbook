<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use App\Paciente;

class PacienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:pacientes');
    }

    
    public function index()
    {
        //
    }

    
    public function create()
    {
        //
    }

   
   

    public function paciente_dashboard(){
        
        return view('pacients.patient-dashboard');
    }
    

    public function show(Paciente $paciente)
    {
        //
    }

    
    public function edit(Paciente $paciente)
    {
        //
    }

    public function update(Request $request, Paciente $paciente)
    {
        //
    }

    public function destroy(Paciente $paciente)
    {
        //
    }
}
