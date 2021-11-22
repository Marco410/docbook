$("#buscar_motivo_consulta").autocomplete({
    source: function(request,response){
        $.ajax({
            url: '/get-motivo-consulta',
            type:  'get',
            dataType:"json",
            data:{
                term: request.term,
                espe_id: $("#especialidad_id").val()
            },
            success:function(data){

                $("#panel-motivos-consulta").html("");
                for (let i = 0; i < data.length; i++) {

                    $("#panel-motivos-consulta").append("<label data-value='"+data[i].motivo+"' data-id='"+data[i].id+"' class='badge badge-info m-1 s-alergia' onclick='addMotivoConsulta(this)' >"+ data[i].motivo +" </label>");

                }
                if($("#buscar_motivo_consulta").val().length > 3){
                    $("#panel-motivos-consulta").append("<label class='badge badge-info m-1 s-alergia' onclick='addNewMotivoConsulta(this)' data-value='"+$("#buscar_motivo_consulta").val()+"' >Nuevo</label>");
                }
            }   
        })
    }
});

function addMotivoConsulta(elemento){

    $("#input_buscar_motivo_consulta").hide();
    $("#buscar_motivo_consulta").val("");
    $("#panel-motivos-consulta").html("");
    
    var motivo = elemento.getAttribute("data-value");
    var id = elemento.getAttribute("data-id");
    $("#panel-motivo-select-consulta").html("<h3 class='text-info' >"+motivo+" <small><i onclick='removeMotivoConsulta()' class='fas fa-times-circle text-danger' ></i></small></h3><input type='hidden' name='motivo_consulta' id='motivo_consulta' value='"+id+"' />"); 
}

function removeMotivoConsulta(){
    $("#input_buscar_motivo_consulta").show();
    $("#panel-motivos-consulta").show();
    $("#panel-motivo-select-consulta").html("");
}

function addNewMotivoConsulta(elemento){
    var motivo = elemento.getAttribute("data-value");
    var espe = $("#especialidad_id").val();
    var fd = new FormData();
    csrftoken = getCookie('csrftoken');
    fd.append("csrfmiddlewaretoken",csrftoken);
    fd.append("motivo",motivo);
    fd.append("especialidad",espe);
    console.log(fd);
    const response =  axios.post('/save-new-motivo',fd,{
    }).then(res =>  {

        $("#input_buscar_motivo_consulta").hide();
        $("#buscar_motivo_consulta").val("");
        $("#panel-motivos-consulta").html("");
        
        $("#panel-motivo-select-consulta").html("<h3 class='text-info' >"+res.data.motivo+" <small><i onclick='removeMotivoConsulta()' class='fas fa-times-circle text-danger' ></i></small></h3><input type='hidden' class='motivo_consulta'  name='motivo_consulta' id='motivo_consulta' value='"+res.data.id+"' />"); 
        
    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Algo salio mal, intentelo de nuevo y recargue.',
        });
    }); 
}

$("#btn-add-consulta").on("click", function(){

    if($("#input_buscar_motivo_consulta").is(":hidden")){
            var motivo = $("#motivo_consulta").val();
           
            create_new_consulta(motivo);
  
        
     }else {
         $("#buscar_motivo_consulta").focus();
         warning("Motivo de Consulta");
         
     } 
     
 });
 
function create_new_consulta(motivo){
 
     var fd = new FormData();
     fd.append("paciente_id",$("#paciente_id").val());
     fd.append("motivo",motivo);
                 
     const response =  axios.post('/store-consulta',fd,{
     }).then(res =>  {
 
         iziToast.success({
             timeout: 6000,
             title: 'Éxito',
             position: 'topRight',
             message: 'Consulta Iniciada.',
         });
         consulta = res['data']['consulta'].id;
         paciente = res['data']['paciente'].id;
         location.href = "/consulta/"+paciente+"/"+consulta;
         $("#consulta").modal("hide");
        
        /*  //window.location.reload();
         */
     }).catch((err) => {
         iziToast.error({
             timeout: 6000,
             title: 'Error',
             position: 'topRight',
             message: 'Algo salio mal, intentelo de nuevo y recargue.',
         });
     }); 
 
 }

