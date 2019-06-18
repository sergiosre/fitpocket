<h2>Actualizar afición</h2>
<form method="post" action="<?=base_url()?>aficion/updatePost">
	Nombre
	<input type="hidden" name="id" value="<?=$aficion->id?>"/>
	<input type="text" name="nombre" required="required" value="<?=$aficion->nombre ?>" />
	<br />
	<input type="submit" />
</form>
