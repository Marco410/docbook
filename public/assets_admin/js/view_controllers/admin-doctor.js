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

var table_doctors = $('#table_doctors').DataTable({
    fixedHeader: true,
    scrollY: true,
    order: [ 0, 'asc' ],
    columnDefs: [{
        //orderable: true,
        targets:   [6],
    },
    { targets: [0], visible: false }
    ],
    language: espanol,
    ajax:{
        type:"get",
        url: "/get-doctores",
    },
    columns:[
        {"data":"id"},
        {"data":"nombre"},
        {"data":"especialidad.0.nombre"},
        {"data":"created_at",
        "render":function(value){
            return moment(value).format('DD-MMM-YYYY HH:mm a');
        }},
        {"data":"pais"},
        {"data":"status","render":function(value){
            if(value == "1"){
                var c = "checked";
            }else{
                var c = "";
            }
            return "<div class='status-toggle' id='btn-status'><input type='checkbox' class='check' "+c+"  /> <label class='checktoggle'>checkbox</label></div>";
        }},
        {"defaultContent":"<a class='btn btn-sm bg-success-light' id='btn-editar-doctor' ><i class='fe fe-pencil'></i> Editar</a>"}
        
    ],
});

$("#table_doctors").on("click", "#btn-status", function(){
    var data = table_doctors.row( $(this).parents("tr") ).data();
    var status = 0;
    $("#btn-status").find('input').each(function() {
        if( $(this).attr('checked') ) {
            $(this).prop("checked", false);
            status = 0;   
        }else{
            $(this).prop("checked", true);
            status = 1
        }
        var fd = new FormData();
        csrftoken = getCookie('csrftoken');
        fd.append("csrfmiddlewaretoken",csrftoken);
        fd.append("id",data.id);
        fd.append("status",status);
        const response =  axios.post('/admin/cambiar-status',fd,{
        }).then(res =>  {

            iziToast.success({
                timeout: 3000,
                title: 'Éxito',
                position: 'topRight',
                message: 'Estatus actualizado correctamente',
            });

            setTimeout(function(){
                window.location.reload();
            },1500);


        }).catch((err) => {
            iziToast.error({
                timeout: 6000,
                title: 'Error',
                position: 'topRight',
                message: 'Algo salio mal, intentelo de nuevo y recargue.',
            });
        }); 
    });
});

$("#table_doctors").on("click", "#btn-editar-doctor", function(){
    var data = table_doctors.row( $(this).parents("tr") ).data();
    window.location = "editar-doctor/"+ data.id;
    
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