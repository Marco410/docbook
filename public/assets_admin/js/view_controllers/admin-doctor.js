
$('.status').change(function(){

    var id = $(this).attr("data-id");

    var fd = new FormData();
    csrftoken = getCookie('csrftoken');
    fd.append("csrfmiddlewaretoken",csrftoken);
    fd.append("id",id);

    if( $(this).attr('checked') ) {
        fd.append("status",0);
    }else{
        fd.append("status",1);
    }
            
    const response =  axios.post('/admin/cambiar-status',fd,{
        /*onUploadProgress(e){
            var progress = (e.loaded*100) / e.total;
            var element = document.getElementById('file-upload');
            element.style.width= progress+"%";
        }*/
    }).then(res =>  {

        iziToast.success({
            timeout: 3000,
            title: 'Éxito',
            position: 'topRight',
            message: 'Estatus actualizado correctamente',
        });

    }).catch((err) => {
        iziToast.error({
            timeout: 6000,
            title: 'Error',
            position: 'topRight',
            message: 'Algo salio mal, intentelo de nuevo y recargue.',
        });
    }); 
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