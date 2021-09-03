<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinica extends Model
{
    protected $fillable = [
        'nombre_organizacion','tipo_organizacion','no_medicos','tel_organizacion','nombre_consultorio','logotipo','pais_consultorio','estado_consultorio','ciudad_consultorio','colonia_consultorio','calle_consultorio','cp_consultorio','tel_consultorio'
    ];

    public function doctors(){
        return $this->belongsToMany(Doctor::class,'doctors_has_clinicas');
    }
}
