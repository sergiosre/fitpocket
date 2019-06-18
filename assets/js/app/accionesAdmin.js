$(document).ready(function() {

    // EXPRESIONES REGULARES

    var regExpPalabra = new RegExp('^[a-zA-ZáéíóúüÁÉÍÓÚÜ-]{3,20}$');
    var regExpPassword = new RegExp('^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}$');
    var regExpSala = new RegExp('^[0-9]{1,2}$');


    $("#icon-active").click(function() {
        if ($("#icon-active").hasClass("fas fa-ban")) {
            $("#icon-active").removeClass("fas fa-ban");
            $("#icon-active").addClass("fas fa-check-circle");
        } else if ($("#icon-active").hasClass("fas fa-check-circle")) {
            $("#icon-active").removeClass("fas fa-check-circle");
            $("#icon-active").addClass("fas fa-ban");
        }
    });


    // ********************************************************
    // *                                                      *
    // *                 ACCIONES DE BORRADO                  *
    // *                                                      *
    // ********************************************************

    $(".delete").click(function(e) {
        e.preventDefault();

        var id = $(this)
            .parent()
            .siblings()
            .val();
        var tipoBorrado = $(this)
            .parent()
            .siblings()
            .attr("name");

        // Creacion url personalizada para cada tipo de elemento
        var url = "";
        var nombreConfirm = '';
        switch (tipoBorrado) {
            case "id-admin":
                url = "http://127.0.0.1/fitpocket/administrador/delete";
                nombreConfirm = '¿Quiere borrar a este administrador/a?';
                break;

            case "id-monitor":
                url = "http://127.0.0.1/fitpocket/monitor/delete";
                nombreConfirm = '¿Quiere borrar a este monitor/a?';
                break;

            case "id-aula":
                url = "http://127.0.0.1/fitpocket/aula/delete";
                nombreConfirm = '¿Quiere borrar este aula?';
                break;

            case "id-user":
                url = "http://127.0.0.1/fitpocket/user/delete";
                nombreConfirm = '¿Quiere borrar a este usuario?';
                break;

            case "id-actividad":
                url = "http://127.0.0.1/fitpocket/actividad/delete";
                nombreConfirm = '¿Quiere borrar esta actividad?';
                break;
        }

        if (confirm(nombreConfirm)) {
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    id: id
                },
                success: function(response) {
                    if (response == 1) {
                        location.reload();
                    } else {
                        alert("No se ha podido borrar");
                    }
                }
            });
        }
    });

    // ********************************************************
    // *                                                      *
    // *               ACTIVAR/DESACTIVAR USUARIO 		      *
    // *                                                      *
    // ********************************************************

    $("input[type=checkbox]#toggle").change(function(e) {

        //id del usuario para activar/desactivar
        var id = $(this)
            .parent()
            .siblings()
            .val();

        $.ajax({
            type: "POST",
            url: "http://127.0.0.1/fitpocket/user/activarDesactivarUser",
            data: { id: id },
            success: function(response) {
                if (response == 1) {
                    console.log("estado de usuario cambiado");
                } else {
                    console.log("ERROR");
                }
            }
        });


    });


    // ********************************************************
    // *                                                      *
    // *                 ACCIONES DE UPDATE                   *
    // *                                                      *
    // ********************************************************

    $("i.fas.fa-edit").click(function(e) {
        e.preventDefault();

        //comprobamos que formulario tenemos que rellenar para el hacer el update
        var id = $(this)
            .parent()
            .siblings()
            .val();
        var tipoFormulario = $(this)
            .parent()
            .siblings()
            .attr("name");

        console.log(tipoFormulario);
        console.log(id);


        switch (tipoFormulario) {
            case "id-admin":
                url = "http://127.0.0.1/fitpocket/administrador/getInfoJsonById";
                break;

            case "id-monitor":
                url = "http://127.0.0.1/fitpocket/monitor/getInfoJsonById";
                break;

            case "id-aula":
                url = "http://127.0.0.1/fitpocket/aula/getInfoJsonById";
                break;

            case "id-user":
                url = "http://127.0.0.1/fitpocket/user/getInfoJsonById";
                break;

            case "id-actividad":
                url = "http://127.0.0.1/fitpocket/actividad/getInfoJsonById";
                break;
        }

        console.log(url);

        //peticion AJAX para recuperar los datos que rellenan el fomulario para hacer una operación de update
        $.ajax({
            type: "POST",
            url: url,
            dataType: "json",
            data: { id: id },
            success: function(data) {
                if (data.status == 'ok') {

                    //update usuario
                    if (tipoFormulario == 'id-user') {
                        updateUser(data);
                    }
                    //update monitor
                    if (tipoFormulario == 'id-monitor') {
                        updateMonitor(data);
                    }
                    //update actividad
                    if (tipoFormulario == 'id-actividad') {
                        updateActividad(data);
                    }

                    if (tipoFormulario == 'id-admin') {
                        updateAdministrador(data);
                    }

                } else {
                    alert("ERROR SERVIDOR")
                }
            }
        });


    });

    // CREACION DE ADMINISTRADOR

    $("#btnCrearAdmin").click(function(e) {
        var usuario = $("#usuario-admin-id").val().trim();
        var password = $("#pw-admin-id").val().trim();
        var msg = "";

        if (regExpPalabra.test(usuario) && regExpPassword.test(password)) {
            $.ajax({
                url: "http://127.0.0.1/fitpocket/administrador/crearPost",
                type: "POST",
                data: {
                    usuario: usuario,
                    pw: password
                },
                success: function(response) {
                    if (response == 1) {
                        swal({
                            title: "¡El Administrador se ha creado correctamente!",
                            icon: "success",
                            showConfirmButton: false
                        });
                        setTimeout(function() {
                            window.location = 'http://127.0.0.1/fitpocket/administrador/home';
                        }, 1500);
                    } else {
                        swal({
                            title: "¡Opss..!",
                            text: "No ha sido posible crear el Administrador, el usuario tiene que tener mínimo 3 caracteres y la contraseña: 8 caracteres o más, 1 mayúscula y 1 dígito como mínimo",
                            icon: "error",
                        });
                    }
                }
            });
        } else {
            swal({
                title: "¡Opss..!",
                text: "No ha sido posible crear el Administrador, el usuario tiene que tener mínimo 3 caracteres y la contraseña: 8 caracteres o más, 1 mayúscula y 1 dígito como mínimo",
                icon: "error",
            });
        }
    });

    // CREACION DE ACTIVIDAD

    $("#btnCrearActividad").click(function(e) {
        var nombreActividad = $("#nombreActividad").val().trim();
        var informacionActividad = $("#informacionActividad").val().trim();
        var impactoActividad = $("#impactoActividad").val().trim();
        var imagenActividad = $("#imagenActividad").val().trim();

        var msg = "";

        if (regExpPalabra.test(nombreActividad) && regExpPalabra.test(impactoActividad)) {
            $.ajax({
                url: "http://127.0.0.1/fitpocket/actividad/crearPost",
                type: "POST",
                data: {
                    nombre: nombreActividad,
                    info: informacionActividad,
                    impacto: impactoActividad,
                    imagen: imagenActividad
                },
                success: function(response) {
                    if (response == 1) {
                        swal({
                            title: "¡El Monitor se ha creado correctamente!",
                            icon: "success",
                            showConfirmButton: false
                        });
                        setTimeout(function() {
                            window.location = 'http://127.0.0.1/fitpocket/administrador/home';
                        }, 1500);
                    } else {
                        swal({
                            title: "¡Opss..!",
                            text: "No ha sido posible crear la actividad, el nombre y el impacto no puede contener numeros",
                            icon: "error",
                        });
                    }
                }
            });
        } else {
            swal({
                title: "¡Opss..!",
                text: "No ha sido posible crear la actividad",
                icon: "error",
            });

        }
    });

    // CREACION DE MONITOR

    $("#btnCrearMonitor").click(function(e) {
        var usuario = $("#nombreMonitor").val().trim();
        var msg = "";

        if (regExpPalabra.test(usuario)) {
            $.ajax({
                url: "http://127.0.0.1/fitpocket/monitor/crearPost",
                type: "POST",
                data: {
                    nombre: usuario,
                },
                success: function(response) {
                    if (response == 1) {
                        swal({
                            title: "¡El Monitor se ha creado correctamente!",
                            icon: "success",
                            showConfirmButton: false
                        });
                        setTimeout(function() {
                            window.location = 'http://127.0.0.1/fitpocket/administrador/home';
                        }, 1500);
                    } else {
                        swal({
                            title: "¡Opss..!",
                            text: "El nombre del monitor debe contener al menos 3 caracteres (Solo letras)",
                            icon: "error",
                        });
                    }
                }
            });
        } else {
            swal({
                title: "¡Opss..!",
                text: "El nombre del monitor debe contener al menos 3 caracteres y no puede contener numeros",
                icon: "error",
            });
        }
    });

    // CREACION DE SALAS

    $("#btnCrearSala").click(function(e) {
        var sala = $("#aula-id").val().trim();
        var msg = "";

        if (regExpSala.test(sala)) {
            $.ajax({
                url: "http://127.0.0.1/fitpocket/aula/crearPost",
                type: "POST",
                data: {
                    aula: sala,
                },
                success: function(response) {
                    if (response == 1) {
                        swal({
                            title: "¡La sala se ha creado correctamente!",
                            icon: "success",
                            showConfirmButton: false
                        });
                        setTimeout(function() {
                            window.location = 'http://127.0.0.1/fitpocket/administrador/home';
                        }, 1500);
                    } else {
                        swal({
                            title: "¡Opss..!",
                            text: "El numero de la sala no admite caracteres",
                            icon: "error",
                        });
                    }
                }
            });
        } else {
            swal({
                title: "¡Opss..!",
                text: "El numero de la sala no admite caracteres",
                icon: "error",
            });
        }
    });


});

