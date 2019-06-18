<body>
    <div class="container-fluid p-0">
        <nav class="row navbar navbar-expand-xs navbar-light bg-yellow fixed-top text-dark" id="nav-bar" style="padding:0;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="margin-left:10px;"></span>
            </button>
            <ul class="nav navbar-nav text-center">
                <li class="nav-item">
                <img src="<?=base_url()?>/assets/img/logo_completo_semicolor.png" alt="" class="m-2 logoNav" style="width: 50px; height: 50px; border-radius: 50%;">
                </li>
            </ul>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#profileImage" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <img class="profile-image" src="<?= base_url() ?>assets/img/curly-hair-young-man-profile-avatar.png" style="margin-right:10px;">
            </button>
            <div class="collapse navbar-collapse mt-5 ml-4" id="navbarText">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>user/crearReserva">Horario</a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse nav-profile-text-right mt-5 mr-4" id="profileImage">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>user/perfil">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>user/listarReserva">Mis Reservas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Rutinas</a>
                    </li>
                    <li class="nav-item">
                    <button class="btn btn-color2 mb-2" id="log-out"><a href="<?= base_url() ?>user/logout">Cerrar Sesión</a></button>
                    </li>
                </ul>
            </div>
        </nav>