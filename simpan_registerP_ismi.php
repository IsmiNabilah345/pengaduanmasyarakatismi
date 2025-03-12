<?php

include 'koneksi.php';

if (isset($_POST['daftar'])) {

  // $id_petugas = $_POST['id_petugas_ismi'];
  $naama = $_POST['nama_petugas_ismi'];
  $username = $_POST['username_petugas_ismi'];
  $password = MD5($_POST['password_petugas_ismi']);
  $tlp_ismi = $_POST['telp_petugas_ismi'];
  $level = $_POST['level_ismi'];

  $sql = mysqli_query($conn, "SELECT * FROM tb_petugas_ismi");
  $query2 = mysqli_fetch_array($sql);

  if (is_numeric($tlp_ismi)) {
    if ($tlp_ismi != $query2['telp_petugas_ismi']) {
      $sql2 = "INSERT INTO tb_petugas_ismi VALUES ( '', '$nama', '$username', '$password', '$tlp_ismi', '$level')";
      $query3 = mysqli_query($conn, $sql2);

      if ($query3) {
        echo "<script>alert('Registrasi Berhasil');document.location.href='admin/data_petugas_ismi.php';</script>";
      }
    } else {
      if ($tlp_ismi === $query2['telp_petugas_ismi']) {
        echo "<script>alert('Registrasi gagal karena Nomor Telepon tidak tepat');document.location.href='admin/data_petugas_ismi.php';</script>";
      } else {
        echo "<script>alert('Registrasi gagal');document.location.href='admin/data_petugas_ismi.php';</script>";
      }
    }
  } else {
    echo "<script>alert('Registrasi gagal. Masukan data dengan sesuai!');document.location.href='admin/data_petugas_ismi.php';</script>";
  }
}
