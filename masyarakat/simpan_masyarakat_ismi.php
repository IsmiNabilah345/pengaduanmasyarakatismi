<?php

include '../koneksi.php';

if (isset($_POST['daftar'])) {

  $tgl_ismi = date("Y-m-d");
  session_start();
  $nik_ismi = $_SESSION['nik_masyarakat_ismi'];
  $isi_ismi = $_POST['isi_laporan_ismi'];

  $ekstensi_diperbolehkan_ismi  = array('png', 'jpg', 'jpeg', 'gif');
  $foto_ismi = $_FILES['foto_ismi']['name'];
  $x = explode('.', $foto_ismi);
  $ekstensi = strtolower(end($x));
  $ukuran  = $_FILES['foto_ismi']['size'];
  $file_tmp = $_FILES['foto_ismi']['tmp_name'];

  if (in_array($ekstensi, $ekstensi_diperbolehkan_ismi) === true) {
    if ($ukuran < 1044070) {
      move_uploaded_file($file_tmp, '../assets/image_pengaduan/' . $foto_ismi);

      $sql = mysqli_query($conn, "INSERT INTO `tb_pengaduan_ismi` VALUES(NULL, '$tgl_ismi', '$nik_ismi',  '$isi_ismi', '$foto_ismi', '0')");

      if ($sql) {
        echo "<script>alert('Berhasil menambahkan pengaduan!');document.location.href='tampil_pengaduan_ismi.php';</script>";
      } else {
        echo "<script>alert('Gagal mengupload gambar!');document.location.href='masyarakat_ismi.php';</script>";
      }
    } else {
      echo "<script>alert('Ukuran file terlalu besar');document.location.href='masyarakat_ismi.php';</script>";
    }
  } else {
    echo "<script>alert('Ekstensi file tidak diperbolehkan');document.location.href='masyarakat_ismi.php';</script>";
  }
}
