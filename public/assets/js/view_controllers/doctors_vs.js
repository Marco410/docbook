

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

            if(res.data[0].apellido_m === null){
                $ap_m = "";
            }else{
                $ap_m  = res.data[0].apellido_m;
            }
            
            $("#p_nombre").html(res.data[0].nombre + " " + res.data[0].apellido_p + " " + $ap_m );
            $("#p_folio").html("P-"+res.data[0].id);
            $("#p_genero").html(res.data[0].sexo);
            $("#p_registro").html(res.data[0].created_at);
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