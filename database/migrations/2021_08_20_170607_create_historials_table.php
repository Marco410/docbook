<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historials', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->string("notas_internas")->nullable();
            $table->string("estatura")->nullable();
            $table->string("peso")->nullable();
            $table->string("masa_corporal")->nullable();
            $table->string("temperatura")->nullable();
            $table->string("frec_respiratoria")->nullable();
            $table->string("sistolica")->nullable();
            $table->string("diastolica")->nullable();
            $table->string("frec_cardiaca")->nullable();
            $table->string("grasa_corporal")->nullable();
            $table->string("masa_muscular")->nullable();
            $table->string("cefalico")->nullable();
            $table->string("sat_oxigeno")->nullable();
            
            $table->string("alergias_option")->nullable();

            $table->string("hospi")->nullable();
            $table->string("cirugia")->nullable();
            $table->string("diabetes")->nullable();
            $table->string("tiroideas")->nullable();
            $table->string("hipertension")->nullable();
            $table->string("cardio")->nullable();
            $table->string("trauma")->nullable();
            $table->string("cancer")->nullable();
            $table->string("tuberculosis")->nullable();
            $table->string("trans")->nullable();
            $table->string("pato_respiratorias")->nullable();
            $table->string("pato_gastro")->nullable();
            $table->string("sexual")->nullable();
            $table->text("pato_otros")->nullable();

            $table->string("fisica")->nullable();
            $table->string("tabaco")->nullable();
            $table->string("alcohol")->nullable();
            $table->string("sustancias")->nullable();
            $table->string("vacuna_reciente")->nullable();
            $table->text("npato_otros")->nullable();


            $table->string("heredo_diabetes")->nullable();
            $table->string("h_cardio")->nullable();
            $table->string("h_hipertension")->nullable();
            $table->string("h_tiroideas")->nullable();
            $table->text("heredo_otros")->nullable();

            $table->text("historia_familiar")->nullable();
            $table->string("conciencia")->nullable();
            $table->text("psiqui_areas")->nullable();
            $table->text("psiqui_tratamientos")->nullable();
            $table->string("psiqui_apoyo")->nullable();
            $table->text("psiqui_grupo_familiar")->nullable();
            $table->text("psiqui_vida_social")->nullable();
            $table->text("psiqui_vida_laboral")->nullable();
            $table->text("psiqui_autoridad")->nullable();
            $table->text("psiqui_impulsos")->nullable();
            $table->text("psiqui_frustracion")->nullable();

            $table->string("desayuno")->nullable();
            $table->string("colacion")->nullable();
            $table->string("comida")->nullable();
            $table->string("colacion_tarde")->nullable();
            $table->string("cena")->nullable();
            $table->string("alimentos_casa")->nullable();
            $table->string("apetito")->nullable();
            $table->string("hambre")->nullable();
            $table->string("vasos")->nullable();
            $table->text("prefer_alimentos")->nullable();
            $table->string("malestares")->nullable();
            $table->string("complementos")->nullable();
            $table->string("otras_dietas")->nullable();
            $table->string("peso_ideal")->nullable();
            $table->string("padecimiento_peso")->nullable();
            $table->string("antecedentes_peso")->nullable();
            $table->string("consumo_liquidos")->nullable();
            $table->string("educacion_nutri")->nullable();
            $table->text("nutri_otros")->nullable();

            $table->text("notas_historial")->nullable();

            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('restrict')->onUpdate('cascade');

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
        Schema::dropIfExists('historials');
    }
}
