<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $fillable = [
        'nombre','imagen',
    ];

    public function doctors(){
        return $this->belongsToMany(Doctor::class,'doctor_has_especialidad');
    }
}
