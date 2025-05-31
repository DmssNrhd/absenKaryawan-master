<?php include 'comp/header.php'; 
include 'update.php'; 
require_once '../koneksi.php';



if (isset($_POST['simpan'])) {
    echo "<meta http-equiv='refresh' content='0'>";
    simpan_karyawan();
}

if (isset($_POST['update'])) {
    update_karyawan();
    echo "<script>window.location.href = '?m=karyawan';</script>";
    exit();
}

if (isset($_POST['hapus'])) {
    hapus_karyawan();
}

// Get current page number
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman = max(1, $halaman); // Ensure minimum page is 1

// Set items per page
$items_per_page = 10;

// Calculate offset
$offset = ($halaman - 1) * $items_per_page;

// Get total records
$total_records_query = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tb_karyawan");
$total_records = mysqli_fetch_assoc($total_records_query)['total'];

// Calculate total pages
$total_halaman = ceil($total_records / $items_per_page);

// Get data for current page
$query = mysqli_query($koneksi, "SELECT * FROM tb_karyawan LIMIT $offset, $items_per_page");

// Calculate pagination variables
$previous = $halaman - 1;
$next = $halaman + 1;
?>
<div class="main-content">
	<div class="section__content section__content--p30">
		
	</div>
	<div class="content-wrapper">
	<div class="content-header">
		 <div class="row mb-2">
          <div class="col-sm-6">
           <h3 class="col-sm-6">Data Karyawan</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Karyawan</li>
            </ol>
          </div><!-- /.col -->
        </div>
	</div>


	<!-- Main Content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12"><br>
					<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#exampleModal">
  Tambah Data karyawan
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah data karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
      <form action="" method="POST" enctype="multipart/form-data">
      	<div class="form-group">
          <label>NIP</label>
          <input type="text" class="form-control" name="nip">
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="username">
        </div>
         <div class="form-group">
          <label>Password</label>
          <input type="text" class="form-control" name="password">
        </div>
         <div class="form-group">
          <label>Nama</label>
          <input type="text" class="form-control" name="nama">
        </div>
         <div class="form-group">
          <label>Tempat Lahir</label>
          <input type="text" class="form-control" name="tempat_lahir">
        </div>
           <div class="form-group">
          <label>Tanggal Lahir</label>
          <input type="date" class="form-control" name="tanggal_lahir">
        </div>
           <div class="form-group">
          <label>Alamat</label>
         <textarea name="alamat" class="form-control"></textarea>
        </div>
           <div class="form-group">
          <label>Kontak</label>
          <input type="text" class="form-control" name="kontak">
        </div>

         <div class="form-group">
          <label>Foto</label>
          <input type="file" class="form-control" name="foto">
        </div>
        <div class="modal-footer">
        <button type="submit" name="simpan" class="btn btn-primary">Save changes</button>
        <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
     
    </div>
      
    </div>
  </div>
</div>

<!-- Tabel -->
<div class="row">
 <div class="table-responsive table--no-card m-b-30">
	  	<!-- <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIP</th>
                                                <th>Nama</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Alamat</th>
                                                <th>Kontak</th>
                                                <th>Foto</th>
                                                <th>aksi</th>
                                                
                                            </tr>
                                        </thead>
                                        <?php 
                           

                                            $i = 1;
                                            
                                         ?>
                                        <tbody>
                                            <?php include 'paging.php'; ?>
										</tbody>
                                    </table> -->
                                        <table class="table table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIP</th>
                                                <th>Nama</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Alamat</th>
                                                <th>Kontak</th>
                                                <th>Foto</th>
                                                <th>aksi</th>
                                                
                                            </tr>
                                        </thead>
                      
                                        <tbody>
                                          <?php
                                            $i = 1;
                                            while($row = mysqli_fetch_array($query)){
                                            ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $row['nip']; ?></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['tempat_lahir']; ?></td>
                                                <td><?php echo $row['tanggal_lahir']; ?></td>
                                                <td><?php echo $row['alamat']; ?></td>
                                                <td><?php echo $row['kontak']; ?></td>
                                                <td><img src="../assets/images/<?php echo $row['foto']; ?>" width="50"></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>">
                                                        Edit
                                                    </button>
                                                    <form action="" method="POST" style="display: inline;">
                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" name="hapus" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel<?php echo $row['id']; ?>">Edit Data Karyawan</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                                <div class="form-group">
                                                                    <label>NIP</label>
                                                                    <input type="text" class="form-control" name="nip" value="<?php echo $row['nip']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Username</label>
                                                                    <input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Password</label>
                                                                    <input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Nama</label>
                                                                    <input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Tempat Lahir</label>
                                                                    <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $row['tempat_lahir']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Tanggal Lahir</label>
                                                                    <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Alamat</label>
                                                                    <textarea name="alamat" class="form-control"><?php echo $row['alamat']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Kontak</label>
                                                                    <input type="text" class="form-control" name="kontak" value="<?php echo $row['kontak']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Foto</label>
                                                                    <input type="file" class="form-control" name="foto">
                                                                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah foto</small>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </tbody>
                                    </table>
</div>
	</div>
    <center><ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if($halaman > 1){ echo "href='?m=karyawan&halaman=$previous'"; } ?>>Previous</a>
                </li>
                <?php 
                for($x=1;$x<=$total_halaman;$x++){
                    ?> 
                    <li class="page-item"><a class="page-link" href="?m=karyawan&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                    <?php
                }
                ?>              
                <li class="page-item">
                    <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?m=karyawan&halaman=$next'"; } ?>>Next</a>
                </li>
            </ul>
              </center> 
	 
<!-- end table -->
  
				</div>	
			</div>
		</div>
	</section>

</div>

</div>
<?php include 'comp/footer.php'; ?>
