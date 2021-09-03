<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("apellido_p");
            $table->string("apellido_m")->nullable();
            $table->string("email")->unique();
            $table->string("telefono")->nullable();
            $table->string("direccion")->nullable();
            $table->string("password");
            $table->string("foto")->nullable();
            $table->string("sexo")->nullable();
            $table->string("is_embarazada")->nullable();
            $table->string("meses_embarazada")->nullable();
            $table->string("tipo_sangre")->nullable();
            $table->string("ritmo_cardiaco")->nullable();
            $table->string("presion_sanguinea")->nullable();
            $table->string("glucosa")->nullable();
            $table->string("alergias")->nullable();
            $table->string("toma_medi")->nullable();
            $table->string("medicamentos")->nullable();
            $table->string("dosis")->nullable();
            $table->string("casado")->nullable();
            $table->string("ninos")->nullable();
            $table->string("madre")->nullable();
            $table->string("padre")->nullable();
            $table->string("estado")->nullable();
            $table->string("ciudad")->nullable();
            $table->string("fecha_nacimiento")->nullable();
            $table->string("curp")->nullable();
            $table->string("calle")->nullable();
            $table->string("colonia")->nullable();
            $table->string("cp")->nullable();
            $table->string("recordatorio")->nullable();
            $table->string("correo_bienvenida")->nullable();
            $table->string("status")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
