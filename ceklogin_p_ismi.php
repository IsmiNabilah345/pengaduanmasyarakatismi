<?php

include "koneksi.php";

function login($username, $password)
{
    session_start();
    global $conn;
    $user = $username;
    $pas = MD5($password);
    $petugas = mysqli_query($conn, "SELECT * FROM tb_petugas_ismi WHERE username_petugas_ismi='$user' AND password_petugas_ismi='$pas'");

    if (mysqli_num_rows($petugas) == 1) {
        $row = mysqli_fetch_array($petugas);
        if ($row['level_ismi'] == 'admin') {
            $_SESSION['id_petugas_ismi'] = $row['id_petugas_ismi'];
            $_SESSION['username'] == $row['username_petugas_ismi'];
            $_SESSION['nama_petugas'] = $row['nama_petugas_ismi'];
            $_SESSION['level_ismi'] = 'admin';
            $_SESSION['ceklogin'] = 'LOGIN';
            header("location:admin/admin_ismi.php");
        } elseif ($row['level_ismi'] == 'petugas') {
            $_SESSION['id_petugas_ismi'] = $row['id_petugas_ismi'];
            $_SESSION['username'] = $row['username_petugas_ismi'];
            $_SESSION['nama_petugas'] = $row['nama_petugas_ismi'];
            $_SESSION['level_ismi'] = 'petugas';
            $_SESSION['ceklogin'] = 'LOGIN';
            header("location:petugas/petugas_ismi.php");
        } else {
            echo "<script>alert('Login Gagal');document.location.href='login_masyarakat_ismi.php';</script>";
        }
    }
}
function cari($keyword)
{
    $query = "SELECT * FROM tb_pengaduan_ismi WHERE status_ismi='$keyword'";
    return $query;
}
