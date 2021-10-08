$("#btn-add-new-estudio").on("click", function(){
    var estudio = $("#new_estudio_rapida").val();

    var fd = new FormData();
    csrftoken = getCookie('csrftoken');
    fd.append("csrfmiddlewaretoken",csrftoken);
    fd.append("estudio",estudio);

    
    const response =  axios.post('/save-new-estudio',fd,{
       
    }).then(res =>  {

        document.getElementById("table_articulos").insertRow(-1).innerHTML = "<td>M-"+res.data.id+"</td><td>"+res.data.estudio+"</td><td></td>";

        $("#panel-estudios-rapida-estudio").append("<div class='card estudio"+res.data.id+"' ><div class='card-header'><div class='card-title'><h5 class='text-info'  > <i class='fas fa-file' ></i> "+res.data.estudio+" <i onclick='removeEstudio(this)' data-id='"+res.data.id+"' class='fas fa-times-circle text-danger' ></i></h5></div></div> <div class='card-body'><textarea class='form-control' name='observaciones' placeholder='Escribe las observaciones' ></textarea><input type='hidden' name='id_estudio' value='"+res.data.id+"' /> </div></div>");
    

        $("#agregar_estudio").modal("hide");
    
        $("#agregar_estudio").on("hidden.bs.modal",function(){
            $(".body-historial").addClass("modal-open");
        });

    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Algo salio mal, intentelo de nuevo y recargue.',
        });
    }); 

    
});

function removeEstudio(elemento){
    $(".estudio"+elemento.getAttribute("data-id")).remove();
}
