<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostic extends Model
{
    protected $fillable = [
        'cod_3', 'descripcion_3','cod_4','descripcion_4'
    ];
}
