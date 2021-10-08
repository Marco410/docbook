<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotivoConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motivo_consultas', function (Blueprint $table) {
            $table->id();
            $table->string("motivo")->nullable();
            $table->unsignedBigInteger('especialidad_id');
            $table->timestamps();

            $table->foreign('especialidad_id')->references('id')->on('especialidads')->onDelete('restrict')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motivo_consultas');
    }
}
