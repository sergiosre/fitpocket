$(document).ready(function() {

    $("button#publicar").click(function(e) {

        e.preventDefault();

        var formulario = $(this).parent().parent();

        var horaInicio = $(formulario).find('[name="horaInicio"]').val();
        var horaFin = $(formulario).find('[name="horaFin"]').val();
        var actividad = $(formulario).find('[name="actividad"]').find("option:selected").val();

        var aula = $(formulario).find('[name="aula"]').val();


        //habrá que comprobar que el monitor no este en otra clase en otra aula a la misma hora, para más adelante: 
        var monitor = $(formulario).find('[name="monitor"]').find("option:selected").val();

        //comprobacion de campos no vacios
        if (actividad != "none" && monitor != "none" && horaInicio != "" && horaFin != "") {

            if (horaInicio >= horaFin) {
                swal({
                    title: "La hora de inicio no es anterior a la hora de fin ",
                    text: "¡Revisa esto, aun no tenemos una máquina del tiempo!",
                    icon: "error",
                    button: "Aceptar",
                });
            } else {



                //comprobacion del dia de la semana
                var diaComprobacion = $("button.btn-negro.active").html();
                var dia = '';

                switch (diaComprobacion) {
                    case "LUN":
                        dia = "lunes";
                        break;
                    case "MAR":
                        dia = "martes";
                        break;
                    case "MIE":
                        dia = "miercoles";
                        break;
                    case "JUE":
                        dia = "jueves";
                        break;
                    case "VIE":
                        dia = "viernes";
                        break;
                    case "SAB":
                        dia = "sabado";
                        break;
                    case "DOM":
                        dia = "domingo";
                        break;
                }

                //petición AJAX para comprobar que no se solapen las clases
                $.ajax({
                    url: "http://127.0.0.1/fitpocket/sesion/comprobarHoras",
                    type: "POST",
                    data: {
                        horaInicio: horaInicio,
                        horaFin: horaFin,
                        actividad: actividad,
                        dia: dia,
                        aula: aula,
                        monitor: monitor
                    },
                    success: function(response) {

                        //no se solapa con ningun sesion anterior
                        if (response == 1) {


                            //creacion de la sesion
                            $.ajax({
                                url: "http://127.0.0.1/fitpocket/sesion/crearPost",
                                type: "POST",
                                data: {
                                    horaInicio: horaInicio,
                                    horaFin: horaFin,
                                    actividad: actividad,
                                    dia: dia,
                                    aula: aula,
                                    monitor: monitor
                                },
                                success: function(response) {

                                    if (response == 1) {
                                        swal({
                                            title: "Sesion creada correctamente",
                                            text: "¡Esperemos que vaya mucha gente!",
                                            icon: "success",
                                            button: "Aceptar",
                                        });
                                        setTimeout($.redirect('http://127.0.0.1/fitpocket/sesion/horario', { 'prueba': aula }), 2000);


                                    } else {
                                        swal({
                                            title: "Algun error",
                                            text: "¡Revisa la franja horaria de tu nueva sesión!",
                                            icon: "error",
                                            button: "Aceptar",
                                        });
                                    }
                                }
                            });

                        } else {
                            swal({
                                title: "La sesion entra en conflicto con otra ya creada anteriormente",
                                text: "¡Revisa la franja horaria de tu nueva sesión!",
                                icon: "error",
                                button: "Aceptar",
                            });

                        }

                    }
                });

            }
        } else {
            swal({
                title: "Rellena todos los campos para crear la sesion correctamente",
                text: "¡No te olvides nada!",
                icon: "error",
                button: "Aceptar",
            });
        }

    });



});