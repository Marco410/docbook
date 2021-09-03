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