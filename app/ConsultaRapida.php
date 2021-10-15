<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsultaRapida extends Model
{
    protected $fillable = ['paciente_id','doctor_id','motivo_consulta_id','diagnostico_id','diagnostico_str', 'notas_consulta_rapida','pagado','cobro','motivo_extra','receta','recibo'];

    public function doctor(){
        return $this->hasOne(Doctor::class,"id","doctor_id");
    }

    public function diagnostico(){
        return $this->hasOne(Diagnostic::class,"id","diagnostico_id");
    }

    public function motivo(){
        return $this->hasOne(MotivoConsulta::class,"id","motivo_consulta_id");
    }
}
