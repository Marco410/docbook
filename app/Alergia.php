<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alergia extends Model
{
    protected $fillable = [
        'alergia'
    ];

    public function pacientes(){
        return $this->belongsToMany(Paciente::class,'pacientes_has_alergias');
    }
}
