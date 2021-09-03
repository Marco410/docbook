<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecialidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nombre");
            $table->string("imagen");
            $table->timestamps();
        });

        Schema::create('doctor_has_especialidad', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('especialidad_id');
            $table->unsignedBigInteger('doctor_id');

            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('restrict')->onUpdate('cascade');

            $table->foreign('especialidad_id')->references('id')->on('especialidads')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('especialidads');
        Schema::dropIfExists('doctor_has_especialidad');
    }
}
