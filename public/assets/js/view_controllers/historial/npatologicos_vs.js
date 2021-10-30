//---------------------------------------
if($("#fisica1").is(":checked")){
    $("#p-text-fisica").show();
}else{
    $("#p-text-fisica").hide();
}

$("#fisica1").on("click",function(){
    $("#p-text-fisica").show();
});

$("#fisica2").on("click",function(){
    $("#p-text-fisica").hide();
});
//---------------------------------------
if($("#tabaco1").is(":checked")){
    $("#p-text-tabaco").show();
}else{
    $("#p-text-tabaco").hide();
}

$("#tabaco1").on("click",function(){
    $("#p-text-tabaco").show();
});

$("#tabaco2").on("click",function(){
    $("#p-text-tabaco").hide();
});
//---------------------------------------
if($("#alcohol1").is(":checked")){
    $("#p-text-alcohol").show();
}else{
    $("#p-text-alcohol").hide();
}

$("#alcohol1").on("click",function(){
    $("#p-text-alcohol").show();
});

$("#alcohol2").on("click",function(){
    $("#p-text-alcohol").hide();
});
//---------------------------------------
if($("#sustancias1").is(":checked")){
    $("#p-text-sustancias").show();
}else{
    $("#p-text-sustancias").hide();
}

$("#sustancias1").on("click",function(){
    $("#p-text-sustancias").show();
});

$("#sustancias2").on("click",function(){
    $("#p-text-sustancias").hide();
});
//---------------------------------------
if($("#vacuna_reciente1").is(":checked")){
    $("#p-text-vacuna_reciente").show();
}else{
    $("#p-text-vacuna_reciente").hide();
}

$("#vacuna_reciente1").on("click",function(){
    $("#p-text-vacuna_reciente").show();
});

$("#vacuna_reciente2").on("click",function(){
    $("#p-text-vacuna_reciente").hide();
});