/**
 * Actualiza el modal de un usuario y hace petición Ajax para update
 * @param {*} data 
 */
function updateUser(data) {
    //recupera los datos del json
    var formulario = $("#editUserModal").find("form");
    var id = data.user.id;

    //asigna los datos al formulario del modal
    $(formulario).find("#nombre-usuario").val(data.user.nombre);
    $(formulario).find("#apellidos-usuario").val(data.user.apellidos);
    $(formulario).find("#usuario-usuario").val(data.user.usuario);
    $(formulario).find("#email-usuario").val(data.user.email);

    //cuando se hace hace click en guardar se hace una petición AJAX para actualizar el usuario
    $("#updateUser").on("click", function() {

        //recuperando datos del formulario
        var nombre = $(formulario).find("#nombre-usuario").val();
        var apellidos = $(formulario).find("#apellidos-usuario").val();
        var usuario = $(formulario).find("#usuario-usuario").val();
        var email = $(formulario).find("#email-usuario").val();


        $.ajax({
            type: "POST",
            url: "http://127.0.0.1/fitpocket/user/updatePost",
            data: {
                id: id,
                nombre: nombre,
                apellidos: apellidos,
                usuario: usuario,
                email: email
            },
            success: function(response) {

                if (response == 1) {
                    location.reload();
                } else {
                    alert("No se ha podido actualizar");
                }
            }
        });


    });
}

