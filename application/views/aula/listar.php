<h2>Lista aulas en las instalaciones</h2>
<table class="table table-striped table-bordered">
	<tr>
		<th>Numero</th>
		<th>Acciones</th>

	</tr>
	
	<?php foreach ($aulas as $aula): ?>
		<tr>
			<td>
				<?= $aula->numero ?>
			</td>

			<td class="form-inline text-center">

			<form action="<?=base_url()?>sesion/horario" method="post">
					<button>Organizar horario</button>
					<input type="hidden" name="id" value="<?=$aula->id ?>"/>
				</form>

				<form action="<?=base_url()?>aula/update" method="post">
					<button><img src="<?=base_url()?>assets/img/edit.png" width="10" height="15"/></button>
					<input type="hidden" name="id" value="<?=$aula->id ?>"/>
				</form>
				
				<form action="<?=base_url()?>aula/delete" method="post">
					<button><img src="<?=base_url()?>assets/img/trash.png" width="10" height="15"/></button>
					<input type="hidden" name="id" value="<?=$aula->id ?>"/>
				</form>
			</td>
		</tr>
	<?php endforeach;?>
</table>