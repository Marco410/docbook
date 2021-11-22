//Marca las casillas en "NO"
$("#no_a_todo").on("click",function(){

    $("#hospi2").prop('checked',true);
    $("#cirugia2").prop('checked',true);
    $("#diabetes2").prop('checked',true);
    $("#tiroideas2").prop('checked',true);
    $("#hipertension2").prop('checked',true);
    $("#trauma2").prop('checked',true);
    $("#cancer2").prop('checked',true);
    $("#tuberculosis2").prop('checked',true);
    $("#trans2").prop('checked',true);
    $("#pato_respiratorias2").prop('checked',true);
    $("#pato_gastro2").prop('checked',true);
    $("#sexual2").prop('checked',true);
    $("#cardio2").prop('checked',true);
    $("#pato_otros").val("");

    $("#p-text-hospi").hide();
    $("#p-text-cirugia").hide();
    $("#p-text-diabetes").hide();
    $("#p-text-tiroideas").hide();
    $("#p-text-hipertension").hide();
    $("#p-text-cardio").hide();
    $("#p-text-trauma").hide();
    $("#p-text-cancer").hide();
    $("#p-text-tuberculosis").hide();
    $("#p-text-trans").hide();
    $("#p-text-pato_respiratorias").hide();
    $("#p-text-pato_gastro").hide();
    $("#p-text-sexual").hide();
});

$("#npato_no_a_todo").on("click",function(){

    $("#fisica2").prop('checked',true);
    $("#tabaco2").prop('checked',true);
    $("#alcohol2").prop('checked',true);
    $("#sustancias2").prop('checked',true);
    $("#vacuna_reciente2").prop('checked',true);
    $("#npato_otros").val("");

    $("#p-text-fisica").hide();
    $("#p-text-tabaco").hide();
    $("#p-text-tabaco").hide();
    $("#p-text-alcohol").hide();
    $("#p-text-sustancias").hide();
    $("#p-text-vacuna_reciente").hide();

});

$("#heredo_no_a_todo").on("click",function(){

    $("#heredo_diabetes2").prop('checked',true);
    $("#h_cardio2").prop('checked',true);
    $("#h_hipertension2").prop('checked',true);
    $("#h_tiroideas2").prop('checked',true);
    $("#heredo_otros").val("");

    $("#p-text-heredo_diabetes").hide();
    $("#p-text-h_cardio").hide();
    $("#p-text-h_hipertension").hide();
    $("#p-text-h_tiroideas").hide();

});

$("#psiqui_no_a_todo").on("click",function(){

    $("#historia_familiar").val("");
    $("#conciencia2").prop('checked',true);
    $("#psiqui_areas").val("");
    $("#psiqui_tratamientos").val("");
    $("#psiqui_apoyo2").prop('checked',true);
    $("#psiqui_grupo_familiar").val("");
    $("#psiqui_vida_social").val("");
    $("#psiqui_vida_laboral").val("");
    $("#psiqui_autoridad").val("");
    $("#psiqui_impulsos").val("");
    $("#psiqui_frustracion").val("");

});

$("#dieta_no_a_todo").on("click",function(){

    $("#desayuno2").prop('checked',true);
    $("#colacion2").prop('checked',true);
    $("#comida2").prop('checked',true);
    $("#colacion_tarde2").prop('checked',true);
    $("#alimentos_casa2").prop('checked',true);
    $("#apetito5").prop('checked',true);
    $("#hambre2").prop('checked',true);
    $("#vasos1").prop('checked',true);
    $("#prefer_alimentos").val("");
    $("#malestares2").prop('checked',true);
    $("#complementos2").prop('checked',true);
    $("#otras_dietas2").prop('checked',true);
    $("#peso_ideal").val("");
    $("#padecimiento_peso2").prop('checked',true);
    $("#antecedentes_peso2").prop('checked',true);
    $("#consumo_liquidos2").prop('checked',true);
    $("#educacion_nutri2").prop('checked',true);
    $("#nutri_otros").val("");
});

