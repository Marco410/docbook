$(".btn-editar").click ( function(){
    $("#id_espe").val($(this).attr("data-id"));
    $("#nombre_edit").val($(this).attr("data-value"));
});


$(".btn-delete").click ( function(){
    $("#id_espe_d").val($(this).attr("data-id"));
    console.log("entra");
});
