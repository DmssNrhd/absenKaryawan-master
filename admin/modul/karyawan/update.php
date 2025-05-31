<?php
require_once '../koneksi.php';


function update_karyawan() {
    global $koneksi;
    
    $id = $_POST['id'];
    $nip = $_POST['nip'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $kontak = $_POST['kontak'];
    
    // Handle file upload if a new photo is provided
    if (!empty($_FILES['foto']['name'])) {
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        $path = "../../assets/images/" . $foto;
        
        // Move uploaded file
        if (move_uploaded_file($tmp, $path)) {
            // Update with new photo
            $query = "UPDATE tb_karyawan SET 
                    nip = '$nip',
                    username = '$username',
                    password = '$password',
                    nama = '$nama',
                    tempat_lahir = '$tempat_lahir',
                    tanggal_lahir = '$tanggal_lahir',
                    alamat = '$alamat',
                    kontak = '$kontak',
                    foto = '$foto'
                    WHERE id = '$id'";
            
            if (mysqli_query($koneksi, $query)) {
                echo "<script>alert('Data berhasil diupdate!');</script>";
            } else {
                echo "<script>alert('Data gagal diupdate!');</script>";
            }
        }
    } else {
        // Update without changing photo
        $query = "UPDATE tb_karyawan SET 
                nip = '$nip',
                username = '$username',
                password = '$password',
                nama = '$nama',
                tempat_lahir = '$tempat_lahir',
                tanggal_lahir = '$tanggal_lahir',
                alamat = '$alamat',
                kontak = '$kontak'
                WHERE id = '$id'";
        
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Data berhasil diupdate!');</script>";
        } else {
            echo "<script>alert('Data gagal diupdate!');</script>";
        }
    }
}
?> 