<?php include 'comp/header.php'; ?>
<?php

if (isset($_POST['hapus'])) {
	hapus_absen();
}

?>
<div class="main-content">
	<div class="section__content section__content--p30">

	</div>
	<div class="content-wrapper">
		<div class="content-header">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h3 class="col-sm-6">Rekap Absen</h3>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active">Rekap Absen</li>
					</ol>
				</div><!-- /.col -->
				<div class="col-sm-3 ml-3">

					<form action="" method="POST">
						<div class="col-sm">
							<label>Bulan : </label>
							<input type="month" name="bulan_tahun" class="form-control" required>
						</div>
						<div class="col-sm mt-2">
							<button type="submit" name="cari" class="btn btn-primary">Proses</button>
						</div>
					</form>
				</div><!-- /.col -->
			</div>
		</div>


		<!-- Main Content -->
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12"><br>
						<?php

						require_once '../koneksi.php';

						function getIndonesianMonth($month) {
							$months = [
								'January' => 'Januari',
								'February' => 'Februari',
								'March' => 'Maret',
								'April' => 'April',
								'May' => 'Mei',
								'June' => 'Juni',
								'July' => 'Juli',
								'August' => 'Agustus',
								'September' => 'September',
								'October' => 'Oktober',
								'November' => 'November',
								'December' => 'Desember'
							];
							return $months[$month];
						}

						if (isset($_POST['cari'])) {
							$bulan_tahun = $_POST['bulan_tahun'];
							$date = new DateTime($bulan_tahun);
							$bulan = getIndonesianMonth($date->format('F')); // Convert to Indonesian month name
							$tahun = $date->format('Y');

							$sql = "SELECT * FROM tb_absen WHERE bulan = '$bulan' AND tahun = '$tahun'";
							$query = mysqli_query($koneksi, $sql);
							$check = mysqli_num_rows($query);

							if ($check) {
								include 'table_rekap.php';
							} else {
								echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Mohon Maaf!</strong> Data Tidak Ditemukan
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
							}
						}

						?>

					</div>
		</section>

	</div>

</div>
<?php include 'comp/footer.php'; ?>