<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    protected $fillable = ['clinica_id','doctor_id','apertura','abierta'];
}
