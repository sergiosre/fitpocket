
<h2>Nueva aula del gimnasio</h2>
<form method="post" action="<?=base_url()?>aula/crearPost">
	Numero de aula
	<input type="number" name="aula" required="required" min="1">
	<br />
	<input type="submit" value="Crear Aula"/>
</form>
