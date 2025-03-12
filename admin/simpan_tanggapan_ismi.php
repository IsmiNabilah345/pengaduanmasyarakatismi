<?php

include '../koneksi.php';

if (isset($_POST['daftar'])) {

  // $id_tanggapan_ismi = $_POST['id_tanggapan_ismi'];
  $id_pengaduan_ismi = $_POST['id_pengaduan_ismi'];
  session_start();
  $tgl_ismi = date("Y-m-d");
  $tanggapan = $_POST['tanggapan_ismi'];
  $id_petugas = $_SESSION['id_petugas_ismi'];

  $sql = "INSERT INTO tb_tanggapan_ismi VALUES ('', '$id_pengaduan_ismi', '$tgl_ismi', '$tanggapan', '$id_petugas')";
  $query = mysqli_query($conn, $sql);
  $sql2 = "UPDATE tb_pengaduan_ismi SET status_ismi='selesai' WHERE id_pengaduan_ismi=$id_pengaduan_ismi";
  $query2 = mysqli_query($conn, $sql2);
  // echo $sql;
  // var_dump($query, $query2);
  // die;

  if ($query && $query2) {
    echo "<script>alert('Berhasil menanggapi!');document.location.href='data_tanggapan_ismi.php';</script>";
  } else {
    echo "<script>alert('Gagal menanggapi!');document.location.href='admin_ismi.php';</script>";
  }
}
