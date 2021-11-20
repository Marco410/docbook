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

var table_clinics = $('#table_clinics').DataTable({
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
        url: "/get-clinicas",
    },
    columns:[
        {"data":"id"},
        {"data":"logotipo_base64","render": function(value){
            return "<img width='20px' src='"+value+"' />"
        }},
        {"data":"nombre_consultorio"},
        {"data":"estado_consultorio"},
        {"data":"no_medicos"},
        {"data":"tel_consultorio"},
        {"data":"nombre_organizacion"},
        {"defaultContent":"<a class='btn btn-sm bg-success-light' id='btn-editar-clinic' ><i class='fe fe-pencil'></i> Editar</a><a id='btn-delete-clinic'  class='btn btn-sm bg-danger-light'><i class='fe fe-trash'></i> Eliminar</a>"}
    ],
});

$("#table_clinics").on("click", "#btn-editar-clinic", function(){
    var data = table_clinics.row( $(this).parents("tr") ).data();

    console.log(data.id);
    window.location = "editar-clinica/"+ data.id;
    
});

$("#table_clinics").on("click", "#btn-delete-clinic", function(){
    var data = table_clinics.row( $(this).parents("tr") ).data();
    console.log(data.id);
    $("#btn-delete-clinica").attr("data-id",data.id);
    $("#delete_modal").modal("show");
});