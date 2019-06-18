<div class="container" style="margin-top:100px">

	<?php if (sizeof($actividades) > 0) : ?>
		<div class="card-columns">

			<?php foreach ($actividades as $actividad) : ?>

				<div class="card actividad">
					<img class="card-img-bottom" width="200px" height="200px" src="<?= base_url() . $actividad->img ?>" alt="Card image" data-toggle="modal" data-target="#actividadModal">
					<div class="card-img-overlay">
					</div>
					<h4 class="card-title" style="text-align: center;"><?= $actividad->nombre ?></h4>
					<input type="hidden" id="info" value="<?= $actividad->info ?>">
					<input type="hidden" id="impacto" value="<?= $actividad->impacto ?>">

				</div>

			<?php endforeach; ?>

		</div>

	<?php endif; ?>

	<script src="<?= base_url() ?>assets/js/app/listaActividades.js"></script>