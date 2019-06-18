$(document).ready(function() {



    $("input[type=submit]").click(function(e) {

        e.preventDefault();

        var nombre = $("#nombre").val();
        var info = $("#info").val();
        var impacto = $("#impacto").val();

        //comprobacion de campos no vacios
        if (nombre != "" && info != "" && impacto != "") {

            console.log("OK");

            $.ajax({
                url: "http://127.0.0.1/fitpocket/actividad/comprobarActividad",
                type: "POST",
                data: {
                    nombre: nombre,
                    info: info,
                    impacto: impacto,

                },
                success: function(response) {

                    //alert(response);
                    if (response == 1) {

                        $("form").submit();

                    } else {
                        alert("Actividad ya existe, NO SE PODRÁ CREAR");
                    }
                    // //$("#mensaje").html(msg);
                }

            });


        } else {
            alert("faltan datos")


        }


    })
});