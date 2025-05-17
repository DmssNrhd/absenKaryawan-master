<?php
require 'fungsi/fungsi.php';
require 'fungsi/proses_log.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login - Karyawan </title> 
	<link rel="stylesheet" href="<?= url() ?>css/reset.css">
	<link rel="icon" type="image/png" href="<?= url() ?>images/logo_absensi.png">
	<link rel="stylesheet" href="<?= url() ?>css/style.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
  <div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
      <div class="col-md-4">
        <div class="card shadow">
          <div class="card-body">
            <h3 class="text-center mb-4">Login Karyawan</h3>
            <form method="POST" autocomplete="off">
              <div class="mb-3">
                <label for="user" class="form-label">Username</label>
                <input type="text" name="user" id="user" class="form-control" placeholder="Masukkan username" required autocomplete="off">
              </div>
              <div class="mb-3">
                <label for="pass" class="form-label">Password</label>
                <input type="password" name="pass" id="pass" class="form-control" placeholder="Masukkan password" required>
              </div>
              <div class="d-grid">
                <button type="submit" name="login" class="btn btn-primary">Sign In</button>
              </div>
            </form>
            <?php if (isset($_POST['login'])) {
              $pro->login(); // eksekusi logic login lo di sini
            } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>