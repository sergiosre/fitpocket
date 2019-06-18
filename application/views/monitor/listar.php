<h2>Lista de monitores</h2>
<table class="table table-striped table-bordered">
	<tr>
		<th>Nombre</th>
		<th>Apellidos</th>
		<th>Acciones</th>
	</tr>
	
	<?php foreach ($monitores as $monitor): ?>
		<tr>
			<td>
				<?= $monitor->nombre ?>
			</td>
			<td>
				<?= $monitor->apellidos ?>
			</td>
			<td class="form-inline text-center">
				<form action="<?=base_url()?>monitor/update" method="post">
					<button><img src="<?=base_url()?>assets/img/edit.png" width="10" height="15"/></button>
					<input type="hidden" name="id" value="<?=$monitor->id ?>"/>
				</form>
				<form action="<?=base_url()?>monitor/delete" method="post">
					<button><img src="<?=base_url()?>assets/img/trash.png" width="10" height="15"/></button>
					<input type="hidden" name="id" value="<?=$monitor->id ?>"/>
				</form>
			</td>
		</tr>
	<?php endforeach;?>
</table>