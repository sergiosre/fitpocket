<h1>Registro de usuario</h1>
<form method="post" action="<?=base_url()?>user/registerPost" name="form_user_register">
  <div class="form-group">
    <label for="nombre_id">Nombre</label>
    <input type="text" class="form-control" name="nombre_name" id="nombre_id" placeholder="Introduce tu nombre">
  </div>
  <div class="form-group">
    <label for="nombre_id">Apellidos</label>
    <input type="text" class="form-control" name="apellidos_name" id="apellidos_id" placeholder="Introduce tus apellidos">
  </div>
  <div class="form-group">
    <label for="tlf_id">Móvil</label>
    <input type="text" class="form-control" name="tlf_name" id="tlf_id" placeholder="Introduce tu móvil">
  </div>
  <div class="form-group">
    <label for="email_user_register_id">Email</label>
    <input type="email" class="form-control" name="email_user_register_name" id="email_user_register_id" aria-describedby="emailHelp" placeholder="Introduce email">
  </div>
  <div class="form-group">
    <label for="nombre_id">Usuario</label>
    <input type="text" class="form-control" name="usuario_name" id="usuario_id" placeholder="Introduce usuario">
  </div>
  <div class="form-group">
    <label for="password_user_register_id">Contraseña</label>
    <input type="password" class="form-control" name="password_user_register_name" id="password_user_register_id" placeholder="Introduce tu contraseña">
  </div>
  <div class="form-group">
    <label for="password_repeat_id">Repite la Contraseña</label>
    <input type="password" class="form-control" name="password_repeat_name" id="password_repeat_id" placeholder="Repite tu contraseña">
  </div>
  <div class="form-group">
    <label for="edad_id">Edad</label>
    <input type="text" class="form-control" name="edad_name" id="edad_id" placeholder="Introduce tu edad">
  </div>
    <div class="form-group">
    <label for="estatura_id">Estatura</label>
    <input type="text" class="form-control" name="estatura_name" id="estatura_id" placeholder="Introduce tu estatura en (cm)">
  </div>
  <div class="form-group">
    <label for="peso_id">Peso</label>
    <input type="text" class="form-control" name="peso_name" id="peso_id" placeholder="Introduce tu peso">
  </div>
  <div class="form-group">
    <label for="tlf_id">Foto de Perfil</label>
    <input type="file" class="form-control-file" name="foto_name" id="foto_id">
  </div>
  <div class="form-group">
    <button type="button" class="btn btn-primary" id="registrar">Registrar</button>
  </div>
</form>