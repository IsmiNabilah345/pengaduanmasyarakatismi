<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Laporan</title>
    <style>
        body {
            background-color: #B2B2B2;
            color: #3C2A21;
        }

        nav a {
            text-decoration: none;
            color: #3C2A21;
        }

        table {
            text-align: center;
        }

        footer {
            background: #B2B2B2;
            display: flex;
            padding: 10px;
            justify-content: center;
            align-items: center;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
        }

        p {
            color: white;
        }
    </style>
</head>

<body>
    <!-- <h3 style="border:1px; padding:15px; display:block; background: rgba(255, 255, 255, 0.2); text-align:center;">Pengaturan Penggguna</h3> -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page"><img src="../ismi_logo.jpg" class="max-h-50px logo-default" style="max-height: 40px" /></a>
                    <a class="nav-link"><b>Pengaduan Masyarakat RW.02 Cimahi Tengah</b></a>
                    <a class="nav-link" aria-current="page" href="admin_ismi.php">Data Pengaduan</a>
                    <a class="nav-link" aria-current="page" href="data_masyarakat_ismi.php">Data Masyarakat</a>
                    <a class="nav-link" aria-current="page" href="data_petugas_ismi.php">Data Petugas</a>
                    <a class="nav-link" aria-current="page" href="data_tanggapan_ismi.php">Data Tanggapan</a>
                    <a class="nav-link" aria-current="page" href="log_ismi.php">Log Activity</a>
                    <a class="nav-link active" aria-current="page" href="data_laporan_ismi.php">Laporan</a>
                    <a class="nav-link" aria-current="page" href="../registrasi_p_ismi.php">Registrasi</a>
                    <a class="nav-link" style="margin-left: 6.8rem;" href="../logout_ismi.php">Logout</a>
                </div>
            </div>
        </div>
    </nav><br>


    <br>
    <?php
    include '../koneksi.php';

    $sql = "SELECT * FROM tb_masyarakat_ismi";
    $role = mysqli_query($conn, $sql); //setting db $ 

    ?>
    <br><br>
    <center>
        <table class="table">
            <tr>
                <th>Table</th>
                <th>Cetak</th>
            </tr>
            <tr>
                <td>Data Pengaduan</td>
                <td><a href="detail_cetak_pengaduan_ismi.php">Detail</a></td>
            </tr>
            <tr>
                <td>Data Masyarakat</td>
                <td><a href="cetak_masyarakat_ismi.php" target="_blank" rel="noopener noreferrer">Cetak</a></td>
            </tr>
            <!-- <tr>
                <td>Data Tanggapan</td>
                <td><a href="detail_cetak_tanggapan_ismi.php">Detail</a></td>
            </tr> -->
            <tr>
                <td>Data Petugas</td>
                <td><a href="cetak_petugas_ismi.php" target="_blank" rel="noopener noreferrer">Cetak</a></td>
            </tr>
        </table>
    </center>
    <script src="../assets/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>
</body>
<footer>
    <p>Copyright &copy; 2023 ismi nabilah</p>
</footer>

</html>