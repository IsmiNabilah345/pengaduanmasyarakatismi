<?php
function judul()
{
    return "Silahkan Mengisi laporan Pengaduan";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Masyarakat</title>
    <style>
        body {
            background-color: #B2B2B2;
            font-family: 'Segoe UI';
        }

        h2 {
            margin-top: 3rem;
        }

        footer {
            background: #B2B2B2;
            display: flex;
            padding: 10px;
            justify-content: center;
            align-items: center;
            /* position: fixed; */
            bottom: 0;
            left: 0;
            right: 0;
        }
    </style>
</head>

<body>
    <form action="simpan_masyarakat_ismi.php" method="post" enctype="multipart/form-data">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" aria-current="page"><img src="../ismi_logo.jpg" class="max-h-50px logo-default" style="max-height: 40px" /></a>
                        <a class="nav-link"><b>Pengaduan Masyarakat RW.02 Cimahi Tengah</b></a>
                        <a class="nav-link active" href="tampil_pengaduan_ismi.php">Pengaduan</a>
                        <a class="nav-link" style="margin-left: 45rem;" href="profil_masyarakat_ismi.php">Profil</a>
                        <a class="nav-link " href="../logout_ismi.php">Logout</a>
                    </div>
                </div>
            </div>
        </nav><br>

        <center>
            <!-- <h3>Selamat datang</h3> -->
            <h4><?= judul(); ?></h4>
            <br><br>
            <h5>Tanggal Pengaduan</h5>
            <input type="text" name="tgl_pengaduan_ismi" class="form-control" aria-describedby="addon-wrapping" style=" width: 22rem; text-align:center;" disabled value="<?php date_default_timezone_set("Asia/Jakarta");
                                                                                                                                                                            echo date("Y-m-d"); ?>" /><br>
            <h5>Isi Laporan Pengaduan</h5>
            <textarea name="isi_laporan_ismi" class="form-control" aria-describedby="addon-wrapping" style=" width: 22rem; height:20rem;"></textarea><br>
            <h5>Foto</h5>
            <input type="file" name="foto_ismi" accept="image/png, image/jpeg, image/jpg, image/gif" class="form-control" aria-describedby="addon-wrapping" style="width: 22rem;" required><br>
            <!-- <input type="submit" name="upload" value="Upload"> -->
            <input style="width: 350px;" type="submit" name="daftar" value="Simpan" class="form-control" aria-describedby="addon-wrapping"><br>
        </center>
    </form>
    <script src="../assets/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>
</body>
<footer>
    <p style="color: #3C2A21;">Copyright &copy; 2023 ismi nabilah</p>
</footer>

</html>