<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    protected $guard = 'doctors';

    protected $fillable = [
        'nombre', 'email', 'password',
        'apellido_p', 'apellido_m','status','telefono','pais','estado',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pacientes(){
        return $this->belongsToMany(Paciente::class,'pacientes_has_doctors');
    }

    public function clinicas(){
        return $this->belongsToMany(Clinica::class,'doctors_has_clinicas');
    }

    public function especialidad(){
        return $this->belongsToMany(Especialidad::class,'doctor_has_especialidad');
    }
}