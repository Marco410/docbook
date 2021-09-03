<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
     protected $fillable = [
        'medicamento'
    ];

    public function pacientes(){
        return $this->belongsToMany(Paciente::class,'pacientes_has_medis');
    }
}
