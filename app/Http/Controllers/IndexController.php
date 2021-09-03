<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Doctor;
use App\Especialidad;


class IndexController extends Controller
{

    public function index(){
        $doctors = DB::table('doctors')
            
            ->join('doctor_has_especialidad', 'doctors.id', '=', 'doctor_has_especialidad.doctor_id')
            ->join('especialidads', 'doctor_has_especialidad.especialidad_id', '=', 'especialidads.id')
            ->select('doctors.id','doctors.nombre','doctors.apellido_p','doctors.apellido_m','doctors.estado','doctors.created_at','doctors.status','doctors.foto','especialidads.nombre as espe')
            ->get();

            return view('index-6',compact('doctors'));
    }

    public function booking($doctor){

        $dr = Doctor::findOrFail($doctor);

        return view('booking',compact('dr'));
    }
}
