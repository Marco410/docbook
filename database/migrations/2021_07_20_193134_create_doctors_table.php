<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nombre");
            $table->string("apellido_p");
            $table->string("apellido_m")->nullable();
            $table->string("email")->unique();
            $table->string("password");
            $table->string("telefono")->nullable();
            $table->string("pais")->nullable();
            $table->string("estado")->nullable();
            $table->string("foto")->nullable();
            $table->string("sexo")->nullable();

            $table->string("primera")->nullable();
            $table->string("seguimiento")->nullable();

            /* $table->string("nombre_organizacion")->nullable();
            $table->string("tipo_organizacion")->nullable();
            $table->string("no_medicos")->nullable();
            $table->string("tel_organizacion")->nullable();
            $table->string("nombre_consultorio")->nullable();
            $table->string("logotipo")->nullable();
            $table->string("pais_consultorio")->nullable();
            $table->string("estado_consultorio")->nullable();
            $table->string("ciudad_consultorio")->nullable();
            $table->string("calle_consultorio")->nullable();
            $table->string("colonia_consultorio")->nullable();
            $table->string("cp_consultorio")->nullable();
            $table->string("tel_consultorio")->nullable(); */

            $table->string("cedula")->nullable();
            $table->string("institucion_cedula")->nullable();
            $table->string("ine_front")->nullable();
            $table->string("ine_back")->nullable();
            $table->string("certificado_consultorio")->nullable();
            $table->string("status")->nullable();
            
            $table->rememberToken();
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
        Schema::dropIfExists('doctors');
    }
}
