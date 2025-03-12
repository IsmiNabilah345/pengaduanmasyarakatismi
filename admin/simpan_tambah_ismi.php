<?php

include '../koneksi.php';

if (isset($_POST['daftar'])) {

  $nik_ismi = $_POST['nik_masyarakat_ismi'];
  $nama_ismi = $_POST['nama_ismi'];
  $username = $_POST['username_ismi'];
  $password = MD5($_POST['password_ismi']);
  $tlp_ismi = $_POST['telp_ismi'];

  $sql = mysqli_query($conn, "SELECT * FROM tb_masyarakat_ismi");
  $query2 = mysqli_fetch_array($sql);


  if (is_numeric($nik_ismi) && is_numeric($tlp_ismi)) {
    if (($nik_ismi != $query2['nik_masyarakat_ismi']) && ($tlp_ismi != $query2['telp_ismi'])) {
      $sql2 = "INSERT INTO tb_masyarakat_ismi VALUES ( '$nik_ismi', '$nama_ismi', '$username', '$password', '$tlp_ismi')";
      $query3 = mysqli_query($conn, $sql2);

        var_dump($query3);
  die;

      if ($query3) {
        echo "<script>alert('Registrasi Berhasil');document.location.href='data_masyarakat_ismi.php';</script>";
      }
    } else {
      if (($nik_ismi === $query2['nik_masyarakat_ismi']) && ($tlp_ismi === $query2['telp_ismi'])) {
        echo "<script>alert('Registrasi gagal karena NIK tidak tepat');document.location.href='tambah_masyarakat_ismi.php';</script>";
      } elseif (($nik_ismi != $query2['nik_masyarakat_ismi']) && ($tlp_ismi != $query2['telp_ismi'])) {
        echo "<script>alert('Registrasi gagal karena Nomor Telepon tidak tepat');document.location.href='tambah_masyarakat_ismi.php';</script>";
      } else {
        echo "<script>alert('Registrasi gagal');document.location.href='tambah_masyarakat_ismi.php';</script>";
      }
    }
  } else {
    echo "<script>alert('Registrasi gagal. Masukan data dengan sesuai!');document.location.href='tambah_masyarakat_ismi.php';</script>";
  }
}
