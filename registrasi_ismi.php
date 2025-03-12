<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Masyarakat</title>
    <style>
        body {
            background-color: #B2B2B2;
            font-family: 'Segoe UI';
        }
    </style>
</head>

<body>
    <form method="post" action="simpan_registrasi_ismi.php">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="login_masyarakat_ismi.php">Back</a>
                        <!-- <a class="nav-link disabled">Disabled</a> -->
                    </div>
                </div>
            </div>
        </nav><br>

        <center>
            <h4>Selamat datang di form registrasi</h4>
            <br><br>
            <h5>NIK</h5>
            <input type="text" maxlength="16" minlength="16" name="nik_masyarakat_ismi" class="form-control" aria-describedby="addon-wrapping" style=" width: 22rem;" required>
            <br>
            <h5>Nama</h5>
            <input type="text" name="nama_ismi" class="form-control" aria-describedby="addon-wrapping" style=" width: 22rem;">
            <br>
            <h5>Username</h5>
            <input type="text" name="username_ismi" class="form-control" aria-describedby="addon-wrapping" style=" width: 22rem;">
            <br>
            <h5>Password</h5>
            <input type="password" name="password_ismi" class="form-control" aria-describedby="addon-wrapping" style=" width: 22rem;">
            <br>
            <h5>Nomor Telepon</h5>
            <input type="text" name="telp_ismi" maxlength="13" minlength="13" class="form-control" aria-describedby="addon-wrapping" style="width: 22rem;"><br>
            <input style="width: 350px;" type="submit" name="daftar" value="Simpan" class="form-control" aria-describedby="addon-wrapping"><br>
        </center>
    </form>
    <script src="assets/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>