$("#gineco_no_a_todo").on("click",function(){

    $("#primera_menstruacion").val("");
    $("#ultima_menstruacion").val("");
    $("#caracteristicas_menstruacion").val("");
    $("#parejas_sexuales").val("");
    $("#embarazos2").prop('checked',true);
    $("#p-text-embarazos").hide();
    $("#partos2").prop('checked',true);
    $("#p-text-partos").hide();
    $("#abortos2").prop('checked',true);
    $("#p-text-abortos").hide();
    $("#cesareas2").prop('checked',true);
    $("#p-text-cesareas").hide();
    $("#cancer_cervico2").prop('checked',true);
    $("#p-text-cancer_cervico").hide();
    $("#cancer_uterino2").prop('checked',true);
    $("#p-text-cancer_uterino").hide();
    $("#cancer_mama2").prop('checked',true);
    $("#p-text-cancer_mama").hide();
    $("#actividad_sexual2").prop('checked',true);
    $("#p-text-actividad_sexual").hide();
    $("#metodo_familiar2").prop('checked',true);
    $("#p-text-metodo_familiar").hide();
    $("#terapia_hormonal2").prop('checked',true);
    $("#p-text-terapia_hormonal").hide();
    $("#papanicolau").val("");
    $("#mastografia").val("");
    $("#otros_gineco2").prop('checked',true);
    $("#p-text-otros_gineco").hide();



    
});

$("#perinatal_no_a_todo").on("click",function(){

    $("#ultimo_ciclo_menstrual").val("");
    $("#duracion_ciclo").val("");
    $("#ultimo_metodo_anti").val("");
    $("#concepcion_asistida2").prop('checked',true);
    $("#p-text-concepcion_asistida").hide();
    $("#fecha_ucm").val("");
    $("#fpp_final").val("");
    $("#notas_embarazo").val("");    
});

$("#postnatal_no_a_todo").on("click",function(){

    $("#detalles_parto").val("");
    $("#nombre_bb").val("");
    $("#peso_nacer").val("");
    $("#salud_bb").val("");
    $("#alimentacion_bb").hide();
    $("#alimentacion_tipo1").prop('checked',false);
    $("#alimentacion_tipo2").prop('checked',false);
    $("#alimentacion_tipo3").prop('checked',false);
    $("#estado_emocional").val("");   
});

function calcular_imc(estatura, peso){

    var estatura_m = estatura / 100;

    var imc = (peso / Math.pow(estatura_m,2));
    return Math.trunc(imc);
}
//calcula el indice de masa corporal
$("#estatura-signos ,  #peso-signos").keyup(function(){

   imc =  calcular_imc($("#estatura-signos").val(), $("#peso-signos").val());

   if (imc === null || isNaN(imc) || imc === Infinity){
        $("#masa-corporal-label").html("0 kg/m2");
        $("#masa_corporal").val(0);
   }else{
        $("#masa-corporal-label").html(imc+ "kg/m2");
        $("#masa_corporal").val(imc);
   }
       
});

//calcula el indice de masa corporal de la consulta rapida
$("#estatura-signos2 ,  #peso-signos2").keyup(function(){

    imc =  calcular_imc($("#estatura-signos2").val(), $("#peso-signos2").val());
 
    if (imc === null || isNaN(imc) || imc === Infinity){
         $("#masa-corporal-label2").html("0 kg/m2");
         $("#masa_corporal2").val(0);
    }else{
         $("#masa-corporal-label2").html(imc+ "kg/m2");
         $("#masa_corporal2").val(imc);
    }
        
 });

