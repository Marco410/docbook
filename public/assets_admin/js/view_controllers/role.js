$(".btn-editar").click ( function(){
    $("#id_rol_edit").val($(this).attr("data-id"));
    $("#name_edit").val($(this).attr("data-value"));
});


$(".btn-delete").click ( function(){
    $("#id_espe_d").val($(this).attr("data-id"));
});
