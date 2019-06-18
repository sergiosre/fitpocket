<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Fitpocket - Log In</title>
	<!-- CSS -->
	<link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/main.css">
	<script src="<?= base_url() ?>assets/js/jquery-3.2.1.min.js"></script>
	<script src="<?= base_url() ?>assets/js/app/login.js"></script>
</head>

<body>
	<div class="container">
		<div class="row mt-row justify-content-center">
			<div class="col-8">
				<div class="row">
					<div class="col-12">
						<form class="form-signin" method="POST">
							<div class="text-center mb-4">
								<img src="<?= base_url() ?>assets/img/logo_completo.png" alt="" style="width: 250px; height: 250px;">
							</div>

							<div class="form-label-group">
								<label for="inputEmail">Email address</label>
								<input type="text" id="usuario" class=" form-control" placeholder="Email address" required="" name="usuario" autofocus="true">
							</div>

							<div class="form-label-group">
								<label for="inputPassword">Password</label>
								<input type="password" id="pw" class="form-control" placeholder="Password" name="pw" required="">
							</div>

							<div class="checkbox mb-3">
								<label>
									<input type="checkbox" value="remember-me"> Remember me
								</label>
							</div>
							<div id="mensaje"></div>
							<button class="btn btn-lg btn-primary btn-block" type="button" id="login">Sign in</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>