// Remueve los elementos seleccionados de las alergias, vacunas y medicamentos
function remove(elemento){

    c = $('.s-alergia').length;

    if (c > 1) {
        elemento.remove();
      } else if (c == 1)  {
        elemento.remove();
        $("#btn_select_alergia").hide();

    }

    v = $('.s-vacuna').length;

    if (v > 1) {
        elemento.remove();
      } else if (v == 1)  {
        elemento.remove();
        $("#btn_select_vacuna").hide();

    }

    m = $('.s-medi').length;

    if (m > 1) {
        elemento.remove();
      } else if (m == 1)  {
        elemento.remove();
        $("#btn_select_medi").hide();

    }
}

$('#btn-save-pato').on("click", function(){
    var fd = new FormData($("#formPato")[0]);
    
    fd.append("paciente_id",$("#paciente_id").val());
                
    const response =  axios.post('/store-patologicos',fd,{
       
    }).then(res =>  {
        iziToast.success({
            timeout: 6000,
            title: 'Éxito',
            position: 'topRight',
            message: 'Antecedentes Patológicos Guardados.',
        });

    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Algo salio mal, intentelo de nuevo y recargue.',
        });
    });  

});

$('#btn-save-npato').on("click", function(){

    var fd = new FormData($("#formNPato")[0]);
    fd.append("paciente_id",$("#paciente_id").val());
                
    const response =  axios.post('/store-npatologicos',fd,{
    }).then(res =>  {

        iziToast.success({
            timeout: 6000,
            title: 'Éxito',
            position: 'topRight',
            message: 'Antecedentes No Patológicos Guardados.',
        });

    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Algo salio mal, intentelo de nuevo y recargue.',
        });
    });  
});

$('#btn-save-heredo').on("click", function(){

    var fd = new FormData($("#formHeredo")[0]);
    fd.append("paciente_id",$("#paciente_id").val());
                
    const response =  axios.post('/store-heredo',fd,{
    }).then(res =>  {

        iziToast.success({
            timeout: 6000,
            title: 'Éxito',
            position: 'topRight',
            message: 'Antecedentes Heredofamiliares Guardados.',
        });

    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Algo salio mal, intentelo de nuevo y recargue.',
        });
    });  
});

$('#btn-save-esquema-vacuna').on("click", function(){

    var fd = new FormData($("#formVacunacion")[0]);
    fd.append("paciente_id",$("#paciente_id").val());
                
    const response =  axios.post('/store-esquema-vacuna',fd,{
    }).then(res =>  {

        iziToast.success({
            timeout: 6000,
            title: 'Éxito',
            position: 'topRight',
            message: 'Esquema de Vacunación Guardada.',
        });

    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Algo salio mal, intentelo de nuevo y recargue.',
        });
    });  
});

$('#btn-save-gineco').on("click", function(){

    var fd = new FormData($("#formGineco")[0]);
    fd.append("paciente_id",$("#paciente_id").val());
                
    const response =  axios.post('/store-gineco',fd,{
    }).then(res =>  {

        iziToast.success({
            timeout: 6000,
            title: 'Éxito',
            position: 'topRight',
            message: 'Antecedentes Gineco-obstetricios Guardados.',
        });

    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Algo salio mal, intentelo de nuevo y recargue.',
        });
    });  
});

$('#btn-save-perinatal').on("click", function(){

    var fd = new FormData($("#formPerinatal")[0]);
    fd.append("paciente_id",$("#paciente_id").val());
                
    const response =  axios.post('/store-perinatal',fd,{
    }).then(res =>  {

        iziToast.success({
            timeout: 6000,
            title: 'Éxito',
            position: 'topRight',
            message: 'Antecedentes Perinatales Guardados.',
        });

    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Algo salio mal, intentelo de nuevo y recargue.',
        });
    });  
});

$('#btn-save-postnatal').on("click", function(){

    var fd = new FormData($("#formPostnatal")[0]);
    fd.append("paciente_id",$("#paciente_id").val());
                
    const response =  axios.post('/store-postnatal',fd,{
    }).then(res =>  {

        iziToast.success({
            timeout: 6000,
            title: 'Éxito',
            position: 'topRight',
            message: 'Antecedentes Perinatales Guardados.',
        });

    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Algo salio mal, intentelo de nuevo y recargue.',
        });
    });  
});

