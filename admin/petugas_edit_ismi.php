<?php

include '../koneksi.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $id_role = $_POST['id_petugas_ismi'];
    $nama_ismi = $_POST['nama_petugas_ismi'];
    $username_ismi = $_POST['username_petugas_ismi'];
    $password_ismi = $_POST['password_petugas_ismi'];
    $telp_ismi = $_POST['telp_petugas_ismi'];
    $level_ismi = $_POST['level_ismi'];

    $result = mysqli_query($conn, "SELECT * FROM tb_petugas_ismi");
    $query2 = mysqli_fetch_array($result);

    if (is_numeric($telp_ismi)) {
        if ($telp_ismi != $query2['telp_ismi']) {
            $sql2 = "UPDATE tb_petugas_ismi SET nama_petugas_ismi= '$nama_ismi', username_petugas_ismi= '$username_ismi', password_petugas_ismi= '$password_ismi', telp_petugas_ismi= '$telp_ismi', level_ismi= '$level_ismi' WHERE id_petugas_ismi='$id'";
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

$result = mysqli_query($conn, "SELECT * FROM tb_petugas_ismi WHERE id_petugas_ismi=$id");

while ($petugas_data = mysqli_fetch_array($result)) {
    $id_role = $petugas_data['id_petugas_ismi'];
    $nama_ismi = $petugas_data['nama_petugas_ismi'];
    $username_ismi = $petugas_data['username_petugas_ismi'];
    $password_ismi = $petugas_data['password_petugas_ismi'];
    $telp_ismi = $petugas_data['telp_petugas_ismi'];
    $level_ismi = $petugas_data['level_ismi'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <title>Edit Petugas dan Admin</title>
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
                        <a class="nav-link" aria-current="page" href="data_masyarakat_ismi.php">Data Masyarakat</a>
                        <a class="nav-link active" aria-current="page" href="data_petugas_ismi.php">Data Petugas</a>
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
            <h4>Edit Petugas dan Admin</h4>
            <br><br>
            <input type="number" name="id_petugas_ismi" hidden>
            <h5>Nama</h5>
            <input type="text" name="nama_petugas_ismi" value=<?php echo $nama_ismi; ?> class="form-control" aria-describedby="addon-wrapping" style=" width: 22rem;">
            <br>
            <h5>Username</h5>
            <input type="text" name="username_petugas_ismi" value=<?php echo $username_ismi; ?> class="form-control" aria-describedby="addon-wrapping" style=" width: 22rem;">
            <br>
            <h5>Password</h5>
            <input type="password" name="password_petugas_ismi" value=<?php echo $password_ismi; ?> class="form-control" aria-describedby="addon-wrapping" style=" width: 22rem;">
            <br>
            <h5>Nomor Telepon</h5>
            <input type="text" maxlength="13" minlength="13" name="telp_petugas_ismi" value=<?php echo $telp_ismi; ?> class="form-control" aria-describedby="addon-wrapping" style="width: 22rem;"><br>
            <h5>Level</h5>
            <select name="level_ismi" class="form-control" value=<?php echo $level_ismi; ?> aria-describedby="addon-wrapping" style="width: 22rem;">
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
            </select>
            <br>
            <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
            <input style="width: 350px;" type="submit" name="update" value="Simpan" class="form-control" aria-describedby="addon-wrapping"><br>
        </center>
    </form>

    <script src="../assets/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>