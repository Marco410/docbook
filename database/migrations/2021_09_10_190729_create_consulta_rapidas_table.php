<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultaRapidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulta_rapidas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('motivo_consulta_id');
            $table->unsignedBigInteger('diagnostico_id');
            $table->text('notas_consulta_rapida')->nullable();


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
        Schema::dropIfExists('consulta_rapidas');
    }
}
