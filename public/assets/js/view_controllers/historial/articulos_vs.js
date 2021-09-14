$(".btn-add-articulo").on("click",function(){

    $("#panel-articulos-rapida-articulo").append("<div class='card articulo"+$(this).attr("data-id")+"' ><div class='card-header'><div class='card-title'><h5 class='text-info'  > <i class='fas fa-file' ></i> "+$(this).attr("data-value")+" <i onclick='removeArt(this)' data-id='"+$(this).attr("data-id")+"' class='fas fa-times-circle text-danger' ></i></h5><p>"+$(this).attr("data-des") +"</p>  </div></div> <div class='card-body'><textarea class='form-control' name='indicaciones' placeholder='Escribe las indicaciones' ></textarea><input type='hidden' name='id_articulo' value='"+$(this).attr("data-id")+"' /> </div></div>");

    $("#agregar_articulo").modal("hide");
    
    $("#agregar_articulo").on("hidden.bs.modal",function(){
        $(".body-historial").addClass("modal-open");
    });

});

$("#btn-add-new-articulo").on("click", function(){
    var articulo = $("#new_articulo_rapida").val();
    var descripcion = $("#new_descripcion_rapida").val();
    var clinic_id = $("#clinic_id").val();

    var fd = new FormData();
    csrftoken = getCookie('csrftoken');
    fd.append("csrfmiddlewaretoken",csrftoken);
    fd.append("articulo",articulo);
    fd.append("descripcion",descripcion);
    fd.append("clinica_id",clinic_id);

    console.log(clinic_id);
    
    const response =  axios.post('/save-new-articulo',fd,{
       
    }).then(res =>  {

        document.getElementById("table-articulos").insertRow(-1).innerHTML = "<td>M-"+res.data.id+"</td><td>"+res.data.articulo+"</td><td></td>";
    
        $("#panel-articulos-rapida-articulo").append("<div class='card' ><div class='card-header'><div class='card-title'><h5 class='text-info'  > <i class='fas fa-file' ></i> "+res.data.articulo+" <i onclick='removeArt(this)' data-id='"+res.data.id+"' class='fas fa-times-circle text-danger' ></i></h5><p>"+res.data.descripcion+"</p></div></div> <div class='card-body'><textarea class='form-control' name='indicaciones' placeholder='Escribe las indicaciones' ></textarea><input type='hidden' name='id_articulo' value='"+res.data.id+"' /> </div></div>");

        $("#agregar_articulo").modal("hide");
    
        $("#agregar_articulo").on("hidden.bs.modal",function(){
            $(".body-historial").addClass("modal-open");
        });

    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Algo salio mal, intentelo de nuevo y recargue.',
        });
        console.log(err);
    }); 

    
});

function removeArt(elemento){
    $(".articulo"+elemento.getAttribute("data-id")).remove();
}