<?php
include "ceklogin_p_ismi.php";

if (isset($_POST['LOGIN'])) {
    if (login($_POST['username'], $_POST['password'])) {
        echo "Berhasil Login";
    } else {
        echo "<script>alert('Login Gagal');document.location.href='login_masyarakat_ismi.php';</script>";
    }
}
