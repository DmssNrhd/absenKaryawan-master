<?php
require 'fungsi/fungsi.php';
require 'fungsi/proses_log.php';
?>
<!DOCTYPE html>
<html>

<head>

	<meta charset="UTF-8">

	<title>Login - Admin </title>

	<link rel="stylesheet" href="<?= url() ?>css/reset.css">

	<link rel="icon" type="image/png" href="<?= url() ?>images/logo_absensi.png">

	<link rel="stylesheet" href="<?= url() ?>css/style.css" media="screen" type="text/css" />

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
	<div class="container">
		<div class="row justify-content-center align-items-center vh-100">
			<div class="col-md-4">
				<div class="card shadow-sm">
					<div class="card-body">
						<h1 class="text-center mb-4">Login Admin</h1>
						<form method="POST" autocomplete="off">
							<div class="mb-3">
								<input type="text" name="user" class="form-control" placeholder="Username" required autocomplete="off">
							</div>
							<div class="mb-3">
								<input type="password" name="pass" class="form-control" placeholder="Password" required>
							</div>
							<!-- Uncomment kalo nanti butuh forgot password -->
							<!-- <div class="mb-3 text-end">
                <a href="#" class="text-decoration-none small">Forgot?</a>
              </div> -->
							<div class="d-grid">
								<button type="submit" name="login" class="btn btn-primary">Sign in</button>
							</div>
						</form>
						<?php if (isset($_POST['login'])) {
							$pro->login();
						} ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>