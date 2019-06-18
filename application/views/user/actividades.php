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

			<?php foreach ($sesiones as $sesion) : ?>
				<?php if ($sesion->dia == "lunes") : ?>

					<div class="container-fluid pt-2">
						<div class="card shadow-lg sesion-size p-2">
							<div class="row">
								<div class="col-xs-6 col-md-2">
									<img src="<?= base_url() . $sesion->seRealiza->img ?>" class="card-img h-100" alt="">
								</div>
								<div class="col-xs-6 col-md-10">
									<div class="card-body">
										<h5 class="card-title"><?= $sesion->seRealiza->nombre  ?></h5>
										<p class="card-text">Monitor: <?= $sesion->imparte->nombre ?> - Hora: <?= $sesion->horaInicio ?> - <?= $sesion->horaFin ?></p>
										<p class="card-text">Aula: <?= $sesion->tieneLugarEn->numero ?></p>
										<button class="btn btn-color mr-5 reservarSesion">Reservar
											<input type="hidden" class="fechaReserva">
											<input type="hidden" id="sesion" value="<?= $sesion->id ?>">
											<input type="hidden" id="horaInicio" value="<?= $sesion->horaInicio ?>">
											<input type="hidden" id="user_id" value="<?= $_SESSION['user_id'] ?>">
										</button>
										
									</div>
								</div>
							</div>
						</div>
					</div>


				<?php endif; ?>
			<?php endforeach; ?>

		</div>

		<!-- Martes -->

		<div class="tab-pane fade" id="pills-martes" role="tabpanel" aria-labelledby="pills-martes-tab">

			<?php foreach ($sesiones as $sesion) : ?>
				<?php if ($sesion->dia == "martes") : ?>

					<div class="container-fluid pt-2">
						<div class="card shadow-lg sesion-size p-2">
							<div class="row">
								<div class="col-xs-6 col-md-2">
									<img src="<?= base_url() . $sesion->seRealiza->img ?>" class="card-img h-100" alt="">
								</div>
								<div class="col-xs-6 col-md-10">
									<div class="card-body">
										<h5 class="card-title"><?= $sesion->seRealiza->nombre  ?></h5>
										<p class="card-text">Monitor: <?= $sesion->imparte->nombre ?> - Hora: <?= $sesion->horaInicio ?> - <?= $sesion->horaFin ?></p>
										<p class="card-text">Aula: <?= $sesion->tieneLugarEn->numero ?></p>

										<button class="btn btn-color mr-5 reservarSesion">Reservar
											<input type="hidden" class="fechaReserva">
											<input type="hidden" id="sesion" value="<?= $sesion->id ?>">
											<input type="hidden" id="horaInicio" value="<?= $sesion->horaInicio ?>">
											<input type="hidden" id="user_id" value="<?= $_SESSION['user_id'] ?>">
										</button>
										<span class="card-text"><small class="text-muted">Aforo: 0/20</small></span>
									</div>
								</div>
							</div>
						</div>
					</div>


				<?php endif; ?>
			<?php endforeach; ?>

		</div>

		<!-- Miércoles -->
		<div class="tab-pane fade" id="pills-miercoles" role="tabpanel" aria-labelledby="pills-miercoles-tab">


			<?php foreach ($sesiones as $sesion) : ?>
				<?php if ($sesion->dia == "miercoles") : ?>

					<div class="container-fluid pt-2">
						<div class="card shadow-lg sesion-size p-2">
							<div class="row">
								<div class="col-xs-6 col-md-2">
									<img src="<?= base_url() . $sesion->seRealiza->img ?>" class="card-img h-100" alt="">
								</div>
								<div class="col-xs-6 col-md-10">
									<div class="card-body">
										<h5 class="card-title"><?= $sesion->seRealiza->nombre  ?></h5>
										<p class="card-text">Monitor: <?= $sesion->imparte->nombre ?> - Hora: <?= $sesion->horaInicio ?> - <?= $sesion->horaFin ?></p>
										<p class="card-text">Aula: <?= $sesion->tieneLugarEn->numero ?></p>

										<button class="btn btn-color mr-5 reservarSesion">Reservar
											<input type="hidden" class="fechaReserva">
											<input type="hidden" id="sesion" value="<?= $sesion->id ?>">
											<input type="hidden" id="horaInicio" value="<?= $sesion->horaInicio ?>">
											<input type="hidden" id="user_id" value="<?= $_SESSION['user_id'] ?>">
										</button>
										<span class="card-text"><small class="text-muted">Aforo: 0/20</small></span>
									</div>
								</div>
							</div>
						</div>
					</div>

				<?php endif; ?>
			<?php endforeach; ?>



		</div>

		<!-- Jueves -->
		<div class="tab-pane fade" id="pills-jueves" role="tabpanel" aria-labelledby="pills-jueves-tab">

			<?php foreach ($sesiones as $sesion) : ?>
				<?php if ($sesion->dia == "jueves") : ?>

					<div class="container-fluid pt-2">
						<div class="card shadow-lg sesion-size p-2">
							<div class="row">
								<div class="col-xs-6 col-md-2">
									<img src="<?= base_url() . $sesion->seRealiza->img ?>" class="card-img h-100" alt="">
								</div>
								<div class="col-xs-6 col-md-10">
									<div class="card-body">
										<h5 class="card-title"><?= $sesion->seRealiza->nombre  ?></h5>
										<p class="card-text">Monitor: <?= $sesion->imparte->nombre ?> - Hora: <?= $sesion->horaInicio ?> - <?= $sesion->horaFin ?></p>
										<p class="card-text">Aula: <?= $sesion->tieneLugarEn->numero ?></p>
										<button class="btn btn-color mr-5 reservarSesion">Reservar
											<input type="hidden" class="fechaReserva">
											<input type="hidden" id="sesion" value="<?= $sesion->id ?>">
											<input type="hidden" id="horaInicio" value="<?= $sesion->horaInicio ?>">
											<input type="hidden" id="user_id" value="<?= $_SESSION['user_id'] ?>">
										</button>
										<span class="card-text"><small class="text-muted">Aforo: 0/20</small></span>
									</div>
								</div>
							</div>
						</div>
					</div>

				<?php endif; ?>
			<?php endforeach; ?>

		</div>

		<!-- Viernes -->
		<div class="tab-pane fade" id="pills-viernes" role="tabpanel" aria-labelledby="pills-viernes-tab">


			<?php foreach ($sesiones as $sesion) : ?>
				<?php if ($sesion->dia == "viernes") : ?>

					<div class="container-fluid pt-2">
						<div class="card shadow-lg sesion-size p-2">
							<div class="row">
								<div class="col-xs-6 col-md-2">
									<img src="<?= base_url() . $sesion->seRealiza->img ?>" class="card-img h-100" alt="">
								</div>
								<div class="col-xs-6 col-md-10">
									<div class="card-body">
										<h5 class="card-title"><?= $sesion->seRealiza->nombre  ?></h5>
										<p class="card-text">Monitor: <?= $sesion->imparte->nombre ?> - Hora: <?= $sesion->horaInicio ?> - <?= $sesion->horaFin ?></p>
										<p class="card-text">Aula: <?= $sesion->tieneLugarEn->numero ?></p>
										<button class="btn btn-color mr-5 reservarSesion">Reservar
											<input type="hidden" class="fechaReserva">
											<input type="hidden" id="sesion" value="<?= $sesion->id ?>">
											<input type="hidden" id="horaInicio" value="<?= $sesion->horaInicio ?>">
											<input type="hidden" id="user_id" value="<?= $_SESSION['user_id'] ?>">
										</button>
										<span class="card-text"><small class="text-muted">Aforo: 0/20</small></span>
									</div>
								</div>
							</div>
						</div>
					</div>

				<?php endif; ?>
			<?php endforeach; ?>

		</div>

		<!-- Sábado -->
		<div class="tab-pane fade" id="pills-sabado" role="tabpanel" aria-labelledby="pills-sabado-tab">


			<?php foreach ($sesiones as $sesion) : ?>
				<?php if ($sesion->dia == "sabado") : ?>

					<div class="container-fluid pt-2">
						<div class="card shadow-lg sesion-size p-2">
							<div class="row">
								<div class="col-xs-6 col-md-2">
									<img src="<?= base_url() . $sesion->seRealiza->img ?>" class="card-img h-100" alt="">
								</div>
								<div class="col-xs-6 col-md-10">
									<div class="card-body">
										<h5 class="card-title"><?= $sesion->seRealiza->nombre  ?></h5>
										<p class="card-text">Monitor: <?= $sesion->imparte->nombre ?> - Hora: <?= $sesion->horaInicio ?> - <?= $sesion->horaFin ?></p>
										<p class="card-text">Aula: <?= $sesion->tieneLugarEn->numero ?></p>

										<button class="btn btn-color mr-5 reservarSesion">Reservar
											<input type="hidden" class="fechaReserva">
											<input type="hidden" id="sesion" value="<?= $sesion->id ?>">
											<input type="hidden" id="horaInicio" value="<?= $sesion->horaInicio ?>">
											<input type="hidden" id="user_id" value="<?= $_SESSION['user_id'] ?>">
										</button>
										<span class="card-text"><small class="text-muted">Aforo: 0/20</small></span>
									</div>
								</div>
							</div>
						</div>
					</div>

				<?php endif; ?>
			<?php endforeach; ?>

		</div>


		<!-- Domingo -->

		<div class="tab-pane fade" id="pills-domingo" role="tabpanel" aria-labelledby="pills-domingo-tab">

			<?php foreach ($sesiones as $sesion) : ?>
				<?php if ($sesion->dia == "domingo") : ?>

					<div class="container-fluid pt-2">
						<div class="card shadow-lg sesion-size p-2">
							<div class="row">
								<div class="col-xs-6 col-md-2">
									<img src="<?= base_url() . $sesion->seRealiza->img ?>" class="card-img h-100" alt="">
								</div>
								<div class="col-xs-6 col-md-10">
									<div class="card-body">
										<h5 class="card-title"><?= $sesion->seRealiza->nombre  ?></h5>
										<p class="card-text">Monitor: <?= $sesion->imparte->nombre ?> - Hora: <?= $sesion->horaInicio ?> - <?= $sesion->horaFin ?></p>
										<p class="card-text">Aula: <?= $sesion->tieneLugarEn->numero ?></p>
										<button class="btn btn-color mr-5 reservarSesion">Reservar
											<input type="hidden" class="fechaReserva">
											<input type="hidden" id="sesion" value="<?= $sesion->id ?>">
											<input type="hidden" id="horaInicio" value="<?= $sesion->horaInicio ?>">
											<input type="hidden" id="user_id" value="<?= $_SESSION['user_id'] ?>">
										</button>
										<span class="card-text"><small class="text-muted">Aforo: 0/20</small></span>
									</div>
								</div>
							</div>
						</div>
					</div>

				<?php endif; ?>
			<?php endforeach; ?>

		</div>

	</div>

</div>
</div>


<script src="<?= base_url() ?>assets/js/app/reservaSesion.js"></script>