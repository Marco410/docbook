console.log("entre");

$('.medicina').change(function(){

    if( $(this).attr('checked') ) {
        $(".medicine_div").show();
        console.log("Lo muestra");
    }else{
        $(".medicine_div").hide();
        console.log("No muestra");
    }
            
});


function show_medicine(element){

    $(".medicine_div").show();
    if( $(element).attr('value') === "1" ) {
        $(element).val(0);
    }else{
        $(".medicine_div").hide();
        $(element).val(1);
    }
           

}

function add_medicine(){

    $(".medicine_input").append(
        "<input type='text' id='medicine_name' name='medicamentos[]' value='' class='form-control' placeholder='Nombre de la Medicina'><input type='text' value='' id='dosage' name='dosis[]' class='form-control' placeholder='Dosis'><br>"
    );

}