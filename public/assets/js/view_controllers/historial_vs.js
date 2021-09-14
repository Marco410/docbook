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
});

$("#npato_no_a_todo").on("click",function(){

    $("#fisica2").prop('checked',true);
    $("#tabaco2").prop('checked',true);
    $("#alcohol2").prop('checked',true);
    $("#sustancias2").prop('checked',true);
    $("#vacuna_reciente2").prop('checked',true);
    $("#npato_otros").val("");
});

$("#heredo_no_a_todo").on("click",function(){

    $("#heredo_diabetes2").prop('checked',true);
    $("#h_cardio2").prop('checked',true);
    $("#h_hipertension2").prop('checked',true);
    $("#h_tiroideas2").prop('checked',true);
    $("#heredo_otros").val("");
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

$(".btn-add-diagnostico").on("click",function(){
    $("#diagnostico_principal").val($(this).attr("data-value"));

    $("#diagnostico_principal").attr("data-id",$(this).attr("data-id"));

    $("#agregar_diagnostico").modal("hide");

    $("#agregar_diagnostico").on("hidden.bs.modal",function(){
        $(".body-historial").addClass("modal-open");
    });
    
});


$(".btn-add-estudio").on("click",function(){

    $("#panel-estudios-rapida-estudio").append("<div class='card estudio"+$(this).attr("data-id")+"' ><div class='card-header'><div class='card-title'><h5 class='text-info'  > <i class='fas fa-file' ></i> "+$(this).attr("data-value")+" <i onclick='removeEstudio(this)' data-id='"+$(this).attr("data-id")+"' class='fas fa-times-circle text-danger' ></i></h5></div></div> <div class='card-body'><textarea class='form-control' name='observaciones' placeholder='Escribe las observaciones' ></textarea><input type='hidden' name='id_estudio' value='"+$(this).attr("data-id")+"' /> </div></div>");

    $("#agregar_estudio").modal("hide");
    
    $("#agregar_estudio").on("hidden.bs.modal",function(){
        $(".body-historial").addClass("modal-open");
    });

});

function removeEstudio(elemento){
    $(".estudio"+elemento.getAttribute("data-id")).remove();
}

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
                                        var diagnostico = $("#diagnostico_principal").attr("data-id");
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
    fd.append("id_estudios",check_idestudios());
    fd.append("obsEstudios",check_obsEstudios());
    fd.append("id_articulos",check_idarticulos());
    fd.append("indiArticulos",check_indiArticulos());
                
    const response =  axios.post('/store-motivo-consulta-rapida',fd,{
    }).then(res =>  {
        iziToast.success({
            timeout: 6000,
            title: 'Éxito',
            position: 'topRight',
            message: 'Consulta rápida creada.',
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
        //console.log("No agrego estudios");
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