<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cajas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('clinica_id');
            $table->string('apertura')->nullable();
            $table->string('entradas')->nullable();
            $table->string('salidas')->nullable();
            $table->string('ventas_efectivo')->nullable();
            $table->string('ventas_tarjeta')->nullable();
            $table->string('ventas_transferencia')->nullable();
            $table->string('total')->nullable();
            $table->string('abierta')->nullable();

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
        Schema::dropIfExists('cajas');
    }
}
