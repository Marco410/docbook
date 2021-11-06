

function verificar_caja(){
    caja = document.getElementById("check_caja_id").value;
    fecha = document.getElementById("check_caja_fecha").value;
    clinica = document.getElementById("check_caja_clinic").value;
    doctor = document.getElementById("check_caja_doctor").value;
    apertura = document.getElementById("check_caja_apertura").value;
    console.log(caja);

    var fd = new FormData();    
    fd.append("caja",caja);
    fd.append("fecha",fecha);
    fd.append("apertura",apertura);
    fd.append("clinica",clinica);
    fd.append("doctor",doctor);


    const response =  axios.post('/close-caja-check',fd,{
    }).then(res =>  {

        iziToast.warning({
            timeout: 3000,
            title: 'Éxito',
            position: 'center',
            message: 'Se cerro una caja automaticamente',
        });

        console.log(res);
        var pathname = window.location.pathname;
        if (pathname == "/caja"){
            alert("Se cerro una caja automaticamente por pasarse de fecha");
            window.location.reload();
        }

    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Ocurrio un error al cerrar la caja.',
        });
    }); 
    
   /* alert("Se paso la fecha"); */

}