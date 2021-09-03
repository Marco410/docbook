<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacuna extends Model
{
    protected $fillable = [
        'vacuna'
    ];
    public function pacientes(){
        return $this->belongsToMany(Paciente::class,'pacientes_has_alergias');
    }
}
