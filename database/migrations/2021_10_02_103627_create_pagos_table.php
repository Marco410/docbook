<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('clinica_id');
            $table->string('tipo_movimiento')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('importe')->nullable();
            $table->string('observaciones')->nullable();
            $table->timestamps();

            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('clinica_id')->references('id')->on('clinicas')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
