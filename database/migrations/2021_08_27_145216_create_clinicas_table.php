<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinicas', function (Blueprint $table) {
            $table->id();

            $table->string("nombre_organizacion")->nullable();
            $table->string("tipo_organizacion")->nullable();
            $table->string("no_medicos")->nullable();
            $table->string("tel_organizacion")->nullable();
            $table->string("nombre_consultorio")->nullable();
            $table->string("logotipo")->nullable();
            $table->string("pais_consultorio")->nullable();
            $table->string("estado_consultorio")->nullable();
            $table->string("ciudad_consultorio")->nullable();
            $table->string("colonia_consultorio")->nullable();
            $table->string("calle_consultorio")->nullable();
            $table->string("cp_consultorio")->nullable();
            $table->string("tel_consultorio")->nullable();

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
        Schema::dropIfExists('clinicas');
    }
}
