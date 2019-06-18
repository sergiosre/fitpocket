      Aula <?=$aula['numero']?>
      <div id="tabs">
            <ul>
                <li><a href="#tabs-1">Lunes</a></li>
                <li><a href="#tabs-2">Martes</a></li>
                <li><a href="#tabs-3">Mércoles</a></li>
                <li><a href="#tabs-4">Jueves</a></li>
                <li><a href="#tabs-5">Viernes</a></li>
                <li><a href="#tabs-6">Sábado</a></li>
                <li><a href="#tabs-7">Domingo</a></li>
            </ul>
            <div id="tabs-1">
                <p>Aquí aparecen las sesiones programadas para el Lunes</p>

                <button type="button" class="btn btn-primary"> <a class="btn" href="#ex2" rel="modal:open">Crea una nueva sesión</a></button>


                <!-- Formulario que se despliega con el modal -->
                <form method="post" action="<?= base_url() ?>sesion/crearPost" class="login_form modal" id="ex2" style="display:none;">
                    <h3>Creación de una nueva sesión</h3>

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


                    <!-- Campo oculto que contiene el día -->
                    <input type="hidden" name="dia" value="lunes">

                    <!-- Campo oculto que contiene el aula-->
                    <input type="hidden" name="aula" value="<?= $aula->id ?>">

                    <p><input class="btn btn-primary Lunes" type="submit" value="Crear" /></p>
                </form>

                <div id="sesionesLunes">

                    <h3>Sesiones ya en BBDD</h3>
                    <table id="horarioLunes" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Hora inicio</th>
                                <th>Hora Fin</th>
                                <th>Actividad</th>
                                <th>Monitor</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($sesiones as $sesion) : ?>

                                <?php if ($sesion->dia == "lunes") : ?>

                                    <tr>
                                        <td><?= $sesion->horaInicio ?></td>
                                        <td><?= $sesion->horaFin ?></td>
                                        <td><?= $sesion->seRealiza->nombre  ?></td>
                                        <td><?= $sesion->imparte->nombre ?></td>
                                    </tr>

                                <?php endif; ?>
                            <?php endforeach; ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Hora inicio</th>
                                <th>Hora Fin</th>
                                <th>Actividad</th>
                                <th>Monitor</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
                <!--/ #tabs-1 -->


            </div>
            <!--/ #tabs-1 -->
            <div id="tabs-2">
                <p>Aquí aparecen las sesiones programadas para el MARTES</p>

                <button type="button" class="btn btn-primary"> <a class="btn" href="#ex3" rel="modal:open">Crea una nueva sesión</a></button>


                <!-- Formulario que se despliega con el modal -->
                <form method="post" action="<?= base_url() ?>sesion/crearPost" class="login_form modal" id="ex3" style="display:none;">
                    <h3>Creación de una nueva sesión</h3>

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


                    <!-- Campo oculto que contiene el día -->
                    <input type="hidden" name="dia" value="martes">

                    <!-- Campo oculto que contiene el aula-->
                    <input type="hidden" name="aula" value="<?= $aula->id ?>">

                    <p><input class="btn btn-primary Martes" type="submit" value="Crear" /></p>
                </form>

                <div id="sesionesMartes">

                    <h3>Sesiones ya en BBDD</h3>
                    <table id="horarioMartes" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Hora inicio</th>
                                <th>Hora Fin</th>
                                <th>Actividad</th>
                                <th>Monitor</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($sesiones as $sesion) : ?>

                                <?php if ($sesion->dia == "martes") : ?>

                                    <tr>
                                        <td><?= $sesion->horaInicio ?></td>
                                        <td><?= $sesion->horaFin ?></td>
                                        <td><?= $sesion->seRealiza->nombre  ?></td>
                                        <td><?= $sesion->imparte->nombre ?></td>
                                    </tr>

                                <?php endif; ?>
                            <?php endforeach; ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Hora inicio</th>
                                <th>Hora Fin</th>
                                <th>Actividad</th>
                                <th>Monitor</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>

            </div>
            <!--/ #tabs-2 -->

            <div id="tabs-3">
                <p>Aquí aparecen las sesiones programadas para el Miércoles</p>

                <button type="button" class="btn btn-primary"> <a class="btn" href="#ex4" rel="modal:open">Crea una nueva sesión</a></button>


                <!-- Formulario que se despliega con el modal -->
                <form method="post" action="<?= base_url() ?>sesion/crearPost" class="login_form modal" id="ex4" style="display:none;">
                    <h3>Creación de una nueva sesión</h3>

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


                    <!-- Campo oculto que contiene el día -->
                    <input type="hidden" name="dia" value="miercoles">

                    <!-- Campo oculto que contiene el aula-->
                    <input type="hidden" name="aula" value="<?= $aula->id ?>">

                    <p><input class="btn btn-primary Miercoles" type="submit" value="Crear" /></p>
                </form>

                <div id="sesionesMiercoles">

                    <h3>Sesiones ya en BBDD</h3>
                    <table id="horarioMartes" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Hora inicio</th>
                                <th>Hora Fin</th>
                                <th>Actividad</th>
                                <th>Monitor</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($sesiones as $sesion) : ?>

                                <?php if ($sesion->dia == "miercoles") : ?>

                                    <tr>
                                        <td><?= $sesion->horaInicio ?></td>
                                        <td><?= $sesion->horaFin ?></td>
                                        <td><?= $sesion->seRealiza->nombre  ?></td>
                                        <td><?= $sesion->imparte->nombre ?></td>
                                    </tr>

                                <?php endif; ?>
                            <?php endforeach; ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Hora inicio</th>
                                <th>Hora Fin</th>
                                <th>Actividad</th>
                                <th>Monitor</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>

            </div>
            <!--/ #tabs-3 -->

            <div id="tabs-4">
                <p>Aquí aparecen las sesiones programadas para el Jueves</p>

                <button type="button" class="btn btn-primary"> <a class="btn" href="#ex5" rel="modal:open">Crea una nueva sesión</a></button>


                <!-- Formulario que se despliega con el modal -->
                <form method="post" action="<?= base_url() ?>sesion/crearPost" class="login_form modal" id="ex5" style="display:none;">
                    <h3>Creación de una nueva sesión</h3>

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


                    <!-- Campo oculto que contiene el día -->
                    <input type="hidden" name="dia" value="jueves">

                    <!-- Campo oculto que contiene el aula-->
                    <input type="hidden" name="aula" value="<?= $aula->id ?>">

                    <p><input class="btn btn-primary" type="submit" value="Crear" /></p>
                </form>

                <div id="sesionesJueves">

                    <h3>Sesiones ya en BBDD</h3>
                    <table id="horarioJueves" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Hora inicio</th>
                                <th>Hora Fin</th>
                                <th>Actividad</th>
                                <th>Monitor</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($sesiones as $sesion) : ?>

                                <?php if ($sesion->dia == "jueves") : ?>

                                    <tr>
                                        <td><?= $sesion->horaInicio ?></td>
                                        <td><?= $sesion->horaFin ?></td>
                                        <td><?= $sesion->seRealiza->nombre  ?></td>
                                        <td><?= $sesion->imparte->nombre ?></td>
                                    </tr>

                                <?php endif; ?>
                            <?php endforeach; ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Hora inicio</th>
                                <th>Hora Fin</th>
                                <th>Actividad</th>
                                <th>Monitor</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>

            </div>
            <!--/ #tabs-4 -->

            <div id="tabs-5">
                <p>Aquí aparecen las sesiones programadas para el Viernes</p>

                <button type="button" class="btn btn-primary"> <a class="btn" href="#ex6" rel="modal:open">Crea una nueva sesión</a></button>


                <!-- Formulario que se despliega con el modal -->
                <form method="post" action="<?= base_url() ?>sesion/crearPost" class="login_form modal" id="ex6" style="display:none;">
                    <h3>Creación de una nueva sesión</h3>

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


                    <!-- Campo oculto que contiene el día -->
                    <input type="hidden" name="dia" value="viernes">

                    <!-- Campo oculto que contiene el aula-->
                    <input type="hidden" name="aula" value="<?= $aula->id ?>">

                    <p><input class="btn btn-primary" type="submit" value="Crear" /></p>
                    <!--   
                        1. Cambiar el boton para que ejecute el script, hay que pasarle el día para que encunet
                     -->
                </form>

                <div id="sesionesViernes">

                    <h3>Sesiones ya en BBDD</h3>
                    <table id="horarioViernes" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Hora inicio</th>
                                <th>Hora Fin</th>
                                <th>Actividad</th>
                                <th>Monitor</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($sesiones as $sesion) : ?>

                                <?php if ($sesion->dia == "viernes") : ?>

                                    <tr>
                                        <td><?= $sesion->horaInicio ?></td>
                                        <td><?= $sesion->horaFin ?></td>
                                        <td><?= $sesion->seRealiza->nombre  ?></td>
                                        <td><?= $sesion->imparte->nombre ?></td>
                                    </tr>

                                <?php endif; ?>
                            <?php endforeach; ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Hora inicio</th>
                                <th>Hora Fin</th>
                                <th>Actividad</th>
                                <th>Monitor</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>

            </div>
            <!--/ #tabs-5 -->

            <div id="tabs-6">
                <p>Aquí aparecen las sesiones programadas para el Sábado</p>

                <button type="button" class="btn btn-primary"> <a class="btn" href="#ex7" rel="modal:open">Crea una nueva sesión</a></button>


                <!-- Formulario que se despliega con el modal -->
                <form method="post" action="<?= base_url() ?>sesion/crearPost" class="login_form modal" id="ex7" style="display:none;">
                    <h3>Creación de una nueva sesión</h3>

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


                    <!-- Campo oculto que contiene el día -->
                    <input type="hidden" name="dia" value="sabado">

                    <!-- Campo oculto que contiene el aula-->
                    <input type="hidden" name="aula" value="<?= $aula->id ?>">

                    <p><input class="btn btn-primary" type="submit" value="Crear" /></p>
                </form>

                <div id="sesionesSabado">

                    <h3>Sesiones ya en BBDD</h3>
                    <table id="horarioSabado" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Hora inicio</th>
                                <th>Hora Fin</th>
                                <th>Actividad</th>
                                <th>Monitor</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($sesiones as $sesion) : ?>

                                <?php if ($sesion->dia == "sabado") : ?>

                                    <tr>
                                        <td><?= $sesion->horaInicio ?></td>
                                        <td><?= $sesion->horaFin ?></td>
                                        <td><?= $sesion->seRealiza->nombre  ?></td>
                                        <td><?= $sesion->imparte->nombre ?></td>
                                    </tr>

                                <?php endif; ?>
                            <?php endforeach; ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Hora inicio</th>
                                <th>Hora Fin</th>
                                <th>Actividad</th>
                                <th>Monitor</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>

            </div>
            <!--/ #tabs-6 -->


            <div id="tabs-7">
                <p>Aquí aparecen las sesiones programadas para el Domingo</p>

                <button type="button" class="btn btn-primary"> <a class="btn" href="#ex8" rel="modal:open">Crea una nueva sesión</a></button>


                <!-- Formulario que se despliega con el modal -->
                <form method="post" action="<?= base_url() ?>sesion/crearPost" class="login_form modal" id="ex8" style="display:none;">
                    <h3>Creación de una nueva sesión</h3>

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


                    <!-- Campo oculto que contiene el día -->
                    <input type="hidden" name="dia" value="domingo">

                    <!-- Campo oculto que contiene el aula-->
                    <input type="hidden" name="aula" value="<?= $aula->id ?>">

                    <p><input class="btn btn-primary" type="submit" value="Crear" /></p>
                </form>

                <div id="sesionesDomingo">

                    <h3>Sesiones ya en BBDD</h3>
                    <table id="horarioDomingo" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Hora inicio</th>
                                <th>Hora Fin</th>
                                <th>Actividad</th>
                                <th>Monitor</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($sesiones as $sesion) : ?>

                                <?php if ($sesion->dia == "domingo") : ?>

                                    <tr>
                                        <td><?= $sesion->horaInicio ?></td>
                                        <td><?= $sesion->horaFin ?></td>
                                        <td><?= $sesion->seRealiza->nombre  ?></td>
                                        <td><?= $sesion->imparte->nombre ?></td>
                                    </tr>

                                <?php endif; ?>
                            <?php endforeach; ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Hora inicio</th>
                                <th>Hora Fin</th>
                                <th>Actividad</th>
                                <th>Monitor</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>

            </div>
            <!--/ #tabs-7 -->


            <script>
                $(function() {
                    $("#tabs").tabs();
                });
            </script>
            <script>
                $(document).ready(function() {
                    $('table').DataTable();
                    //$('#horarioMartes').DataTable();
                });
            </script>

            <script src="<?= base_url() ?>assets/js/app/sesionesHorario.js"></script>