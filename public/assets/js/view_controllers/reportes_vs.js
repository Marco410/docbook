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


$('#btn_report_hoja').on("click", function(){

        var date_diaria = $("#date_diaria").val();

        if(date_diaria == ""){
            iziToast.warning({
                timeout: 3000,
                title: 'Cuidado',
                position: 'center',
                message: 'Selecciona una fecha.',
            });
        }else{
            
            var fd = new FormData();
            csrftoken = getCookie('csrftoken');
            fd.append("csrfmiddlewaretoken",csrftoken);
            fd.append("date_diario",date_diaria);
        
            console.log(date_diaria);
     
            const response =  axios.post('/make-report-diario',fd,{
            }).then(res =>  {
        
                iziToast.success({
                    timeout: 3000,
                    title: 'Éxito',
                    position: 'center',
                    message: 'Realizando Reporte. Guardando... (Espere)',
                });
                
                setTimeout(function(){
                    window.open(res['data']['pdf']);
                },3000);
            }).catch((err) => {
                iziToast.error({
                    timeout: 6000,
                    title: 'Error',
                    position: 'topRight',
                    message: 'Algo salio mal, intentelo de nuevo y recargue.',
                });
            }); 
        }


});

$('#btn_report_resumen').on("click", function(){

    var paciente_id = $("#paciente_id").val();

    if(paciente_id == ""){
        iziToast.warning({
            timeout: 3000,
            title: 'Cuidado',
            position: 'center',
            message: 'Selecciona una paciente.',
        });
    }else{
        
        var fd = new FormData();
        csrftoken = getCookie('csrftoken');
        fd.append("csrfmiddlewaretoken",csrftoken);
        fd.append("paciente_id",paciente_id);
    
        console.log(paciente_id);
 
        const response =  axios.post('/make-report-resumen',fd,{
        }).then(res =>  {
    
            iziToast.success({
                timeout: 3000,
                title: 'Éxito',
                position: 'center',
                message: 'Realizando Reporte. Guardando... (Espere)',
            });
            
            setTimeout(function(){
                window.open(res['data']['pdf']);
            },3000);
        }).catch((err) => {
            iziToast.error({
                timeout: 6000,
                title: 'Error',
                position: 'topRight',
                message: 'Algo salio mal, intentelo de nuevo y recargue.',
            });
        }); 
    }


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