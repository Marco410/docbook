<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DateTime;

class Paciente extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    protected $guard = 'pacientes';


    protected $fillable = [
        'nombre', 'email', 'password',
        'apellido_p', 'apellido_m','status','telefono','sexo','fecha_nacimiento','tipo_sangre','curp','calle','colonia','cp','ciudad','estado','recordatorio','correo_bienvenida','nombre_familiar','telefono_familiar','seguro_social','nacionalidad','empleo'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function get_edad(){

        list($ano,$mes,$dia) = explode("-",$this->fecha_nacimiento);
        $ano_diferencia = date("Y") - $ano;
        $mes_diferencia = date("m") - $mes;
        $dia_diferencia = date("d") - $dia;
        if ($dia_diferencia < 0 && $mes_diferencia <= 0)
        $ano_diferencia--;
        return $ano_diferencia;
    }

    public function historial(){
        return $this->hasMany(Historial::class,'paciente_id');
    }

    public function alergias(){
        return $this->belongsToMany(Alergia::class,'pacientes_has_alergias');
    }

    public function vacunas(){
        return $this->belongsToMany(Vacuna::class,'pacientes_has_vacunas');
    }

    public function medis(){
        return $this->belongsToMany(Medicamento::class,'pacientes_has_medis');
    }

    public function doctors(){
        return $this->belongsToMany(Doctor::class,'pacientes_has_doctors');
    }

    
    
}
