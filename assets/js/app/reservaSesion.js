$(document).ready(function() {


    //inicia los tabs de Jquery UI
    $(function() {
        $("#tabs").tabs();
        //selecciona el tab del día actual
        var currentTime = new Date;
        $("#tabs").tabs("option", "active", currentTime.getDay() - 1);
    });

    //comprobar si se puede borrar
    $('a[href="#ex7"]').click(function(event) {
        event.preventDefault();
        $(this).modal({
            fadeDuration: 250
        });
    });


    /******     script para los dias de la semana     ******/
    var currentTime = new Date;
    var hora = currentTime.getHours() + ":" + currentTime.getMinutes() + ":" + currentTime.getSeconds();
    var dia = "";
    switch (currentTime.getDay()) {
        case 1:
            dia = "lunes";
            break;
        case 2:
            dia = "martes"
            break;
        case 3:
            dia = "miercoles"
            break;
        case 4:
            dia = "jueves";
            break;
        case 5:
            dia = "viernes"
            break;
        case 6:
            dia = "sabado"
            break;
        case 0:
            dia = "domingo"
            break;
    }
    $("#hora").html("HORA: " + hora);
    $("#dia").html("DIA: " + dia + currentTime.toLocaleDateString());
    //asignando las fechas según el día de la semana. 
    var fechasSemana = ["1", "2", "3", "4", "5", "6", "0"];
    //recorre el array localizando en qué día de la semana estamos. 
    var posicionActual = fechasSemana.indexOf(String(currentTime.getDay()));
    //se asignan los dias con fechas, día actual
    fechasSemana[posicionActual] = currentTime.toLocaleDateString();
    //dias anteriores
    for (let index = posicionActual - 1; index >= 0; index--) {
        currentTime.setDate(currentTime.getDate() - 1);
        fechasSemana[index] = currentTime.toLocaleDateString();
    }
    currentTime = new Date(); // hay que resetear el tiempo al actual
    //dias posteriores
    for (let index = posicionActual + 1; index < fechasSemana.length; index++) {
        currentTime.setDate(currentTime.getDate() + 1);
        fechasSemana[index] = currentTime.toLocaleDateString();
    }
    //viendo todo OK
    console.log(fechasSemana);
    //pone las fecha en los tabs 
    $("#tabs ul li a span").each(function(index) {
        $(this).html(fechasSemana[index]);
    });
    //pone la fecha en la que se reservaría en un campo oculto en cada botón de reserva
    $(".tab-pane").each(function(index) {
        $(this).find("button .fechaReserva").val(fechasSemana[index]);
    });


    // ********************************************************
    // *                                                      *
    // *        DESHABILITAR BOTONES DE RESERVA               *
    // *                                                      *
    // ********************************************************

    var diasDesabilitar = $(".tab-pane");
    //deshabilita los botones para los días anteriores al actual, no se puede reservar
    for (let index = posicionActual - 1; index >= 0; index--) {
        // $(diasDesabilitar[index]).find("button .reservarSesion").attr("disabled", "on");
        $(diasDesabilitar[index]).find("button").attr("disabled", "on");

    }
    //deshabilita los botones para las actividades del día actual con hora de inicio anteior a la hora actual. 
    $(diasDesabilitar[posicionActual]).find("button").each(function(indexInArray) {
        var horarioInicio = $(this).find("#horaInicio").val(); //recupera la hora de inicio del horario                 
        var horarioInicio = horarioInicio.split(":") //separa horas de minutos
        var fechaAux = new Date(); //fecha auxiliar para comparar con la actual
        fechaAux.setHours(horarioInicio[0]);
        fechaAux.setMinutes(horarioInicio[1]);
        var fechaActual = new Date(); //fecha actual

        if (fechaAux < fechaActual) { //deshabilita el boton para horas anteriores a la actual
            $(this).parent().find("button").attr("disabled", "on");
        }
    });

    // ********************************************************
    // *                                                      *
    // *                       CREAR RESERVA                  *
    // *                                                      *
    // ********************************************************
    $("button.reservarSesion").click(function(e) {


        //recuperando el id de usuario para generar la reserva
        var user_id = $(this).find("#user_id").val();

        //hora de inicio
        var horaInicio = $(this).find("#horaInicio").val();
        horaInicio = horaInicio.split(":");
        //console.log("Hora inicio: "+horaInicio);

        //fecha de la reserva
        var reserva = $(this).find(".fechaReserva").val();
        reserva = reserva.split("/");
        reservaString = reserva[2] + "-" + reserva[1] + "-" + reserva[0] + " " + horaInicio[0] + ":" + horaInicio[1];

        console.log(reservaString);

        //recuperando id sesion
        var sesion_id = $(this).find("#sesion").val();

        console.log("user_id: " + user_id);
        console.log("reserva: " + reservaString);
        console.log("sesion: " + sesion_id);


        if (user_id != "" && sesion_id != "") {

            swal({
                    title: "¿Quiere reservar esta sesión?",
                    icon: "warning",
                    buttons: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "http://127.0.0.1/fitpocket/user/crearReservaPost",
                            type: "POST",
                            data: {
                                user_id: user_id,
                                sesion_id: sesion_id,
                                fechaReserva: reservaString
                            },
                            success: function(response) {
                                if (response == 1) {
                                    swal({
                                        title: "Reserva creada correctamente",
                                        text: "¡Nos vemos en clase!",
                                        icon: "success",
                                        button: "Genial",
                                    });
                                } else {
                                    swal({
                                        title: "Ya tiene una reserva para está sesión",
                                        text: "¡Nos vemos en clase!",
                                        icon: "error",
                                        button: "Aceptar",
                                    });
                                }
                                $("#mensaje").html(msg);
                            }
                        });

                    }
                });
        }
    });



});