$('#btn-save-psiqui').on("click", function(){

    var fd = new FormData($("#formPsiqui")[0]);
    fd.append("paciente_id",$("#paciente_id").val());
                
    const response =  axios.post('/store-psiqui',fd,{
    }).then(res =>  {

        iziToast.success({
            timeout: 6000,
            title: 'Éxito',
            position: 'topRight',
            message: 'Antecedentes Psiquiatricos Guardados.',
        });

        console.log(res);

    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Algo salio mal, intentelo de nuevo y recargue.',
        });
    });  
});

$('#btn-save-nutri').on("click", function(){

    var fd = new FormData($("#formNutri")[0]);
    fd.append("paciente_id",$("#paciente_id").val());
                
    const response =  axios.post('/store-nutri',fd,{
    }).then(res =>  {

        iziToast.success({
            timeout: 6000,
            title: 'Éxito',
            position: 'topRight',
            message: 'Dieta Nutriologica Guardados.',
        });


    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Algo salio mal, intentelo de nuevo y recargue.',
        });
    });  
});

$('#btn-save-notas-his').on("click", function(){

    var fd = new FormData($("#formNotasHis")[0]);
    fd.append("paciente_id",$("#paciente_id").val());
    fd.append("notas_historial",notas_historial.getData());

    
                
    const response =  axios.post('/store-notas-his',fd,{
    }).then(res =>  {
        iziToast.success({
            timeout: 6000,
            title: 'Éxito',
            position: 'topRight',
            message: 'Nota del Historial Guardada.',
        });
    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Algo salio mal, intentelo de nuevo y recargue.',
        });
    });  
});

$("#sol_error").on("click",function(){
    var body = document.body;
    body.classList.add("modal-open"); 
});

$("#btn-add-consulta-rapida").on("click", function(){

   if($("#input_buscar_motivo_rapida").is(":hidden")){
        if($("#diagnostico_principal").val() != "" ){
            if(txtConsulta.getData() != "" ){
                if($("#estatura-signos2").val() != ""){
                    if($("#peso-signos2").val() != ""){
                        if($("#temperatura-signos2").val() != ""){
                            if($("#frec_respiratoria-signos2").val() != ""){
                                if($("#sistolica2").val() != ""){
                                    if($("#diastolica2").val() != ""){

                                        
                                var motivo = $("#motivo_consulta_rapida").val();
                                //si es 0, el Dr escribo el diagnostico
                                if($("#diagnostico_principal").attr("data-id") == "0"){
                                    var diagnostico = $("#diagnostico_principal").val();
                                }else{
                                    var diagnostico = $("#diagnostico_principal").attr("data-id");
                                }
                                var notas = txtConsulta.getData();
                                var estatura = $("#estatura-signos2").val();
                                var peso = $("#peso-signos2").val();
                                var masa_corporal = $("#masa_corporal2").val();
                                var temperatura = $("#temperatura-signos2").val();
                                var frec_signos = $("#frec_respiratoria-signos2").val();
                                var sistolica = $("#sistolica2").val();
                                var diastolica = $("#diastolica2").val();

                                create_new_consulta_rapida(motivo,diagnostico,notas,estatura,peso,masa_corporal,temperatura,frec_signos,sistolica,diastolica);

                                    }else{
                                        $("#diastolica2").focus();
                                        warning("Agregue la Diastólica");
                                    }    
                                }else{
                                    $("#sistolica2").focus();
                                    warning("Agregue la Sistólica");
                                }                        
                            }else{
                                $("#frec_respiratoria-signos2").focus();
                                warning("Agregue la frecuencia respiratoria");
                            }
                        }else{
                            $("#temperatura-signos2").focus();
                            warning("Agregue la temperatura");
                        }
                    }else{
                        $("#peso-signos2").focus();
                        warning("Agregue el peso");
                    }
                }else{
                    $("#estatura-signos2").focus();
                    warning("Agregue la estatura");
                }
            }else{
                $("#txtconsulta_rapida").focus();
                warning("Agregue algunas notas");
            }
        }else{
            $("#diagnostico_principal").focus();
            warning("Diagnostico Principal");
        }
    }else {
        $("#buscar_motivo_rapida").focus();
        warning("Motivo de Consulta");
        
    } 
    
});

