
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

    console.log("reporte");

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