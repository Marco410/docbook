
//cambia el estatus de si tiene o no alergias
$('#paciente_alergias').on("click", function(){

    var fd = new FormData();
    csrftoken = getCookie('csrftoken');
    fd.append("csrfmiddlewaretoken",csrftoken);
    fd.append("paciente_id",$("#paciente_id").val());

    if( $(this).prop('checked') ) {
       op = 0;
       $('#panel-alergias').hide();
    }else{
       op = 1;
       $('#panel-alergias').show();
    }

    fd.append("alergias_option",op);
                
    const response =  axios.post('/store-alergias-option',fd,{
       
    }).then(res =>  {

    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Algo salio mal, intentelo de nuevo y recargue.',
        });
    }); 

});
//Guarda el array de alergias
$('#btn-store-alergias').on("click", function(){

    var alergiasInput = document.getElementsByName('alergia[]');

    var alergias = [];
    Array.prototype.forEach.call(alergiasInput, function(el) {
        alergias.push(el.value);
    });
    
    var fd = new FormData();
    csrftoken = getCookie('csrftoken');
    fd.append("csrfmiddlewaretoken",csrftoken);
    fd.append("paciente_id",$("#paciente_id").val());
    
    fd.append("alergias",alergias);
                
    const response =  axios.post('/store-alergias',fd,{
       
    }).then(res =>  {

        for (i = 0; i < res.data.length; i++){
            $("#alergias_conocidas").append("<label style='padding: 5px 10px 5px 10px;'  for='s-alergia' id='s-alergia" +res.data[i].id+ "' class='badge badge-info m-1 s-alergia'> <input disabled type='hidden' checked  value='" +res.data[i].id+ "' >"+ res.data[i].alergia +" </label><i class='fas fa-trash text-danger' onclick='eliminar_alergia(this)' data-id='" +res.data[i].id+ "'   > </i> ");
        }

        $("#panel-store-alergias").hide();
        $('#select_alergia').html("");
        alergias = [];
        

    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Algo salio mal, intentelo de nuevo y recargue.',
        });
    }); 

});

function eliminar_alergia(elemento){

    iziToast.warning({
        timeout: 6000,
        icon: 'fas fa-trash',
        title: 'Confirmación',
        message: '¿Estás seguro que deseas eliminar?',
        position: 'center', 
        buttons: [
            ['<button>Si</button>', function (instance, toast) {
                var fd = new FormData();
                csrftoken = getCookie('csrftoken');
                fd.append("csrfmiddlewaretoken",csrftoken);
                fd.append("paciente_id",$("#paciente_id").val());
                fd.append('alergia_id',elemento.getAttribute('data-id') )
                            
                const response =  axios.post('/destroy-alergias',fd,{
                   
                }).then(res =>  {
                    iziToast.success({
                        timeout: 6000,
                        title: 'Éxito',
                        position: 'topRight',
                        message: 'Alergia eliminada.',
                    });

                    elemento.remove();
                    $("#s-alergia"+elemento.getAttribute('data-id')).remove();
                    instance.hide({
                        transitionOut: 'fadeOutUp'
                    }, toast, 'buttonName');
                }).catch((err) => {
                    console.log(err);
                    iziToast.error({
                        timeout: 6000,
                        title: 'Error',
                        position: 'topRight',
                        message: 'No se pudo eliminar, intentelo de nuevo.',
                    });
                }); 
            }, true], 
            ['<button>Cancelar</button>', function (instance, toast) {
                instance.hide({
                    transitionOut: 'fadeOutUp',
                    onClosing: function(instance, toast, closedBy){
                        
                    }
                }, toast, 'buttonName');
            }]
        ]
    });
   
}

// EMPIEZA BUSCAR ALERGIAS

 $("#buscar_alergia").autocomplete({
    source: function(request,response){
        $.ajax({
            url: '/get-alergias',
            type:  'get',
            dataType:"json",
            data:{
                term: request.term
            },
            success:function(data){
                response($.map(data, function (item) {
                    return {
                        label: item.alergia,
                        value: item.alergia,
                        idvalue: item.id
                    }
                }))
            }   
        })
    },
    select: function(event, ui) {
        if(ui.item){
            $("#panel-store-alergias").show();
            $('#select_alergia').show();

            $("#select_alergia").append("<label onclick='remove(this)' for='s-alergia"+ui.item.idvalue+"' id='s-alergia' class='badge badge-info m-1 s-alergia'> <input type='checkbox' checked name='alergia[]' data-name='"+ui.item.value+"'  value='" +ui.item.idvalue+ "' >"+ ui.item.value +"</label>");
        }        
    },
    close: function( event, ui ) {
        $("#btn_select_alergia").show();
        $("#buscar_alergia").val("");
    }
});



$( "#otras_alergias" ).keyup(function() {
    if($(this).val() == ""){
        $("#btn-guardar-nueva-alergia").hide();
    }else if ($(this).val().length > 2){

        $("#btn-guardar-nueva-alergia").show();

    }    
});

$("#btn-new-alergia").on("click",function(){
    var fd = new FormData();
    csrftoken = getCookie('csrftoken');
    fd.append("csrfmiddlewaretoken",csrftoken);
    fd.append("otras_alergias",$( "#otras_alergias" ).val());
            
    const response =  axios.post('/save-new-alergia',fd,{
       
    }).then(res =>  {
        $("#panel-store-alergias").show();
        $('#select_alergia').show();

            $("#select_alergia").append("<label onclick='remove(this)' for='s-alergia"+res.data.id+"' id='s-alergia' class='badge badge-info m-1 s-alergia'> <input type='checkbox' checked name='alergia[]' data-name='"+res.data.alergia+"'  value='" +res.data.id+ "' >"+ res.data.alergia +"</label>");
        iziToast.success({
            timeout: 3000,
            title: 'Éxito',
            position: 'topRight',
            message: 'Alergia agregada correctamente',
        });
        $( "#otras_alergias" ).val("");
        $("#btn_select_alergia").show();

    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Algo salio mal, intentelo de nuevo y recargue.',
        });
    }); 
});

// ********************** TERMINA BUSCAR ALERGIAS ***********************


