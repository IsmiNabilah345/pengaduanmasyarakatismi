<?php

include '../koneksi.php';

$id = $_GET['id'];
$tanggapan = mysqli_query($conn, "SELECT * FROM tb_tanggapan_ismi WHERE id_petugas_ismi='$id'");
$tgp = mysqli_fetch_array($tanggapan);

if ($tgp != NULL) {
    echo "<script>alert('Mohon maaf data tidak bsia hapus!');document.location.href='data_petugas_ismi.php';</script>";
} else {
    $sql = "DELETE FROM tb_petugas_ismi WHERE id_petugas_ismi='$id'";
    $hapus = mysqli_query($conn, $sql);

    if ($hapus) {
        echo "<script>alert('Data berhasil di hapus!');document.location.href='data_petugas_ismi.php';</script>";
    } else {
        echo "<script>alert('Data berhasil di hapus!');document.location.href='data_petugas_ismi.php';</script>";
    }
}
