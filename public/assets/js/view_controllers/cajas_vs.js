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

var table_caja = $('#table_cajas').DataTable({
    fixedHeader: true,
    scrollY: true,
    order: [ 0, 'desc' ],
    language: espanol,
    ajax:{
        url: "/get-cajas?clinic="+$("#clinic_id").val()+"&user="+$("#doctor_id").val(),
        type:"get",
    },
    columns:[
        {"data":"id"},
        {"data":"abierta",
        "render":function(value){
            if(value == "1"){
                return "<span class='text-success' >Abierta</span>"
            }else{
                return "<span class='text-danger' >Cerrada</span>"
            }
        }},
        {"data":"apertura",
        "render": function(value){
            if(value == null){
                return "$";
            }else{
                return "$"+value;
            }
        }},
        {"data":"entradas",
        "render": function(value){
            if(value == null){
                return "$";
            }else{
                return "$"+value;
            }
        }},
        {"data":"salidas",
        "render": function(value){
            if(value == null){
                return "$";
            }else{
                return "$"+value;
            }
        }},
        {"data":"ventas_efectivo",
        "render": function(value){
            if(value == null){
                return "$";
            }else{
                return "$"+value;
            }
        }},
        {"data":"ventas_tarjeta",
        "render": function(value){
            if(value == null){
                return "$";
            }else{
                return "$"+value;
            }
        }},
        {"data":"ventas_transferencia",
        "render": function(value){
            if(value == null){
                return "$";
            }else{
                return "$"+value;
            }
        }},
        {"data":"total",
        "render": function(value){
            if(value == null){
                return "$";
            }else{
                return "$"+value;
            }
        }},
        {"data":"created_at",
        "render":function(value){
            return moment(value).format('DD-MMM-YYYY HH:mm a');
        }},
        {"data":"updated_at",
        "render":function(value){
            return moment(value).format('DD-MMM-YYYY HH:mm a');
        }},
        {"defaultContent":"<button title='Reporte Sencillo' id='make_report_close' class='btn bg-info-light btn-sm'><i class='fas fa-file'></i></button><button id='make_report_close_global' class='btn bg-primary-light btn-sm'><i class='fas fa-globe'></i></button>"}
    ],
});

$('#table_cajas tbody').on('click', '#make_report_close', function () {
    var data = table_caja.row( $(this).parents("tr") ).data();
    var date = moment(data.created_at).format('YY-M-DD');

    //var date = data.created_at;
    var type = "Sencillo";
    make_report_close(data.id,type,date);
    
} );

$('#table_cajas tbody').on('click', '#make_report_close_global', function () {
    var data = table_caja.row( $(this).parents("tr") ).data();
    var date = moment(data.created_at).format('YY-M-DD');
    
    var type = "Detallado";
    
    console.log(date);
    make_report_close(data.id,type,date);


} );



$('#close_caja').on("click", function(){

    iziToast.question({
        timeout: 20000,
        close: false,
        overlay: true,
        displayMode: 'once',
        id: 'question',
        zindex: 999,
        title: '',
        message: '¿Estás seguro de cerrar caja hoy?',
        position: 'center',
        buttons: [
            ['<button><b>Si</b></button>', function (instance, toast) {
     
                instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                var fd = new FormData();
                csrftoken = getCookie('csrftoken');
                fd.append("csrfmiddlewaretoken",csrftoken);
                fd.append("clinic_id",$("#clinic_id").val());
                fd.append("caja_id",$("#caja_id").val());
                fd.append("entradas",$("#entradas").val());
                fd.append("salidas",$("#salidas").val());
                fd.append("ventas_efectivo",$("#ventas_efectivo").val());
                fd.append("ventas_tarjeta",$("#ventas_tarjeta").val());
                fd.append("ventas_transferencia",$("#ventas_transferencia").val());
                fd.append("ventas_total",$("#ventas_total").val());
                
                const response =  axios.post('/close-caja',fd,{
                }).then(res =>  {
                    location.reload();

                }).catch((err) => {
                    iziToast.error({
                        timeout: 6000,
                        title: 'Error',
                        position: 'topRight',
                        message: 'Algo salio mal, intentelo de nuevo y recargue.',
                    });
                }); 
                
            }, true],
            ['<button>NO</button>', function (instance, toast) {
                
                instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
     
            }],
        ]
    });

   

});

$('#make_report').on("click", function(){

    var fd = new FormData();
    csrftoken = getCookie('csrftoken');
    fd.append("csrfmiddlewaretoken",csrftoken);
    fd.append("caja_id",$("#caja_id").val());
    fd.append("apertura",$("#apertura").val());
    fd.append("entradas",$("#entradas").val());
    fd.append("salidas",$("#salidas").val());
    fd.append("ventas_efectivo",$("#ventas_efectivo").val());
    fd.append("ventas_tarjeta",$("#ventas_tarjeta").val());
    fd.append("ventas_transferencia",$("#ventas_transferencia").val());
    fd.append("ventas_total",$("#ventas_total").val());

    const response =  axios.post('/make-report',fd,{
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
});


$('#make_report_date').on("click", function(){

    ini = $("#fecha_ini").val();
    fin = $("#fecha_fin").val();

    var fd = new FormData();
    csrftoken = getCookie('csrftoken');
    fd.append("csrfmiddlewaretoken",csrftoken);
    fd.append("clinic_id",$("#clinic_id").val());
    fd.append("fecha_ini",ini);
    fd.append("fecha_fin",fin);

    const response =  axios.post('/make-report-date',fd,{
    }).then(res =>  {

        iziToast.success({
            timeout: 3000,
            title: 'Éxito',
            position: 'center',
            message: 'Mostrando Reporte (Espere)',
        });
        setTimeout(function(){
            window.open(res['data']['pdf']);
        },2500);

    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Algo salio mal, intentelo de nuevo y recargue.',
        });
    }); 
});

function make_report_close(caja_id,type_report,date){
    var fd = new FormData();
    csrftoken = getCookie('csrftoken');
    fd.append("csrfmiddlewaretoken",csrftoken);
    fd.append("caja_id",caja_id);
    fd.append("clinic_id",$("#clinic_id").val());
    fd.append("report_type",type_report);
    fd.append("date",date);


    const response =  axios.post('/make-report-close',fd,{
    }).then(res =>  {

        iziToast.success({
            timeout: 3000,
            title: 'Éxito',
            position: 'center',
            message: 'Mostrando Reporte (Espere)',
        });

        console.log(res);

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