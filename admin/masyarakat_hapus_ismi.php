<?php

include '../koneksi.php';

$id = $_GET['id'];
$sql = "DELETE FROM tb_masyarakat_ismi WHERE nik_masyarakat_ismi='$id'";
$hapus = mysqli_query($conn, $sql);

if ($hapus) {
    echo "<script>alert('Data berhasil di hapus!');document.location.href='data_masyarakat_ismi.php';</script>";
} else {
    echo "<script>alert('Mohon maaf data tidak bisa hapus!');document.location.href='data_masyarakat_ismi.php';</script>";
}
