
//cambia el estatus de si tiene o no alergias
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

$('.make_report_close').on("click", function(){

    var fd = new FormData();
    csrftoken = getCookie('csrftoken');
    fd.append("csrfmiddlewaretoken",csrftoken);
    fd.append("caja_id",$(this).attr("data-id"));
    fd.append("clinic_id",$("#clinic_id").val());
    fd.append("report_type",$(this).attr("data-type"));
    fd.append("day",$(this).attr("data-day"));


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