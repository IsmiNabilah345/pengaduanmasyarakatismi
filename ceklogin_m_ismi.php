<?php
session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = MD5($_POST['password']);

$masyarakat = mysqli_query($conn, "SELECT * FROM tb_masyarakat_ismi WHERE username_ismi='$username' AND password_ismi='$password'");
$cek = mysqli_fetch_array($masyarakat);

if (mysqli_num_rows($masyarakat) !== 0) {

    $_SESSION['nik_masyarakat_ismi'] = $cek['nik_masyarakat_ismi'];
    $_SESSION['username_ismi'] = $cek['username_ismi'];
    $_SESSION['password_ismi'] = $cek['password_ismi'];
    $_SESSION['nama_ismi'] = $cek['nama_ismi'];
    header('location:masyarakat/tampil_pengaduan_ismi.php');
} else {
    echo "<script>alert('Login Gagal');document.location.href='login_masyarakat_ismi.php';</script>";
}
