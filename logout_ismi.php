<?php
session_start();

$masyarakat_ismi = $_SESSION['nik_masyarakat_ismi'];
$petugas_ismi = $_SESSION['level_ismi'];

if ($masyarakat_ismi) {
    $_SESSION = [];
    session_unset();
    session_destroy();
    echo "<script>alert('Berhasil logout');document.location.href='login_masyarakat_ismi.php';</script>";
}elseif ($petugas_ismi) {
    $_SESSION = [];
    session_unset();
    session_destroy();
    echo "<script>alert('Berhasil logout');document.location.href='login_admin_ismi.php';</script>";
}
exit;
?>