$(document).ready(function() {

    var regExpPalabra = new RegExp('^[a-zA-ZáéíóúüÁÉÍÓÚÜ-]{3,20}$');
    var regExpPassword = new RegExp('^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}$');
    var regExpEmail = new RegExp('^^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$');

    // ********************************************************
    // *                                                      *
    // *                     REGISTRO USER                    *
    // *                                                      *
    // ********************************************************



    $("#registrar").click(function(e) {
        var nombre = $("#nombre_id").val().trim();
        var apellidos = $("#apellidos_id").val().trim();
        var usuario = $("#usuario_id").val().trim();
        var email = $("#email_user_register_id").val().trim();
        var password = $("#password_user_register_id").val().trim();
        var password2 = $("#password_user_register_id_2").val().trim();
        var msg = "";

        if (!regExpPalabra.test(nombre)) {
            msg += "Nombre erróneo \n"
        }

        if (!regExpPalabra.test(apellidos)) {
            msg += "Apellidos erróneo \n"
        }

        if (usuario == "") {
            msg += "Usuario erróneo \n"
        }

        if (!regExpEmail.test(email)) {
            msg += "Email erróneo \n"
        }

        if (!regExpPassword.test(password)) {
            msg += "La contraseña no cumple los requisitos \n"
        }

        if (password != password2) {
            msg += "Las contraseñas no coinciden \n"
        }


        console.log(nombre);
        console.log(apellidos);
        console.log(usuario);
        console.log(email);
        console.log(password);


        if (regExpPalabra.test(nombre) && regExpPalabra.test(apellidos) && regExpPassword.test(password) && regExpEmail.test(email) && usuario != "") {
            $.ajax({
                url: "http://127.0.0.1/fitpocket/user/registerPost",
                type: "POST",
                data: {
                    nombre_name: nombre,
                    apellidos_name: apellidos,
                    usuario_name: usuario,
                    email_user_register_name: email,
                    password_user_register_name: password
                },
                success: function(response) {
                    if (response == 1) {

                        swal({
                            title: "¡Se ha registrado correctamente!",
                            text: "Bienvenido a Fitpocket",
                            icon: "success",
                            showConfirmButton: false
                        });
                        setTimeout(function() {
                            window.location = 'http://127.0.0.1/fitpocket/user/login';
                        }, 2000);
                    } else {
                        swal({
                            title: "¡Opss...!",
                            text: msg,
                            icon: "error",
                        });
                    }
                    $("#mensaje").html(msg);
                }
            });
        } else {
            swal({
                title: "¡Opss...!",
                text: msg,
                icon: "error",
            });
        }
    });
});