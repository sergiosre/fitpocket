$(document).ready(function() {

    //recuperamos id usuario para consultar sus datos
    var user_id = $("#user_id").val();

    //peticion ajax para consultar sus datos
    var url = "http://127.0.0.1/fitpocket/user/getInfoJsonById";
    $.ajax({
        type: "POST",
        url: url,
        dataType: "json",
        data: { id: user_id },
        success: function(data) {
            if (data.status == 'ok') {
                rellenarDatosUsuario(data);

            } else {
                alert("ERROR SERVIDOR")
            }
        }
    });


    //editar la foto de perfil
    $("button#editarFotoPerfil").click(function(e) {
        e.preventDefault();

        $("#imgInp").change(function() {
            readURL(this);
        });

        //cuando le damos a guardar se actualiza
        $("button#updateImgPerfil").click(function(e) {
            e.preventDefault();

            var form = $('form#formUpdateImg')[0];

            // Create an FormData object 
            var data = new FormData(form);

            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "http://127.0.0.1/fitpocket/user/updateImgPerfil",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {

                    if (response == 1) {
                        location.reload();
                    } else {
                        alert("Error subiendo la imagen");
                    }

                },
                error: function(e) {
                    alert("Error subiendo la imagen");
                }
            });

        });

    });



    //efecto fadeIn para la imagen de perfil
    $("img#user_image").fadeIn(1000)

});

//funcion que rellena los datos de usuario con el json recibido de la petición ajax
function rellenarDatosUsuario(data) {

    //asigna los datos al formulario del modal
    $("#nombre").val(data.user.nombre);
    $("#apellidos").val(data.user.apellidos);
    $("#email").val(data.user.email);
    $("#usuario").val(data.user.usuario);
    $("#edad").val(data.user.edad);
    $("#estatura").val(data.user.estatura);
    $("#movil").val(data.user.movil);

    //ruta de la imagen
    var baseUrl = $("#user_image").attr("src");
    $("#user_image").attr("src", baseUrl + data.user.img);

}

//funcion para previsualizar la nueva de perfil
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#new_image').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}