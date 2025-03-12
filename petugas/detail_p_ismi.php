<?php
    include '../koneksi.php';

    session_start();
    $id = @$_GET['id'];
    $sql = "SELECT * FROM tb_pengaduan_ismi WHERE id_pengaduan_ismi=$id";
    $role = mysqli_query($conn, $sql);
    $query =mysqli_fetch_array($role);  

    if ($query['status_ismi']=="0") {
        $result = mysqli_query($conn, "UPDATE `tb_pengaduan_ismi` SET `status_ismi`='proses' WHERE `id_pengaduan_ismi`='$id'");
    }elseif ($query['status_ismi']=="proses") {
        $result = mysqli_query($conn, "UPDATE `tb_pengaduan_ismi` SET `status_ismi`='selesai' WHERE `id_pengaduan_ismi`='$id'");
    }elseif ($query['status_ismi']=="selesai") {
        echo"Selesai";
    }header("location:petugas_ismi.php");
?>