$(document).ready(function() {

    // ********************************************************
    // *                                                      *
    // *                       LOGIN ADMIN                    *
    // *                                                      *
    // ********************************************************

    $("#login").click(function(e) {
        var usuario = $("#usuario").val().trim();
        var password = $("#pw").val().trim();
        var msg = "";

        if (usuario != "" && password != "") {
            $.ajax({
                url: "http://127.0.0.1/fitpocket/administrador/loginPost",
                type: "POST",
                data: {
                    usuario: usuario,
                    pw: password
                },
                success: function(response) {
                    if (response == 1) {
                        window.location = 'http://127.0.0.1/fitpocket/administrador/home';
                    } else {
                        msg = "<p>Usuario o Contraseña incorrectos</p>";
                    }
                    $("#mensaje").html(msg);
                }
            });
        } else {
            msg = "<p>Rellene todos los campos</p>";
            $("#mensaje").html(msg);
        }
    });

    // ********************************************************
    // *                                                      *
    // *                     LOGIN MONITOR                    *
    // *                                                      *
    // ********************************************************

    $("#loginMonitor").click(function(e) {
        var usuario = $("#usuario").val().trim();
        var password = $("#pw").val().trim();
        var msg = "";

        if (usuario != "" && password != "") {
            $.ajax({
                url: "http://127.0.0.1/fitpocket/monitor/loginPost",
                type: "POST",
                data: {
                    usuario: usuario,
                    pw: password
                },
                success: function(response) {
                    if (response == 1) {
                        msg = '<h2>LOGIN OK</h2>'
                    } else {
                        msg = "<p>Usuario o Contraseña incorrectos</p>";
                    }
                    $("#mensaje").html(msg);
                }
            });
        } else {
            msg = "<p>Rellene todos los campos</p>";
            $("#mensaje").html(msg);
        }
    });

    // ********************************************************
    // *                                                      *
    // *                     LOGIN USUARIO                    *
    // *                                                      *
    // ********************************************************


    $("#loginUser").click(function(e) {
        var usuario = $("#email_user_login_id").val().trim();
        var password = $("#password_user_login_id").val().trim();
        var msg = "";

        if (usuario != "" && password != "") {
            $.ajax({
                url: "http://127.0.0.1/fitpocket/user/loginPost",
                type: "POST",
                data: {
                    email_user_login_name: usuario,
                    password_user_login_name: password
                },
                success: function(response) {
                    if (response == 1) {
                        window.location = 'http://127.0.0.1/fitpocket/user/home';
                        console.log(usuario + " " + password);

                    } else {
                        msg = "<p>Usuario o Contraseña incorrectos</p>";
                        console.log(usuario + " " + password);

                    }
                    $("#mensaje").html(msg);
                }
            });
        } else {
            msg = "<p>Rellene todos los campos</p>";
            console.log(usuario + " " + password);

            $("#mensaje").html(msg);
        }
    });

});