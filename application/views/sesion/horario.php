<!-- Tabs dias -->

<div class="container-fluid sticky-top-2 bg-dias" id="dias">
    <div class="row nav nav-pills justify-content-center align-items-center p-1" id="pills-tab" role="tablist">
        <button class="btn-negro active" id="pills-lunes-tab" data-toggle="pill" href="#pills-lunes" role="tab" aria-controls="pills-lunes" aria-selected="true">LUN</button>
        <button class="btn-negro" id="pills-martes-tab" data-toggle="pill" href="#pills-martes" role="tab" aria-controls="pills-martes" aria-selected="false">MAR</button>
        <button class="btn-negro" id="pills-miercoles-tab" data-toggle="pill" href="#pills-miercoles" role="tab" aria-controls="pills-miercoles" aria-selected="false">MIE</button>
        <button class="btn-negro" id="pills-jueves-tab" data-toggle="pill" href="#pills-jueves" role="tab" aria-controls="pills-jueves" aria-selected="false">JUE</button>
        <button class="btn-negro" id="pills-viernes-tab" data-toggle="pill" href="#pills-viernes" role="tab" aria-controls="pills-viernes" aria-selected="false">VIE</button>
        <button class="btn-negro" id="pills-sabado-tab" data-toggle="pill" href="#pills-sabado" role="tab" aria-controls="pills-sabado" aria-selected="false">SAB</button>
        <button class="btn-negro" id="pills-domingo-tab" data-toggle="pill" href="#pills-domingo" role="tab" aria-controls="pills-domingo" aria-selected="false">DOM</button>
    </div>
</div>

