var espanol = {
    "sProcessing":     "Procesando...",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
};

$('#table_pacients').DataTable({
    fixedHeader: true,
    scrollY: true,
    order: [ 0, 'desc' ],
    language: espanol
});


$('.btn-ver').on('click',function(){
    var id = $(this).attr("data-id");

    $("#patient_details").modal("show");

    const response =  axios.get('/get_patient/'+id,{
        /*onUploadProgress(e){
            var progress = (e.loaded*100) / e.total;
            var element = document.getElementById('file-upload');
            element.style.width= progress+"%";
        }*/
        }).then(res =>  {

            var momentObj = moment(res.data[0].created_at);
            var momentString = momentObj.format('DD-MM-YYYY LT');

            if(res.data[0].apellido_m === null){
                $ap_m = "";
            }else{
                $ap_m  = res.data[0].apellido_m;
            }
            
            $("#p_nombre").html(res.data[0].nombre + " " + res.data[0].apellido_p + " " + $ap_m );
            $("#p_folio").html("P-"+res.data[0].id);
            $("#p_genero").html(res.data[0].sexo);
            $("#p_registro").html(momentString);
            $("#p_sangre").html(res.data[0].tipo_sangre);
            $("#p_telefono").html(res.data[0].telefono);
            $("#p_email").html(res.data[0].email);

    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Algo salio mal, intentelo de nuevo y recargue.',
        });
    }); 

});

$('.btn-delete').on('click',function(){
    var id = $(this).attr("data-id");

    iziToast.question({
        timeout: 20000,
        close: false,
        overlay: true,
        displayMode: 'once',
        id: 'question',
        zindex: 999,
        title: 'Cuidado',
        message: '¿Estás seguro de eliminar a este paciente?',
        position: 'center',
        buttons: [
            ['<button><b>Si</b></button>', function (instance, toast) {
     
                instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

                const response =  axios.get('/delete-patient/'+id,{}).then(res =>  {

                    iziToast.success({
                        timeout: 6000,
                        title: 'Éxito',
                        position: 'center',
                        message: 'Borrando el paciente...',
                    });

                    setTimeout(function(){
                        location.reload();
                    },3000);

                    }).catch((err) => {
                        iziToast.error({
                            timeout: 6000,
                            title: 'Error',
                            position: 'topRight',
                            message: 'Algo salio mal, intentelo de nuevo y recargue.',
                        });
                    }); 
                
            }, true],
            ['<button>No</button>', function (instance, toast) {
                
                
                instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
     
            }],
        ]
    });
    

});

$("#clinic_is_registered").on("click",function(){

    if( $(this).is(':checked') ) {
        $("#registradas").show();
        $("#registrar_clinic").hide();

        $("#clinic_is").val("1");
    }else{
        $("#registradas").hide();
        $("#registrar_clinic").show();

        $("#clinic_is").val("0");
    }

});