/**
 * Actualiza el modal de un monitor y hace petición Ajax para update
 * @param {*} data 
 */
function updateMonitor(data) {
    //recupera los datos del json
    var formulario = $("#editMonitorModal").find("form");
    var id = data.monitor.id;

    //asigna los datos al formulario del modal
    $(formulario).find("#nombre-monitor").val(data.monitor.nombre);
    $(formulario).find("#apellidos-monitor").val(data.monitor.apellidos);
    $(formulario).find("#usuario-monitor").val(data.monitor.usuario);
    $(formulario).find("#email-monitor").val(data.monitor.email);

    //cuando se hace hace click en guardar se hace una petición AJAX para actualizar el monitor
    $("#updateMonitor").on("click", function() {

        //recuperando datos del formulario
        var nombre = $(formulario).find("#nombre-monitor").val();
        var apellidos = $(formulario).find("#apellidos-monitor").val();
        var usuario = $(formulario).find("#usuario-monitor").val();
        var email = $(formulario).find("#email-monitor").val();


        $.ajax({
            type: "POST",
            url: "http://127.0.0.1/fitpocket/monitor/updatePost",
            data: {
                id: id,
                nombre: nombre,
                apellidos: apellidos,
                usuario: usuario,
                email: email
            },
            success: function(response) {

                if (response == 1) {
                    location.reload();
                } else {
                    alert("No se ha podido actualizar");
                }
            }
        });


    });
}

/**
 * Actualiza el modal de una actividad y hace petición Ajax para update
 * @param {*} data 
 */
function updateActividad(data) {

    //recupera los datos del json
    var formulario = $("#editActividadModal").find("form");
    var id = data.actividad.id;

    //asigna los datos al formulario del modal
    $(formulario).find("#nombre-actividad").val(data.actividad.nombre);
    $(formulario).find("#informacion-actividad").val(data.actividad.info);
    $(formulario).find("#impacto-actividad").val(data.actividad.impacto);

    //cuando se hace hace click en guardar se hace una petición AJAX para actualizar el monitor
    $("#updateActividad").on("click", function() {

        //recuperando datos del formulario
        var nombre = $(formulario).find("#nombre-actividad").val();
        var info = $(formulario).find("#informacion-actividad").val();
        var impacto = $(formulario).find("#impacto-actividad").val();

        $.ajax({
            type: "POST",
            url: "http://127.0.0.1/fitpocket/actividad/updatePost",
            data: {
                id: id,
                nombre: nombre,
                info: info,
                impacto: impacto,
            },
            success: function(response) {

                if (response == 1) {
                    location.reload();
                } else {
                    alert("No se ha podido actualizar");
                }
            }
        });


    });
}

/**
 * Actualiza el modal de un administrador y hace petición Ajax para update
 * @param {*} data 
 */
function updateAdministrador(data) {
    //recupera los datos del json
    var formulario = $("#editAdminModal").find("form");
    var id = data.administrador.id;

    //asigna los datos al formulario del modal
    $(formulario).find("#usuario-administrador").val(data.administrador.usuario);

    //cuando se hace hace click en guardar se hace una petición AJAX para actualizar el usuario
    $("#updateAdmin").on("click", function() {

        //recuperando datos del formulario
        var usuario = $(formulario).find("#usuario-administrador").val();

        $.ajax({
            type: "POST",
            url: "http://127.0.0.1/fitpocket/administrador/updatePost",
            data: {
                id: id,
                usuario: usuario
            },
            success: function(response) {

                if (response == 1) {
                    location.reload();
                } else {
                    alert("No se ha podido actualizar");
                }
            }
        });


    });
}