<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $fillable = [
        'paciente_id'
    ];
    
    public function paciente(){
        
        return $this->hasOne(Paciente::class);
    }
}
