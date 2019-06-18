<h2>Lista de Administradores</h2>
<table class="table table-striped table-bordered">
	<tr>
		<th>Usuario</th>
		<th>Acciones</th>
	</tr>

	<?php foreach ($administradores as $administrador): ?>
		<tr>
			<td>
				<?=$administrador->usuario?>
			</td>
			<td class="form-inline text-center">
				<form action="#" method="post">
					<button><img src="<?=base_url()?>assets/img/edit.png" width="10" height="15"/></button>
					<input type="hidden" name="id" value="<?=$administrador->id?>"/>
				</form>
				<form action="#" method="post">
					<button><img src="<?=base_url()?>assets/img/trash.png" width="10" height="15"/></button>
					<input type="hidden" name="id" value="<?=$administrador->id?>"/>
				</form>
			</td>
		</tr>
	<?php endforeach;?>
</table>