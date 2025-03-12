<?php

include '../koneksi.php';
session_start();

$id = $_SESSION['nik_masyarakat_ismi'];
if (isset($_POST['update'])) {
    $id = $_SESSION['nik_masyarakat_ismi'];
    $id_role = $_POST['nik_masyarakat_ismi'];
    $nama_ismi = $_POST['nama_ismi'];
    $username_ismi = $_POST['username_ismi'];
    $password_ismi = $_POST['password_ismi'];
    $telp_ismi = $_POST['telp_ismi'];

    $result = mysqli_query($conn, "SELECT * FROM tb_masyarakat_ismi");
    $query2 = mysqli_fetch_array($result);

    if (is_numeric($telp_ismi)) {
        if ($telp_ismi != $query2['telp_ismi']) {
            $sql2 = "UPDATE tb_masyarakat_ismi SET nama_ismi= '$nama_ismi', username_ismi= '$username_ismi', password_ismi= '$password_ismi', telp_ismi= '$telp_ismi' WHERE nik_masyarakat_ismi='$id'";
            $query3 = mysqli_query($conn, $sql2);

            if ($query3) {
                echo "<script>alert('Berhasil mengedite profil');document.location.href='tampil_pengaduan_ismi.php';</script>";
            }
        } else {
            if ($telp_ismi === $query2['telp_ismi']) {
                echo "<script>alert('Edit gagal karena Telepon tidak tepat');document.location.href='tampil_pengaduan_ismi.php';</script>";
            } else {
                echo "<script>alert('Edit gagal');document.location.href='tampil_pengaduan_ismi.php';</script>";
            }
        }
    } else {
        echo "<script>alert('Edit gagal. Masukan data dengan sesuai!');document.location.href='tampil_pengaduan_ismi.php';</script>";
    }
}
?>

<?php

$result = mysqli_query($conn, "SELECT * FROM tb_masyarakat_ismi WHERE nik_masyarakat_ismi=$id");

while ($petugas_data = mysqli_fetch_array($result)) {
    $id_role = $petugas_data['nik_masyarakat_ismi'];
    $nama_ismi = $petugas_data['nama_ismi'];
    $username_ismi = $petugas_data['username_ismi'];
    $password_ismi = $petugas_data['password_ismi'];
    $telp_ismi = $petugas_data['telp_ismi'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <title>Edit Masyarakat</title>
    <style>
        body {
            background-color: #B2B2B2;
            font-family: 'Segoe UI';
        }
    </style>
</head>

<body>
    <form method="post" action="">
        <!-- <h3 style="border:1px; padding:15px; display:block; background: rgba(255, 255, 255, 0.2); text-align:center;">Pengaturan Penggguna</h3> -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" aria-current="page"><img src="../ismi_logo.jpg" class="max-h-50px logo-default" style="max-height: 40px" /></a>
                        <a class="nav-link"><b>Pengaduan Masyarakat RW.02 Cimahi Tengah</b></a>
                        <a class="nav-link" href="tampil_pengaduan_ismi.php">Pengaduan</a>
                        <a class="nav-link active" style="margin-left: 45rem;" href="profil_masyarakat_ismi.php">Profil</a>
                        <a class="nav-link " href="../logout_ismi.php">Logout</a>
                    </div>
                </div>
            </div>
        </nav><br>
        <center>
            <br><br><br>
            <h5>Profil Masyarakat</h5><br>
            <h5>NIK</h5>
            <input type="text" name="nik_masyarakat_ismi" value="<?= $id; ?>" readonly class="form-control" aria-describedby="addon-wrapping" style=" width: 22rem;">
            <br>
            <h5>Nama</h5>
            <input type=" text" name="nama_ismi" value=<?php echo $nama_ismi; ?> class="form-control" aria-describedby="addon-wrapping" style=" width: 22rem;">
            <br>
            <h5>Username</h5>
            <input type="text" name="username_ismi" value=<?php echo $username_ismi; ?> class="form-control" aria-describedby="addon-wrapping" style=" width: 22rem;">
            <br>
            <h5>Password</h5>
            <input type="password" name="password_ismi" value=<?php echo $password_ismi; ?> class="form-control" aria-describedby="addon-wrapping" style=" width: 22rem;">
            <br>
            <h5>Nomor Telepon</h5>
            <input type="text" name="telp_ismi" maxlength="13" minlength="13" value=<?php echo $telp_ismi; ?> class="form-control" aria-describedby="addon-wrapping" style="width: 22rem;"><br>
            <br>
            <!-- <input type="hidden" name="id" value=<?php echo $id ?>> -->
            <input style="width: 350px;" type="submit" name="update" value="Simpan" class="form-control" aria-describedby="addon-wrapping"><br>
        </center>
    </form>

    <script src="../assets/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>