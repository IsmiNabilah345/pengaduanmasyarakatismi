<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Petugas</title>
    <style>
        body {
            background-color: #B2B2B2;
            font-family: 'Segoe UI';
        }
    </style>
</head>

<body>
    <form method="post" action="simpan_registerP_ismi.php">
        <nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" aria-current="page"><img src="ismi_logo.jpg" class="max-h-50px logo-default" style="max-height: 40px" /></a>
                        <a class="nav-link"><b>Pengaduan Masyarakat RW.02 Cimahi Tengah</b></a>
                        <a class="nav-link" aria-current="page" href="admin/admin_ismi.php">Data Pengaduan</a>
                        <a class="nav-link" aria-current="page" href="admin/data_masyarakat_ismi.php">Data Masyarakat</a>
                        <a class="nav-link" aria-current="page" href="admin/data_petugas_ismi.php">Data Petugas</a>
                        <a class="nav-link" aria-current="page" href="admin/data_tanggapan_ismi.php">Data Tanggapan</a>
                        <a class="nav-link" aria-current="page" href="admin/log_ismi.php">Log Activity</a>
                        <a class="nav-link" aria-current="page" href="admin/data_laporan_ismi.php">Laporan</a>
                        <a class="nav-link active" aria-current="page" href="registrasi_p_ismi.php">Registrasi</a>
                        <a class="nav-link" style="margin-left: 6.8rem;" href="logout_ismi.php">Logout</a>
                    </div>
                </div>
            </div>
        </nav><br>

        <center>
            <br><br><br><br>
            <h4>Selamat datang di form registrasi</h4><br>
            <input type="number" name="id_petugas_ismi" hidden>
            <h5>Nama</h5>
            <input type="text" name="nama_petugas_ismi" class="form-control" aria-describedby="addon-wrapping" style=" width: 22rem;">
            <br>
            <h5>Username</h5>
            <input type="text" name="username_petugas_ismi" class="form-control" aria-describedby="addon-wrapping" style=" width: 22rem;">
            <br>
            <h5>Password</h5>
            <input type="password" name="password_petugas_ismi" class="form-control" aria-describedby="addon-wrapping" style=" width: 22rem;">
            <br>
            <h5>Nomor Telepon</h5>
            <input type="text" name="telp_petugas_ismi" maxlength="13" minlength="13" class="form-control" aria-describedby="addon-wrapping" style="width: 22rem;"><br>
            <h5>Level</h5>
            <select name="level_ismi" class="form-control" aria-describedby="addon-wrapping" style="width: 22rem;">
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
            </select>
            <br>
            <input style="width: 350px;" type="submit" name="daftar" value="Simpan" class="form-control" aria-describedby="addon-wrapping"><br>
        </center>
    </form>
    <script src="assets/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>