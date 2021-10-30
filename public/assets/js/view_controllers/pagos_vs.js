$("#is_factura").on("click",function(){
    
    if( $('#is_factura').prop('checked') ) {
        console.log("Esta seleccionado");
        $("#factura").show();
    }else{
        console.log("No esta seleccionado");
        $("#factura").hide();
    }
});