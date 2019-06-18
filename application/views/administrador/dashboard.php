<div class="row mt-row text-center m-0">
    <div class="col-sm-3 col">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-admin" role="tab" aria-controls="v-pills-home" aria-selected="true">Administradores</a>
            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-usuarios" role="tab" aria-controls="v-pills-profile" aria-selected="false">Usuarios</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-monitores" role="tab" aria-controls="v-pills-messages" aria-selected="false">Monitores</a>
            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-actividades" role="tab" aria-controls="v-pills-settings" aria-selected="false">Actividades</a>
            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-salas" role="tab" aria-controls="v-pills-settings" aria-selected="false">Aulas</a>
        </div>
    </div>
    <div class="col-sm-9 col p-0">
        <div class="tab-content" id="v-pills-tabContent">
            <!-- Hay que mandar los ids en cada caso como admins etc.. para poder cargar los datos en los modales para editarlos y igualmente para eliminar y para actualizar su estado igual mediante AJAX  -->

            <!-- Administradores -->
            <div class="tab-pane fade show active text-center" id="v-pills-admin" role="tabpanel" aria-labelledby="v-pills-admin-tab">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Usuario</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($administradores as $administrador) : ?>
                            <tr>
                               
                                <td><?= $administrador->usuario ?></td>
                                <td>
                                    <form action="" method="post">
                                        <a class="btn p-0" href="#">
                                            <i class="fas fa-edit" data-toggle="modal" data-target="#editAdminModal"></i>
                                        </a>
                                        <input type="hidden" name="id-admin" value="<?= $administrador->id ?>">
                                    </form>
                                    <form action="" method="post">
                                        <a class="btn p-0" href="#">
                                            <i class="fas fa-trash-alt delete"></i>
                                        </a>
                                        <input type="hidden" name="id-admin" value="<?= $administrador->id ?>">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button class="btn btn-dark m-3" data-toggle="modal" data-target="#crearAdmin">Crear Administrador</button>
            </div>
            <!-- Usuarios -->
            <div class="tab-pane fade" id="v-pills-usuarios" role="tabpanel" aria-labelledby="v-pills-usuarios-tab">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <th scope="row"><?= $user->nombre ?></th>
                                <td><?= $user->email ?></td>
                                <td><?= $user->usuario ?></td>
                                <td>

                                    <form action="" method="post">
                                        <?php
                                        if ($user->activo == 1) {
                                            echo '<input type="checkbox" id="toggle" checked="checked" data-toggle="toggle" data-height="10" data-width="10">';
                                        }
                                        if ($user->activo == 0) {
                                            echo '<input type="checkbox" id="toggle" data-toggle="toggle" data-height="10" data-width="10">';
                                        }
                                        ?>
                                        <input type="hidden" name="id-user" value="<?= $user->id ?>">
                                    </form>
                                </td>
                                <td>
                                    <form action="" method="post">
                                        <a class="btn p-0" href="#">
                                            <i class="fas fa-edit fa-1x" data-toggle="modal" data-target="#editUserModal"></i>
                                        </a>
                                        <input type="hidden" name="id-user" value="<?= $user->id ?>">
                                    </form>
                                    <form action="" method="post">
                                        <a class="btn p-0" href="#">
                                            <i class="fas fa-trash-alt delete"></i>
                                        </a>
                                        <input type="hidden" name="id-user" value="<?= $user->id ?>">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- Monitores -->
            <div class="tab-pane fade" id="v-pills-monitores" role="tabpanel" aria-labelledby="v-pills-monitores-tab">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($monitores as $monitor) : ?>
                            <tr>
                                <th scope="row"><?= $monitor->nombre ?></th>
                                <td><?= $monitor->email ?></td>
                                <td><?= $monitor->usuario ?></td>
                                <td>
                                    <form action="" method="post">
                                        <a class="btn p-0" href="#">
                                            <i class="fas fa-edit" data-toggle="modal" data-target="#editMonitorModal"></i>
                                        </a>
                                        <input type="hidden" name="id-monitor" value="<?= $monitor->id ?>">
                                    </form>
                                    <form action="" method="post">
                                        <a class="btn p-0" href="#">
                                            <i class="fas fa-trash-alt delete"></i>
                                        </a>
                                        <input type="hidden" name="id-monitor" value="<?= $monitor->id ?>">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button class="btn btn-dark m-3" data-toggle="modal" data-target="#crearMonitor">Crear Monitor</button>
            </div>
            <!-- Actividades -->
            <div class="tab-pane fade" id="v-pills-actividades" role="tabpanel" aria-labelledby="v-pills-actividades-tab">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Información</th>
                            <th scope="col">Impacto</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($actividades as $actividad) : ?>
                            <tr>
                                <th scope="row"><?= $actividad->nombre ?></th>
                                <td><?= $actividad->info ?></td>
                                <td><?= $actividad->impacto ?></td>
                                <td>
                                    <form action="" method="post">
                                        <a class="btn p-0" href="#">
                                            <i class="fas fa-edit" data-toggle="modal" data-target="#editActividadModal"></i>
                                        </a>
                                        <input type="hidden" name="id-actividad" value="<?= $actividad->id ?>">
                                    </form>
                                    <form action="" method="post">
                                        <a class="btn p-0" href="#">
                                            <i class="fas fa-trash-alt delete"></i>
                                        </a>
                                        <input type="hidden" name="id-actividad" value="<?= $actividad->id ?>">
                                    </form>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button class="btn btn-dark m-3" data-toggle="modal" data-target="#crearActividad">Crear Actividad</button>
            </div>
            <!-- Salas -->
            <div class="tab-pane fade" id="v-pills-salas" role="tabpanel" aria-labelledby="v-pills-salas-tab">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($aulas as $aula) : ?>
                            <tr>
                                <th scope="row"><?= $aula->numero ?></th>
                                <td>
                                    <form id="editarHorario" method="post" action="http://127.0.0.1/fitpocket/sesion/horario">

                                        <input type="hidden" name="prueba" value="<?=$aula->id?>">
                                        <input type="submit" value="Organizar horario" class="organizarHorario">
                                    </form>
                                    <form action="" method="post">
                                        <a class="btn p-0" href="#">
                                            <i class="fas fa-edit" data-toggle="modal" data-target="#editSalasModal"></i>
                                        </a>
                                        <input type="hidden" name="id-aula" value="<?= $aula->id ?>">
                                    </form>
                                    <form action="" method="post">
                                        <a class="btn p-0" href="#">
                                            <i class="fas fa-trash-alt delete"></i>
                                        </a>
                                        <input type="hidden" name="id-aula" value="<?= $aula->id ?>">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button class="btn btn-dark m-3" data-toggle="modal" data-target="#crearSala">Crear Sala</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Admin Edit-->
