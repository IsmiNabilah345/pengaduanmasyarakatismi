<?php

include '../koneksi.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
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
                echo "<script>alert('Berhasil mengedit data masyarakat');document.location.href='data_masyarakat_ismi.php';</script>";
            }
        } else {
            if ($telp_ismi === $query2['telp_ismi']) {
                echo "<script>alert('Edit gagal karena Telepon tidak tepat');document.location.href='data_masyarakat_ismi.php';</script>";
            } else {
                echo "<script>alert('Edit gagal');document.location.href='data_masyarakat_ismi.php';</script>";
            }
        }
    } else {
        echo "<script>alert('Edit gagal. Masukan data dengan sesuai!');document.location.href='data_masyarakat_ismi.php';</script>";
    }
}

?>

<?php

$id = $_GET['id'];

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
        <nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" aria-current="page"><img src="../ismi_logo.jpg" class="max-h-50px logo-default" style="max-height: 40px" /></a>
                        <a class="nav-link"><b>Pengaduan Masyarakat RW.02 Cimahi Tengah</b></a>
                        <a class="nav-link" aria-current="page" href="admin_ismi.php">Data Pengaduan</a>
                        <a class="nav-link active" aria-current="page" href="data_masyarakat_ismi.php">Data Masyarakat</a>
                        <a class="nav-link" aria-current="page" href="data_petugas_ismi.php">Data Petugas</a>
                        <a class="nav-link" aria-current="page" href="data_tanggapan_ismi.php">Data Tanggapan</a>
                        <a class="nav-link" aria-current="page" href="log_ismi.php">Log Activity</a>
                        <a class="nav-link" aria-current="page" href="data_laporan_ismi.php">Laporan</a>
                        <a class="nav-link" aria-current="page" href="../registrasi_p_ismi.php">Registrasi</a>
                        <a class="nav-link" style="margin-left: 6.8rem;" href="../logout_ismi.php">Logout</a>
                    </div>
                </div>
            </div>
        </nav><br>
        <center>
            <br><br><br>
            <input type="number" name="nik_masyarakat_ismi" hidden>
            <h5>Edit Masyarakat</h5><br>
            <h5>Nama</h5>
            <input type="text" name="nama_ismi" value=<?php echo $nama_ismi; ?> class="form-control" aria-describedby="addon-wrapping" style=" width: 22rem;">
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
            <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
            <input style="width: 350px;" type="submit" name="update" value="Simpan" class="form-control" aria-describedby="addon-wrapping"><br>
        </center>
    </form>

    <script src="../assets/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>