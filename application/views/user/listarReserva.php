<!-- Tabs -->

<div class="container-fluid btn-color2 sticky-top-2" id="dias">
	<div class="container-fluid pt-1 pb-1 d-flex justify-content-center align-items-center">
		<div class="row nav nav-pills justify-content-center align-items-center" id="pills-tab" role="tablist">
			<button class="btn-negro active" id="pills-proximas-tab" data-toggle="pill" href="#pills-proximas" role="tab" aria-controls="pills-proximas" aria-selected="true">Proximas reservas</button>
			<button class="btn-negro" id="pills-pasadas-tab" data-toggle="pill" href="#pills-pasadas" role="tab" aria-controls="pills-pasadas" aria-selected="false">Histórico</button>
		</div>

	</div>
</div>

<!-- Próximas reservas -->

<div class="container-fluid justify-content-center p-0">
	<div class="tab-content" id="pills-tabContent">
		<div class="col-12 tab-pane fade show active" id="pills-proximas" role="tabpanel" aria-labelledby="pills-home-tab" data-spy="scroll" data-target="#dias" data-offset="0">

			<?php if (sizeof($reservasProximas) == 0) : ?>
				<div class="card shadow-lg sesion-size p-2">
					<div class="row">

						<div class="col-xs-12 col-md-12">
							<div class="card-body">
								<h5 class="card-title">NO TIENE NINGUNA RESERVA ACTIVA</h5>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>


			<?php foreach ($reservasProximas as $reservaProxima) : ?>
				<?php if ($reservaProxima->estado == 1) : ?>

					<div class="container-fluid pt-2">
						<div class="card shadow-lg sesion-size p-2">
							<div class="row">
								<div class="col-xs-6 col-md-2">
									<img src="<?= base_url() . $reservaProxima->sesion->seRealiza->img ?>" class="card-img h-100" alt="">
								</div>
								<div class="col-xs-6 col-md-10">
									<div class="card-body">
										<h5 class="card-title"><?= $reservaProxima->sesion->seRealiza->nombre ?></h5>
										<p class="card-text">
											<?= $reservaProxima->fecha_reserva ?>
										</p>
										<p class="card-text">Aula: <?= $reservaProxima->sesion->tieneLugarEn->numero ?></p>
										<p class="card-text confirmada">RESERVA CONFIRMADA</p>
										<button class="btn btn-color mr-5 cancelarReserva">Cancelar Reserva
											<input type="hidden" name="reservaId" id="reservaId""  value=" <?= $reservaProxima->id ?>">
										</button>

									</div>
								</div>
							</div>
						</div>
					</div>

				<?php endif; ?>
			<?php endforeach; ?>

			<?php foreach ($reservasProximas as $reservaProxima) : ?>
				<?php if ($reservaProxima->estado == 0) : ?>

					<div class="container-fluid pt-2">
						<div class="card shadow-lg sesion-size p-2 cancelada">
							<div class="row">
								<div class="col-xs-6 col-md-2">
									<img src="<?= base_url() . $reservaProxima->sesion->seRealiza->img ?>" class="card-img h-100" alt="">
								</div>
								<div class="col-xs-6 col-md-10">
									<div class="card-body">
										<h5 class="card-title"><?= $reservaProxima->sesion->seRealiza->nombre ?></h5>
										<p class="card-text">
											<?= $reservaProxima->fecha_reserva ?>
										</p>
										<p class="card-text">Aula: <?= $reservaProxima->sesion->tieneLugarEn->numero ?></p>
										<p class="card-text cancelada">RESERVA CANCELADA</p>
										<button class="btn btn-color mr-5 reactivarReserva">Reactivar reserva
											<input type="hidden" name="reservaId" id="reservaId" value="<?= $reservaProxima->id ?>">
										</button>

									</div>
								</div>
							</div>
						</div>
					</div>

				<?php endif; ?>
			<?php endforeach; ?>



		</div>

		<!-- Histórico de reservas  -->

		<div class="tab-pane fade" id="pills-pasadas" role="tabpanel" aria-labelledby="pills-pasadas-tab">

			<?php if (sizeof($reservasPasadas) == 0) : ?>
				<div class="card shadow-lg sesion-size p-2">
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<div class="card-body">
								<h5 class="card-title">No ha participado en un clase</h5>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>


			<?php if (sizeof($reservasPasadas) != 0) : ?>

				<?php foreach ($reservasPasadas as $pasada) : ?>
					<div class="container-fluid pt-2">
						<div class="card shadow-lg sesion-size p-2 pasada">
							<div class="row">
								<div class="col-xs-12 col-md-12">
									<div class="card-body">
										<h5 class="card-title"><?= $pasada->actividad ?></h5>
										<p class="card-text">
											<?= $pasada->fecha_reserva ?>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>


				<?php endforeach; ?>
			<?php endif; ?>

		</div>




	</div>


</div>
</div>

<script src="<?= base_url() ?>assets/js/app/modificacionReserva.js"></script>