function create_new_consulta_rapida(motivo,diagnostico,notas,estatura,peso,masa_corporal,temperatura,frec_signos,sistolica,diastolica){

    var fd = new FormData();
    fd.append("paciente_id",$("#paciente_id").val());
    fd.append("motivo",motivo);
    fd.append("diagnostico",diagnostico);
    fd.append("notas",notas);
    fd.append("estatura",estatura);
    fd.append("peso",peso);
    fd.append("masa_corporal",masa_corporal);
    fd.append("temperatura",temperatura);
    fd.append("frec_signos",frec_signos);
    fd.append("sistolica",sistolica);
    fd.append("diastolica",diastolica);
    fd.append("id_estudios",JSON.stringify(check_idestudios()));
    fd.append("obsEstudios",JSON.stringify(check_obsEstudios()));
    fd.append("id_articulos",JSON.stringify(check_idarticulos()));
    fd.append("indiArticulos",JSON.stringify(check_indiArticulos()));

                
    const response =  axios.post('/store-consulta-rapida',fd,{
    }).then(res =>  {
        

        window.open(res['data']['pdf']);

        iziToast.success({
            timeout: 6000,
            title: 'Éxito',
            position: 'topRight',
            message: 'Consulta rápida creada.',
        });
        //window.location.reload();
        $("#id_consulta").val(res['data']['consulta'].id);
        $("#tipo_consulta").val("Rapida");
        $("#diagnostico-consulta-cobro").html(res['data']['diagnostico']);
        $("#motivo-consulta-cobro").html(res['data']['motivo']);

        $("#consulta_rapida").modal("hide");
        $("#pagar_consulta").modal({
            backdrop: 'static',
            show: true
        });


    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Algo salio mal, intentelo de nuevo y recargue.',
        });
    }); 

}

/* $('#cobro1').change(function() {

    var extra = $("#cobro_extra").val();
   
    if (extra == ""){
        extra = 0;
    }else{
        extra = $("#cobro_extra").val();
    }

    if($(this).is(":checked")) {
        var total = parseFloat($(this).val()) + parseFloat(extra);
       $("#total_consulta_rapida").html(total); 
    }else if ($("#cobro2").is(":checked")){
        var total = parseFloat($("#cobro2").val()) + parseFloat(extra);

        $("#total_consulta_rapida").html(total); 
    }    
});

$('#cobro2').change(function() {
    var extra = $("#cobro_extra").val();
   
    if (extra == ""){
        extra = 0;
    }else{
        extra = $("#cobro_extra").val();
    }
    
    if($(this).is(":checked")) {
        var total = parseFloat($(this).val()) + parseFloat(extra);
        $("#total_consulta_rapida").html(total); 
    }else if ($("#cobro1").is(":checked")){
        var total = parseFloat($("#cobro1").val()) + parseFloat(extra);
        $("#total_consulta_rapida").html($("#cobro1").val()); 
    }    
});

$("#cobro_extra").keyup(function(){
    var costo_consulta = 0;
    if($("#cobro1").is(":checked")){
        costo_consulta = $("#cobro1").val();
    }else if($("#cobro2").is(":checked")) {
        costo_consulta = $("#cobro2").val();
    }
    var total = parseFloat($(this).val()) + parseFloat(costo_consulta);
    if($(this).val() == ""){
        $("#total_consulta_rapida").html(costo_consulta);
    }else{
        $("#total_consulta_rapida").html(total);
    }

    
});

$("#btn-pagar").on("click",function(){
    $("#pagar_consulta").modal("show");
});
 */
