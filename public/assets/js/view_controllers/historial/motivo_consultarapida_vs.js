// EMPIEZA BUSCAR ALERGIAS

$("#buscar_motivo_rapida").autocomplete({
    source: function(request,response){
        $.ajax({
            url: '/get-motivo-consulta',
            type:  'get',
            dataType:"json",
            data:{
                term: request.term
            },
            success:function(data){

                $("#panel-motivos").html("");
                for (let i = 0; i < data.length; i++) {

                    $("#panel-motivos").append("<label data-value='"+data[i].motivo+"' data-id='"+data[i].id+"' class='badge badge-info m-1 s-alergia' onclick='addMotivo(this)' >"+ data[i].motivo +" </label>");

                }
                if($("#buscar_motivo_rapida").val().length > 3){
                    $("#panel-motivos").append("<label class='badge badge-info m-1 s-alergia' onclick='addNewMotivo(this)' data-value='"+$("#buscar_motivo_rapida").val()+"' >Nuevo</label>");
                }
            }   
        })
    },
    select: function(event, ui) {
        if(ui.item){
       
        }        
    },
    close: function( event, ui ) {
    }
});

function addMotivo(elemento){

    $("#input_buscar_motivo_rapida").hide();
    $("#buscar_motivo_rapida").val("");
    $("#panel-motivos").html("");
    
    var motivo = elemento.getAttribute("data-value");
    var id = elemento.getAttribute("data-id");
    $("#panel-motivo-select").html("<h3 class='text-info' >"+motivo+" <small><i onclick='removeMotivo()' class='fas fa-times-circle text-danger' ></i></small></h3><input type='hidden' name='motivo_consulta_rapida' id='motivo_consulta_rapida' value='"+id+"' />"); 
}

function removeMotivo(){
    $("#input_buscar_motivo_rapida").show();
    $("#panel-motivos").show();
    $("#panel-motivo-select").html("");
}

function addNewMotivo(elemento){
    var motivo = elemento.getAttribute("data-value");

    var fd = new FormData();
    csrftoken = getCookie('csrftoken');
    fd.append("csrfmiddlewaretoken",csrftoken);
    fd.append("motivo",motivo);
    
    const response =  axios.post('/save-new-motivo',fd,{
       
    }).then(res =>  {

        $("#input_buscar_motivo_rapida").hide();
        $("#buscar_motivo_rapida").val("");
        $("#panel-motivos").html("");
        
        $("#panel-motivo-select").html("<h3 class='text-info' >"+res.data.motivo+" <small><i onclick='removeMotivo()' class='fas fa-times-circle text-danger' ></i></small></h3><input type='hidden' class='motivo_consulta_rapida'  name='motivo_consulta_rapida' id='motivo_consulta_rapida' value='"+res.data.id+"' />"); 
        
    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Algo salio mal, intentelo de nuevo y recargue.',
        });
    }); 
}