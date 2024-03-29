<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('motivo_consulta_id');
            $table->unsignedBigInteger('diagnostico_id');
            $table->string('cobro')->nullable();
            $table->string('costo_consulta')->nullable();
            $table->string('costo_extra')->nullable();
            $table->string('motivo_extra')->nullable();
            $table->string('receta')->nullable();
            $table->string('recibo')->nullable();
            $table->string('pagado')->nullable();

            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('motivo_consulta_id')->references('id')->on('motivo_consultas')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('diagnostico_id')->references('id')->on('diagnostics')->onDelete('restrict')->onUpdate('cascade');

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
        Schema::dropIfExists('consultas');
    }
}