<div class="container-fluid justify-content-center p-0">
    <div class="tab-content" id="pills-tabContent">
        <!-- Lunes -->

        <div class="col-12 tab-pane fade show active" id="pills-lunes" role="tabpanel" aria-labelledby="pills-home-tab" data-spy="scroll" data-target="#dias" data-offset="0">
            <div class="row">
                <div class="col-12">
                    <table id="table" class="table">
                        <thead>
                            <tr>
                                <th scope="col">Hora Inicio</th>
                                <th scope="col">Hora Fin</th>
                                <th scope="col">Actividad</th>
                                <th scope="col">Monitor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sesiones as $sesion) : ?>
                                <?php if ($sesion->dia == "lunes") : ?>
                                    <tr>
                                        <th scope="row"><?= $sesion->horaInicio ?></th>
                                        <td><?= $sesion->horaFin ?></td>
                                        <td><?= $sesion->seRealiza->nombre ?></td>
                                        <td><?= $sesion->imparte->nombre ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>

        <!-- Martes -->

        <div class="col-12 tab-pane fade show" id="pills-martes" role="tabpanel" aria-labelledby="pills-home-tab" data-spy="scroll" data-target="#dias" data-offset="0">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Hora Inicio</th>
                                <th scope="col">Hora Fin</th>
                                <th scope="col">Actividad</th>
                                <th scope="col">Monitor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sesiones as $sesion) : ?>
                                <?php if ($sesion->dia == "martes") : ?>
                                    <tr>
                                        <th scope="row"><?= $sesion->horaInicio ?></th>
                                        <td><?= $sesion->horaFin ?></td>
                                        <td><?= $sesion->seRealiza->nombre ?></td>
                                        <td><?= $sesion->imparte->nombre ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>

        <!-- Miercoles -->

        <div class="col-12 tab-pane fade show" id="pills-miercoles" role="tabpanel" aria-labelledby="pills-home-tab" data-spy="scroll" data-target="#dias" data-offset="0">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Hora Inicio</th>
                                <th scope="col">Hora Fin</th>
                                <th scope="col">Actividad</th>
                                <th scope="col">Monitor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sesiones as $sesion) : ?>
                                <?php if ($sesion->dia == "miercoles") : ?>
                                    <tr>
                                        <th scope="row"><?= $sesion->horaInicio ?></th>
                                        <td><?= $sesion->horaFin ?></td>
                                        <td><?= $sesion->seRealiza->nombre ?></td>
                                        <td><?= $sesion->imparte->nombre ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>

        <!-- Jueves -->

        <div class="col-12 tab-pane fade show" id="pills-jueves" role="tabpanel" aria-labelledby="pills-home-tab" data-spy="scroll" data-target="#dias" data-offset="0">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Hora Inicio</th>
                                <th scope="col">Hora Fin</th>
                                <th scope="col">Actividad</th>
                                <th scope="col">Monitor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sesiones as $sesion) : ?>
                                <?php if ($sesion->dia == "jueves") : ?>
                                    <tr>
                                        <th scope="row"><?= $sesion->horaInicio ?></th>
                                        <td><?= $sesion->horaFin ?></td>
                                        <td><?= $sesion->seRealiza->nombre ?></td>
                                        <td><?= $sesion->imparte->nombre ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>

        <!-- Viernes -->

        <div class="col-12 tab-pane fade show" id="pills-viernes" role="tabpanel" aria-labelledby="pills-home-tab" data-spy="scroll" data-target="#dias" data-offset="0">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Hora Inicio</th>
                                <th scope="col">Hora Fin</th>
                                <th scope="col">Actividad</th>
                                <th scope="col">Monitor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sesiones as $sesion) : ?>
                                <?php if ($sesion->dia == "viernes") : ?>
                                    <tr>
                                        <th scope="row"><?= $sesion->horaInicio ?></th>
                                        <td><?= $sesion->horaFin ?></td>
                                        <td><?= $sesion->seRealiza->nombre ?></td>
                                        <td><?= $sesion->imparte->nombre ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>

        <!-- Sabado -->

        <div class="col-12 tab-pane fade show" id="pills-sabado" role="tabpanel" aria-labelledby="pills-home-tab" data-spy="scroll" data-target="#dias" data-offset="0">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Hora Inicio</th>
                                <th scope="col">Hora Fin</th>
                                <th scope="col">Actividad</th>
                                <th scope="col">Monitor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sesiones as $sesion) : ?>
                                <?php if ($sesion->dia == "sabado") : ?>
                                    <tr>
                                        <th scope="row"><?= $sesion->horaInicio ?></th>
                                        <td><?= $sesion->horaFin ?></td>
                                        <td><?= $sesion->seRealiza->nombre ?></td>
                                        <td><?= $sesion->imparte->nombre ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>

        <!-- Domingo -->

        <div class="col-12 tab-pane fade show" id="pills-domingo" role="tabpanel" aria-labelledby="pills-home-tab" data-spy="scroll" data-target="#dias" data-offset="0">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Hora Inicio</th>
                                <th scope="col">Hora Fin</th>
                                <th scope="col">Actividad</th>
                                <th scope="col">Monitor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sesiones as $sesion) : ?>
                                <?php if ($sesion->dia == "domingo") : ?>
                                    <tr>
                                        <th scope="row"><?= $sesion->horaInicio ?></th>
                                        <td><?= $sesion->horaFin ?></td>
                                        <td><?= $sesion->seRealiza->nombre ?></td>
                                        <td><?= $sesion->imparte->nombre ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="post" tabindex="-1" role="dialog" aria-labelledby="post" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Creación de una nueva sesión</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="" action="" id="crearSesion">
                    
                    <!-- Selecciona la actividad -->
                    <label for="actividad">Selecciona la actividad:</label>
                    <select name="actividad" id="actividad">
                        <option value="none" selected="selected">actividad</option>

                        <?php foreach ($actividades as $actividad) : ?>

                            <?= '<option value="' . $actividad->id . '">' . $actividad->nombre . '</option>'; ?>

                        <?php endforeach; ?>
                    </select>
                    <br>
                    <!-- Selecciona el monitor-->
                    <label for="monitor">Selecciona el monitor:</label>
                    <select name="monitor" id="monitor">
                        <option value="none" selected="selected">Monitor</option>

                        <?php foreach ($monitores as $monitor) : ?>

                            <?= '<option value="' . $monitor->id . '">' . $monitor->nombre . '</option>'; ?>

                        <?php endforeach; ?>
                    </select>

                    <br>
                    <!-- Selecciona hora inicio-->
                    <label for="horaInicio">Hora de inicio de la actividad:</label>
                    <input type="time" id="horaInicio" name="horaInicio" min="8:00" max="22:00" required>

                    <br>
                    <!-- Selecciona hora fin-->
                    <label for="horaFin">Hora de finalización de la actividad:</label>
                    <input type="time" id="horaFin" name="horaFin" min="9:00" max="22:00" required>

                    <!-- Campo oculto que contiene el aula-->
                    <input type="hidden" name="aula" value="<?= $aula->id ?>">

                </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="publicar">Crear</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row sticky-bottom-1 m-0">
        <div class="col">
            <div class="btn-add-post ml-auto">
                <a class="btn p-0" href="#">
                    <i class="text-light fas fa-plus-circle m-3" data-toggle="modal" data-target="#post"></i>
                </a>
            </div>
        </div>
    </div>


        <script src="<?= base_url() ?>assets/js/app/sesionesHorario.js"></script>