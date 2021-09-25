var table = $('#table_diagnosticos').DataTable({
    fixedHeader: true,
    scrollY: true,
    order: [ 0, 'asc' ],
    /* columnDefs: [{
        //orderable: true,
        targets:   [5],
    },
    //{ targets: [0], visible: false }
    ], */
    language: {
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
    },
    ajax:{
        type:"get",
        url: "/get-diagnostics",
    },
    columns:[
        {"data":"id"},
        {"data":"cod_3"},
        {"data":"descripcion_3"},
        {"data":"cod_4"},
        {"data":"descripcion_4"},
        {"defaultContent":"<button id='btn-add-diagnostic' class='btn btn-sm bg-primary-light'><i class='fas fa-plus'></i></button>"}
    ],
});

$("#table_diagnosticos").on("click", "#btn-add-diagnostic", function(){
    var data = table.row( $(this).parents("tr") ).data();
  
    $("#diagnostico_principal").val(data.descripcion_4);

    $("#diagnostico_principal").attr("data-id",data.id);

    $("#agregar_diagnostico").modal("hide");

    $("#agregar_diagnostico").on("hidden.bs.modal",function(){
        $(".body-historial").addClass("modal-open");
    });
    
});


var table_art = $('#table_articulos').DataTable({
    fixedHeader: true,
    scrollY: true,
    order: [ 0, 'asc' ],
    /* columnDefs: [{
        //orderable: true,
        targets:   [5],
    },
    //{ targets: [0], visible: false }
    ], */
    language: {
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
    },
    ajax:{
        url: "/get-articulos?user="+$("#clinic_id").val(),
        type:"get",
    },
    columns:[
        {"data":"id"},
        {"data":"articulo"},
        {"data":"descripcion"},
        {"defaultContent":"<button id='btn-add-article' class='btn btn-sm bg-primary-light'><i class='fas fa-plus'></i></button>"}
    ],
});

$("#table_articulos").on("click", "#btn-add-article", function(){
    var data = table_art.row( $(this).parents("tr") ).data();
  
    $("#panel-articulos-rapida-articulo").append("<div class='card articulo"+data.id+"' ><div class='card-header'><div class='card-title'><h5 class='text-info'  > <i class='fas fa-file' ></i> "+data.articulo+" <i onclick='removeArt(this)' data-id='"+data.id+"' class='fas fa-times-circle text-danger' ></i></h5><p>"+data.descripcion+"</p>  </div></div> <div class='card-body'><textarea class='form-control' name='indicaciones' placeholder='Escribe las indicaciones' ></textarea><input type='hidden' name='id_articulo' value='"+data.id+"' /> </div></div>");

    $("#agregar_articulo").modal("hide");
    
    $("#agregar_articulo").on("hidden.bs.modal",function(){
        $(".body-historial").addClass("modal-open");
    });
});

var table_estu = $('#table_estudios').DataTable({
    fixedHeader: true,
    scrollY: true,
    order: [ 0, 'asc' ],
    language: {
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
    },
    ajax:{
        url: "/get-estudios",
        type:"get",
    },
    columns:[
        {"data":"id"},
        {"data":"estudio"},
        {"defaultContent":"<button id='btn-add-estu' class='btn btn-sm bg-primary-light'><i class='fas fa-plus'></i></button>"}
    ],
});

$("#table_estudios").on("click", "#btn-add-estu", function(){
  var data = table_estu.row( $(this).parents("tr") ).data();
  $("#panel-estudios-rapida-estudio").append("<div class='card estudio"+data.id+"' ><div class='card-header'><div class='card-title'><h5 class='text-info'  > <i class='fas fa-file' ></i> "+data.estudio+" <i onclick='removeEstudio(this)' data-id='"+data.id+"' class='fas fa-times-circle text-danger' ></i></h5></div></div> <div class='card-body'><textarea class='form-control' name='observaciones' placeholder='Escribe las observaciones' ></textarea><input type='hidden' name='id_estudio' value='"+data.id+"' /> </div></div>");

    $("#agregar_estudio").modal("hide");
    
    $("#agregar_estudio").on("hidden.bs.modal",function(){
        $(".body-historial").addClass("modal-open");
    });
    
});
