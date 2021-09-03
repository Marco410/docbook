
//Guarda el array de medis
$('#btn-store-medis').on("click", function(){

    var medisInput = document.getElementsByName('medi[]');

    var medis = [];
    Array.prototype.forEach.call(medisInput, function(el) {
        medis.push(el.value);
    });
    
    var fd = new FormData();
    csrftoken = getCookie('csrftoken');
    fd.append("csrfmiddlewaretoken",csrftoken);
    fd.append("paciente_id",$("#paciente_id").val());
    
    fd.append("medis",medis);
                
    const response =  axios.post('/store-medis',fd,{
       
    }).then(res =>  {

        for (i = 0; i < res.data.length; i++){
            $("#medis_conocidas").append("<label style='padding: 5px 10px 5px 10px;'  for='s-medi' id='s-medi" +res.data[i].id+ "' class='badge badge-info m-1 s-medi'> <input disabled type='hidden' checked  value='" +res.data[i].id+ "' >"+ res.data[i].medi +" </label><i class='fas fa-trash text-danger' onclick='eliminar_medi(this)' data-id='" +res.data[i].id+ "'> </i> ");
        }

        $("#panel-store-medis").hide();
        $('#select_medi').html("");
        medis = [];
        

    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Algo salio mal, intentelo de nuevo y recargue.',
        });
    }); 

});

function eliminar_medi(elemento){

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
                fd.append('medi_id',elemento.getAttribute('data-id') )
                            
                const response =  axios.post('/destroy-medis',fd,{
                   
                }).then(res =>  {
                    iziToast.success({
                        timeout: 6000,
                        title: 'Éxito',
                        position: 'topRight',
                        message: 'Medicamento eliminado.',
                    });

                    elemento.remove();
                    $("#s-medi"+elemento.getAttribute('data-id')).remove();
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

 $("#buscar_medi").autocomplete({
    source: function(request,response){
        $.ajax({
            url: '/get-medis',
            type:  'get',
            dataType:"json",
            data:{
                term: request.term
            },
            success:function(data){
                response($.map(data, function (item) {
                    return {
                        label: item.medicamento,
                        value: item.medicamento,
                        idvalue: item.id
                    }
                }))
            }   
        })
    },
    select: function(event, ui) {
        if(ui.item){
            $("#panel-store-medis").show();
            $('#select_medi').show();

            $("#select_medi").append("<label onclick='remove(this)' for='s-medi"+ui.item.idvalue+"' id='s-medi' class='badge badge-info m-1 s-medi'> <input type='checkbox' checked name='medi[]' data-name='"+ui.item.value+"'  value='" +ui.item.idvalue+ "' >"+ ui.item.value +"</label>");
        }        
    },
    close: function( event, ui ) {
        $("#btn_select_medi").show();
        $("#buscar_medi").val("");
    }
});



$( "#otros_medis" ).keyup(function() {
    if($(this).val() == ""){
        $("#btn-guardar-nueva-medi").hide();
    }else if ($(this).val().length > 2){

        $("#btn-guardar-nueva-medi").show();

    }    
});

$("#btn-new-medi").on("click",function(){
    var fd = new FormData();
    csrftoken = getCookie('csrftoken');
    fd.append("csrfmiddlewaretoken",csrftoken);
    fd.append("otros_medis",$( "#otros_medis" ).val());
            
    const response =  axios.post('/save-new-medi',fd,{
       
    }).then(res =>  {
        $("#panel-store-medis").show();
        $('#select_medi').show();

            $("#select_medi").append("<label onclick='remove(this)' for='s-medi"+res.data.id+"' id='s-medi' class='badge badge-info m-1 s-medi'> <input type='checkbox' checked name='medi[]' data-name='"+res.data.medicamento+"'  value='" +res.data.id+ "' >"+ res.data.medicamento +"</label>");
        iziToast.success({
            timeout: 3000,
            title: 'Éxito',
            position: 'topRight',
            message: 'Medicamento agregado correctamente',
        });
        $( "#otros_medis" ).val("");
        $("#btn_select_medi").show();

    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Algo salio mal, intentelo de nuevo y recargue.',
        });
    }); 
});

// ********************** TERMINA BUSCAR MEDICAMENTOS ***********************


