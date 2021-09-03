console.log("listo");

$("#password_confirm").keyup(function(){
    pass_confirm = $(this).val();
    pass = $("#password").val();

    if (pass_confirm == pass){
        $("#msj-pass").hide();
    }else{
        $("#msj-pass").show();
        $("#msj-pass").html("Las contraseñas no coinciden");
    }
});