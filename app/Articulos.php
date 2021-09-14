<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulos extends Model
{
    protected $fillable = [
        'articulo','cantidad','descripcion','clinica_id'
    ];

    public function clinica(){
        return $this->hasOne(Clinica::class);
    }
}
