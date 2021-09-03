
//Guarda el array de vacunas
$('#btn-store-vacunas').on("click", function(){

    var vacunasInput = document.getElementsByName('vacuna[]');

    var vacunas = [];
    Array.prototype.forEach.call(vacunasInput, function(el) {
        vacunas.push(el.value);
    });
    
    var fd = new FormData();
    csrftoken = getCookie('csrftoken');
    fd.append("csrfmiddlewaretoken",csrftoken);
    fd.append("paciente_id",$("#paciente_id").val());
    
    fd.append("vacunas",vacunas);
                
    const response =  axios.post('/store-vacunas',fd,{
       
    }).then(res =>  {

        for (i = 0; i < res.data.length; i++){
            $("#vacunas_conocidas").append("<label style='padding: 5px 10px 5px 10px;'  for='s-vacuna' id='s-vacuna" +res.data[i].id+ "' class='badge badge-info m-1 s-vacuna'> <input disabled type='hidden' checked  value='" +res.data[i].id+ "' >"+ res.data[i].vacuna +" </label><i class='fas fa-trash text-danger' onclick='eliminar_vacuna(this)' data-id='" +res.data[i].id+ "'   > </i> ");
        }

        $("#panel-store-vacunas").hide();
        $('#select_vacuna').html("");
        vacunas = [];
        

    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Algo salio mal, intentelo de nuevo y recargue.',
        });
    }); 

});

function eliminar_vacuna(elemento){

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
                fd.append('vacuna_id',elemento.getAttribute('data-id') )
                            
                const response =  axios.post('/destroy-vacunas',fd,{
                   
                }).then(res =>  {
                    iziToast.success({
                        timeout: 6000,
                        title: 'Éxito',
                        position: 'topRight',
                        message: 'Vacuna eliminada.',
                    });

                    elemento.remove();
                    $("#s-vacuna"+elemento.getAttribute('data-id')).remove();
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

 $("#buscar_vacuna").autocomplete({
    source: function(request,response){
        $.ajax({
            url: '/get-vacunas',
            type:  'get',
            dataType:"json",
            data:{
                term: request.term
            },
            success:function(data){
                response($.map(data, function (item) {
                    return {
                        label: item.vacuna,
                        value: item.vacuna,
                        idvalue: item.id
                    }
                }))
            }   
        })
    },
    select: function(event, ui) {
        if(ui.item){
            $("#panel-store-vacunas").show();
            $('#select_vacuna').show();

            $("#select_vacuna").append("<label onclick='remove(this)' for='s-vacuna"+ui.item.idvalue+"' id='s-vacuna' class='badge badge-info m-1 s-vacuna'> <input type='checkbox' checked name='vacuna[]' data-name='"+ui.item.value+"'  value='" +ui.item.idvalue+ "' >"+ ui.item.value +"</label>");
        }        
    },
    close: function( event, ui ) {
        $("#btn_select_vacuna").show();
        $("#buscar_vacuna").val("");
    }
});



$( "#otras_vacunas" ).keyup(function() {
    if($(this).val() == ""){
        $("#btn-guardar-nueva-vacuna").hide();
    }else if ($(this).val().length > 2){

        $("#btn-guardar-nueva-vacuna").show();

    }    
});

$("#btn-new-vacuna").on("click",function(){
    var fd = new FormData();
    csrftoken = getCookie('csrftoken');
    fd.append("csrfmiddlewaretoken",csrftoken);
    fd.append("otras_vacunas",$( "#otras_vacunas" ).val());
            
    const response =  axios.post('/save-new-vacuna',fd,{
       
    }).then(res =>  {
        $("#panel-store-vacunas").show();
        $('#select_vacuna').show();

            $("#select_vacuna").append("<label onclick='remove(this)' for='s-vacuna"+res.data.id+"' id='s-vacuna' class='badge badge-info m-1 s-vacuna'> <input type='checkbox' checked name='vacuna[]' data-name='"+res.data.vacuna+"'  value='" +res.data.id+ "' >"+ res.data.vacuna +"</label>");
        iziToast.success({
            timeout: 3000,
            title: 'Éxito',
            position: 'topRight',
            message: 'Vacuna agregada correctamente',
        });
        $( "#otras_vacunas" ).val("");
        $("#btn_select_vacuna").show();

    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Algo salio mal, intentelo de nuevo y recargue.',
        });
    }); 
});

// ********************** TERMINA BUSCAR VACUNAS ***********************


