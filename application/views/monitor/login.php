
<h2>Login Administrador</h2>
<form method="post" action="<?=base_url()?>administrador/loginPost">
	Usuario
	<input type="text" name="usuario" id="usuario" required="required">
	<br />
	Contraseña
	<input type="text" name="pw" id="pw" required="required">
	<br />
	<input type="button" class="btn btn-primary" value="Login" id="loginMonitor"/>
</form>
<br/>
<div id="mensaje"></div>