<div class="modal fade" id="editAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Administrador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <form action="" method="post">
                        <div class="col form-group">
                            <label for="usuario">Usuario</label>
                            <input type="text" name="usuario" class="form-control" id="usuario-administrador">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" id="updateAdmin" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Usuario Edit-->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <form action="" method="post">
                        <div class="col form-group">
                            <label for="nombre-usuario">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="nombre-usuario">
                        </div>
                        <div class="col form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control" id="apellidos-usuario">
                        </div>
                        <div class="col form-group">
                            <label for="usuario-usuario">Usuario</label>
                            <input type="text" name="usuario" class="form-control" id="usuario-usuario">
                        </div>
                        <div class="col form-group">
                            <label for="email-usuario">Email</label>
                            <input type="email" name="email" class="form-control" id="email-usuario">
                        </div>
                        <!-- <div class="col form-group">
                            <label for="password-usuario">Contraseña</label>
                            <input type="text" name="password" class="form-control" id="password-usuario">
                        </div> -->
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" id="updateUser" class="btn btn-primary">Guardar</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal Monitor Edit-->
<div class="modal fade" id="editMonitorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Monitor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <form action="" method="post">
                        <div class="col form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="nombre-monitor">
                        </div>
                        <div class="col form-group">
                            <label for="usuario">Apellidos</label>
                            <input type="text" name="usuario" class="form-control" id="apellidos-monitor">
                        </div>
                        <div class="col form-group">
                            <label for="usuario">Usuario</label>
                            <input type="text" name="usuario" class="form-control" id="usuario-monitor">
                        </div>
                        <div class="col form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email-monitor">
                        </div>
                        <!-- <div class="col form-group">
                            <label for="password">Contraseña</label>
                            <input type="text" name="password" class="form-control" id="password-monitor">
                        </div> -->
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="updateMonitor">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Actividad Edit-->
<div class="modal fade" id="editActividadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Actividad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <form action="" method="post">
                        <div class="col form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="nombre-actividad">
                        </div>
                        <div class="col form-group">
                            <label for="informacion">Informacion</label>
                            <textarea name="informacion" class="form-control" id="informacion-actividad" rows="10" cols="30"></textarea>
                        </div>
                        <div class="col form-group">
                            <label for="impacto-actividad">Impacto</label>
                            <input type="text" name="impacto" class="form-control" id="impacto-actividad">
                        </div>

                        <div class="col form-group">
                            <label for="imagen">Imagen</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="imagen" id="imagen-actividad" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Elige una Imagen</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" id="updateActividad" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Salas Edit-->
<div class="modal fade" id="editSalasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Aulas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <form action="" method="post">
                        <div class="col form-group">
                            <label for="usuario">Numero</label>
                            <input type="text" name="usuario" class="form-control" id="usuario">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Actividad Crear-->
<div class="modal fade" id="crearActividad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Actividad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <form action="" method="post">
                        <div class="col form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="nombreActividad">
                        </div>
                        <div class="col form-group">
                            <label for="informacion">Informacion</label>
                            <textarea name="info" class="form-control" id="informacionActividad" rows="10" cols="30"></textarea>
                        </div>
                        <div class="col form-group">
                            <label for="impacto-actividad">Impacto</label>
                            <input type="text" name="impacto" class="form-control" id="impactoActividad">
                        </div>
                        <div class="col form-group">
                            <label for="imagen">Imagen</label>
                            <input type="text" name="imagen" class="form-control" id="imagenActividad">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" id="btnCrearActividad" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Sala Crear-->
<div class="modal fade" id="crearSala" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Sala</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <form action="" method="post">
                        <div class="col form-group">
                            <label for="nombre">Numero</label>
                            <input type="text" name="aula" class="form-control" id="aula-id">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" id="btnCrearSala" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Administrador Crear-->
<div class="modal fade" id="crearAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <form action="" method="post">
                        <div class="col form-group">
                            <label for="nombre">Usuario</label>
                            <input type="text" name="usuario" id="usuario-admin-id" class="form-control">
                        </div>
                        <div class=" col form-group">
                            <label for="nombre">Contraseña</label>
                            <input type="text" name="pw" class="form-control" id="pw-admin-id">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" id="btnCrearAdmin" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Monitor Crear-->
<div class="modal fade" id="crearMonitor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <form action="" method="post">
                        <div class="col form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="nombreMonitor">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" id="btnCrearMonitor" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </div>
</div>