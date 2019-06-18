$(document).ready(function() {

    var user_id = $("input#user_id").val();
    console.log(user_id);


    //cuando damos click a publicar
    $("button#publicar").click(function(e) {
        e.preventDefault();
        var texto = $("form#tweet").find("textarea#text-post").val();


        if (texto == "") {
            swal({
                title: "Tu fittweet no tiene texto",
                text: "¡Seguro que tienes algo que contar!",
                icon: "error",
                button: "Aceptar",
            });
        }

        $.ajax({
            type: "post",
            url: "http://127.0.0.1/fitpocket/user/publicarTweet",
            data: {
                user_id: user_id,
                texto: texto,
            },
            success: function(response) {

                if (response == 1) {
                    swal({
                        title: "Fittweet publicado con éxito",
                        text: "se recargará la página en breves",
                        icon: "success",
                        button: "Aceptar",
                    });

                    setTimeout(location.reload.bind(location), 2000);
                } else {
                    swal({
                        title: "Algo ha salido mal",
                        text: "Vuelva a intentarlo en unos minutos",
                        icon: "error",
                        button: "Aceptar",
                    });
                }


            }
        });

    });


});