$("#btn-terminar-consulta").on("click", function(){

        
    var motivo = $("#motivo_consulta").val();
    //si es 0, el Dr escribo el diagnostico
    if($("#diagnostico_principal_consulta").attr("data-id") == "0"){
        var diagnostico = $("#diagnostico_principal_consulta").val();
    }else{
        var diagnostico = $("#diagnostico_principal_consulta").attr("data-id");
    }
    var notas = txtConsulta.getData();
    var estatura = $("#estatura-signos").val();
    var peso = $("#peso-signos").val();
    var masa_corporal = $("#masa_corporal").val();
    var temperatura = $("#temperatura").val();
    var frec_signos = $("#frec_respiratoria").val();
    var sistolica = $("#sistolica").val();
    var diastolica = $("#diastolica").val();

    create_terminar_consulta(motivo,diagnostico,notas,estatura,peso,masa_corporal,temperatura,frec_signos,sistolica,diastolica);
 
     
 });

 function create_terminar_consulta(motivo,diagnostico,notas,estatura,peso,masa_corporal,temperatura,frec_signos,sistolica,diastolica){

    var fd = new FormData();
    fd.append("paciente_id",$("#paciente_id").val());
    fd.append("id_consulta_actual",$("#id_consulta_actual").val());
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
    fd.append("id_estudios",JSON.stringify(check_idestudios_consulta()));
    fd.append("obsEstudios",JSON.stringify(check_obsEstudios_consulta()));
    fd.append("id_articulos",JSON.stringify(check_idarticulos_consulta()));
    fd.append("indiArticulos",JSON.stringify(check_indiArticulos_consulta()));

    const response =  axios.post('/end-consulta',fd,{
    }).then(res =>  {

        window.open(res['data']['pdf']);

        iziToast.success({
            timeout: 6000,
            title: 'Éxito',
            position: 'topRight',
            message: 'Consulta rápida creada.',
        });
        //window.location.reload();
        $("#id_consulta").val(res['data']['consulta']);
        $("#diagnostico-consulta-cobro").html(res['data']['diagnostico']);
        $("#motivo-consulta-cobro").html(res['data']['motivo']);

        $("#consulta").modal("hide");
        $("#pagar_consulta").modal({
            backdrop: 'static',
            show: true
        });
        $("#tipo_consulta").val("Consulta");
    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Algo salio mal, intentelo de nuevo y recargue.',
        });
    }); 

}

function check_idarticulos_consulta(){
    var idArticulo = new Array();
    if($("input[name=id_articulo_consulta]").length > 0){
        $("input[name=id_articulo_consulta]").each(function(){
            idArticulo.push($(this).val());
        }); 
    }else{
        //console.log("No agrego articulos");
    }
    return idArticulo;
}

function check_indiArticulos_consulta(){
    var indiArticulo = new Array();
    $("textarea[name=indicaciones_consulta]").each(function(){
        if($(this).val() != ""){
            indiArticulo.push($(this).val());
        }else{
            warning("Agregue indicaciones al medicamento");
        }
    }); 

    return indiArticulo;
}

function check_idestudios_consulta(){

    var idEstudios = new Array();
    if($("input[name=id_estudio_consulta]").length > 0){
        $("input[name=id_estudio_consulta]").each(function(){
            idEstudios.push($(this).val());
        }); 
        
    }else{
        idEstudios = [];
    }
    return idEstudios;
}

function check_obsEstudios_consulta(){
    var obsEstudios = new Array();
    $("textarea[name=observaciones_consulta]").each(function(){
        if($(this).val() != ""){
            obsEstudios.push($(this).val());
        }else{
            warning("Agregue observaciones al estudio");
        }
    }); 

    return obsEstudios;
}


$("#no_cobro").on("click",function(){
    var costo_consulta = 0;
    var totalF = $("#total_consulta_rapida").html();

    if($(this).is(":checked")) {
        
        if($("#cobro1").is(":checked")){
            costo_consulta = $("#cobro1").val();
        }else if($("#cobro2").is(":checked")) {
            costo_consulta = $("#cobro2").val();
        }
        console.log(costo_consulta);
        total = parseFloat(totalF) - parseFloat(costo_consulta);
        $("#total_consulta_rapida").html(total);

        $('#cobro1').prop('checked',false);
        $('#cobro2').prop('checked',false);
        $('#cobro1').prop('disabled',true);
        $('#cobro2').prop('disabled',true);

    }else{
        $('#cobro1').prop('checked',true);
        $('#cobro1').prop('disabled',false);
        $('#cobro2').prop('disabled',false);
        costo_consulta = $("#cobro1").val();
        total = parseFloat(totalF) + parseFloat(costo_consulta);

        $("#total_consulta_rapida").html(total);
    }
});

$("#descuento").keyup(function(){

    var extra = $("#cobro_extra").val();
     if (extra == ""){
         extra = 0;
     }else{
         extra = $("#cobro_extra").val();
     }
    if($("#cobro1").is(":checked")){
        costo_consulta = $("#cobro1").val();
    }else if($("#cobro2").is(":checked")) {
        costo_consulta = $("#cobro2").val();
    }else{
        costo_consulta = 0;
    }
    totalF = parseFloat(extra) + parseFloat(costo_consulta);
    if($(this).val() != ""){
        descuento = $(this).val();
        total = parseFloat(totalF) - (parseFloat(descuento));
        $("#total_consulta_rapida").html(total);
        console.log(descuento);
    }else{
        total = parseFloat(totalF);
        $("#total_consulta_rapida").html(total);
    }
    
});


 $('#cobro1').change(function() {
 
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
     $("#descuento").val("");    
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
     $("#descuento").val("");    

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
     $("#descuento").val("");    

 });
 
 $("#btn-pagar").on("click",function(){
     $("#pagar_consulta").modal("show");
 });
 
 $("#btn-hacer-pago").on("click",function(){ 
    var costo_consulta = 0;

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
     var descuento =  $("#descuento").val();
     
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
        fd.append("descuento",descuento);


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
             },1000);
             
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
 
 });