$(document).ready(function() {



    /***************************************************
     *                                                 *
     *                  REACTIVAR RESERVA              *
     *                                                 *
     ***************************************************/

    $("button.reactivarReserva").click(function(e) {
        e.preventDefault();
        var reserva_id = $(this).find("#reservaId").val();
        console.log(reserva_id);

        swal({
                title: "¿Quiere REACTIVAR esta reserva?",
                icon: "warning",
                buttons: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: "http://127.0.0.1/fitpocket/user/reactivarReservaPost",
                        data: {
                            reserva_id: reserva_id
                        },
                        success: function(response) {
                            if (response == 1) {
                                swal({
                                    title: "Se ha reactivado la reserva",
                                    text: "¡Nos vemos en clase!",
                                    icon: "success",
                                    button: "Genial",
                                });
                                //recarga la página
                                setTimeout(function() {
                                    window.location.reload(); // you can pass true to reload function to ignore the client cache and reload from the server
                                }, 2000); //delayTime should be written in milliseconds e.g. 1000 which equals 1 second
                            } else {
                                alert(response);
                            }
                        }
                    });

                }
            });

    });

    /***************************************************
     *                                                 *
     *                  CANCELAR RESERVA              *
     *                                                 *
     ***************************************************/

    $("button.cancelarReserva").click(function(e) {
        e.preventDefault();
        var reserva_id = $(this).find("#reservaId").val();
        console.log(reserva_id);


        swal({
                title: "¿Quiere CANCELAR esta reserva?",
                icon: "warning",
                buttons: true,
                dangerMode: true
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: "http://127.0.0.1/fitpocket/user/cancelarReservaPost",
                        data: {
                            reserva_id: reserva_id
                        },
                        success: function(response) {
                            if (response == 1) {
                                swal({
                                    title: "Se ha CANCELADO la reserva",
                                    text: "¡Otra vez será!",
                                    icon: "success",
                                    button: "Genial",
                                });
                                //recarga la página
                                setTimeout(function() {
                                    window.location.reload(); // you can pass true to reload function to ignore the client cache and reload from the server
                                }, 2000); //delayTime should be written in milliseconds e.g. 1000 which equals 1 second
                            } else {
                                alert(response);
                            }
                        }
                    });

                }
            });

    });


});