/* $("#btn-hacer-pago").on("click",function(){

    if($("#cobro1").is(":checked")){
        costo_consulta = $("#cobro1").val();
    }else if($("#cobro2").is(":checked")) {
        costo_consulta = $("#cobro2").val();
    }
    
    var totalF = $("#total_consulta_rapida").html();
    var id_consulta = $("#id_consulta").val();
    var motivo_extra = $("#motivo_extra").val();
    var extra =  $("#cobro_extra").val();
    var metodo =  $("#metodo_pago").val();
    var tipo_consulta =  $("#tipo_consulta").val();

    if(metodo.length > 0){

        var fd = new FormData();    
        fd.append("paciente_id",$("#paciente_id").val());
        fd.append("id_consulta",id_consulta);
        fd.append("total",totalF);
        fd.append("motivo_extra",motivo_extra);
        fd.append("extra",extra);
        fd.append("costo_consulta",costo_consulta);
        fd.append("metodo",metodo);
        fd.append("tipo_consulta",tipo_consulta);
        
    
        const response =  axios.post('/make-pay',fd,{
        }).then(res =>  {
    
            iziToast.success({
                timeout: 3000,
                title: 'Éxito',
                position: 'center',
                message: 'Realizando Cobro. Guardando... (Espere)',
            });
            
            setTimeout(function(){
                window.open(res['data']['pdf']);
                window.location.reload();
            },3000);
            
    
        }).catch((err) => {
            iziToast.error({
                timeout: 6000,
                title: 'Error',
                position: 'topRight',
                message: 'Algo salio mal, intentelo de nuevo y recargue.',
            });
        }); 
    }else{
        $("#metodo_pago").focus();
        iziToast.warning({
            timeout: 6000,
            title: 'Cuidado',
            position: 'center',
            message: 'Seleccione el metodo de pago',
        });
    }

}); */

function pagar_atrasado(id_consulta, diagnostico, motivo,tipo_consulta){

    $("#id_consulta").val(id_consulta);
    $("#tipo_consulta").val(tipo_consulta);
    $("#diagnostico-consulta-cobro").html(diagnostico);
    $("#motivo-consulta-cobro").html(motivo);

    $("#pagar_consulta").modal("show");

}

function check_idarticulos(){
    var idArticulo = new Array();
    if($("input[name=id_articulo]").length > 0){
        $("input[name=id_articulo]").each(function(){
            idArticulo.push($(this).val());
        }); 
    }else{
        //console.log("No agrego articulos");
    }
    return idArticulo;
}

function check_indiArticulos(){
    var indiArticulo = new Array();
    $("textarea[name=indicaciones]").each(function(){
        if($(this).val() != ""){
            indiArticulo.push($(this).val());
        }else{
            warning("Agregue indicaciones al medicamento");
        }
    }); 

    return indiArticulo;
}

function check_idestudios(){

    var idEstudios = new Array();
    if($("input[name=id_estudio]").length > 0){
        $("input[name=id_estudio]").each(function(){
            idEstudios.push($(this).val());
        }); 
        
    }else{
        idEstudios = [];
    }
    return idEstudios;
}

function check_obsEstudios(){
    var obsEstudios = new Array();
    $("textarea[name=observaciones]").each(function(){
        if($(this).val() != ""){
            obsEstudios.push($(this).val());
        }else{
            warning("Agregue observaciones al estudio");
        }
    }); 

    return obsEstudios;
}

function warning(input){
    iziToast.warning({
        title: 'Cuidado',
        position: 'center',
        message: 'Selecciona: '+input,
    });
}

function getCookie(name) {
    let cookieValue = null;
    if (document.cookie && document.cookie !== '') {
        const cookies = document.cookie.split(';');
        for (let i = 0; i < cookies.length; i++) {
            const cookie = cookies[i].trim();
            // Does this cookie string begin with the name we want?
            if (cookie.substring(0, name.length + 1) === (name + '=')) {
                cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                break;
            }
        }
    }
    return cookieValue;
}