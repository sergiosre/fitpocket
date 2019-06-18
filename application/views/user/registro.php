<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fitpocket - Registrarse</title>
    <!-- CSS -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/main.css">
    <script src="<?= base_url() ?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url() ?>assets/js/sweetalert.min.js"></script>
    <script src="<?= base_url() ?>assets/js/app/registros.js"></script>
</head>

<body>
    <div class="container">
        <div class="row mt-row justify-content-center mb-5">
            <div class="col-8">
                <div class="row">
                    <div class="col-12">
                        <form class="form-signin" method="POST">
                            <div class="text-center mb-4">
                                <img src="<?= base_url() ?>assets/img/logo_completo.png" alt="" style="width: 250px; height: 250px;"></div>

                            <div class="form-label-group">
                                <label for="inputEmail">Nombre</label>
                                <input type="text" id="nombre_id" class="form-control" placeholder="Nombre" required="" name="nombre_name" autofocus="true">
                            </div>

                            <div class="form-label-group">
                                <label for="inputPassword">Apellidos</label>
                                <input type="text" id="apellidos_id" class="form-control" placeholder="Apellidos" name="apellidos_name" required="">
                            </div>

                            <div class="form-label-group">
                                <label for="inputPassword">Usuario</label>
                                <input type="text" id="usuario_id" class="form-control" placeholder="Usuario" name="usuario_name" required="">
                            </div>

                            <div class="form-label-group">
                                <label for="inputPassword">Email</label>
                                <input type="email" id="email_user_register_id" class="form-control" placeholder="Email" name="email_user_register_name" required="">
                            </div>

                            <div class="form-label-group">
                                <label for="inputPassword">Contraseña</label>
                                <input type="password" id="password_user_register_id" class="form-control" placeholder="Contraseña" name="password_user_register_name" required="">
                            </div>

                            <div class="form-label-group">
                                <label for="inputPassword">Repetir Contraseña</label>
                                <input type="password" id="password_user_register_id_2" class="form-control" placeholder="Repetir Contraseña" name="password_user_register_name_2" required="">
                            </div>

                            <div id="mensaje"></div>
                            <button class="btn btn-lg btn-primary btn-block mt-2" type="button" id="registrar">Registrarse</button>
                            <div class="text-center">
                                <a href="<?= base_url() ?>user/login">Volver al Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="mensaje"></div>
        </div>
    </div>
</body>

</html>