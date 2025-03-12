<?php
include '../koneksi.php';

// Konfigurasi pagination
$jumlahPerHalaman_ismi = 6;
$halaman_ismi = isset($_GET['halaman']) ? $_GET['halaman'] : 1;
$awalData_ismi = ($halaman_ismi - 1) * $jumlahPerHalaman_ismi;

// Query untuk menampilkan data
// $role =  mysqli_query($conn, "SELECT * FROM tb_tanggapan_ismi LIMIT $awalData_ismi, $jumlahPerHalaman_ismi");

// Query untuk menghitung jumlah data
$queryJumlah_ismi = "SELECT COUNT(*) AS jumlah FROM tb_tanggapan_ismi";
$dataJumlah_ismi = mysqli_query($conn, $queryJumlah_ismi);
$jumlahData_ismi = mysqli_fetch_assoc($dataJumlah_ismi)['jumlah'];

// Hitung jumlah halaman
$jumlahHalaman_ismi = ceil($jumlahData_ismi / $jumlahPerHalaman_ismi);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tanggapan</title>
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

        form {
            margin-left: 1rem;
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
                    <a class="nav-link active" aria-current="page" href="data_tanggapan_ismi.php">Data Tanggapan</a>
                    <a class="nav-link" aria-current="page" href="log_ismi.php">Log Activity</a>
                    <a class="nav-link" aria-current="page" href="data_laporan_ismi.php">Laporan</a>
                    <a class="nav-link" aria-current="page" href="../registrasi_p_ismi.php">Registrasi</a>
                    <a class="nav-link" style="margin-left: 6.8rem;" href="../logout_ismi.php">Logout</a>
                </div>
            </div>
        </div>
    </nav><br>


    <!-- <nav>
        <h3><a href="admin.php">Home</a> || <a href="member.php">Member</a> || <a href="outlet.php">Outlet</a> || <a href="paket.php">Paket Cucian</a> || <a href="transaksi.php">Transaksi</a> || <a href="../logout.php">Logout</a></h3>
    </nav> -->
    <br>
    <?php
    include '../koneksi.php';
    session_start();
    // $sql = "SELECT * FROM tb_tanggapan_ismi INNER JOIN tb_petugas_ismi on tb_tanggapan_ismi.id_petugas_ismi=tb_petugas_ismi.id_petugas_ismi INNER JOIN tb_pengaduan_ismi on tb_tanggapan_ismi.id_pengaduan_ismi = tb_pengaduan_ismi.id_pengaduan_ismi";
    // $role = mysqli_query($conn, $sql); //setting db $ 

    ?>

    <form action="" method="get">
        <label>Cari :</label>
        <input type="date" name="tgl" autocomplete="off">
        <input type="submit" name="cari" value="Cari">
        <input type="submit" name="semua" value="Semua">
    </form>

    <?php
    if (isset($_GET['cari'])) {
        date_default_timezone_set("Asia/Jakarta");
        $cari_ismi = $_GET['tgl'];
        $sql2 = "SELECT * FROM `tb_tanggapan_ismi` INNER JOIN tb_petugas_ismi on tb_tanggapan_ismi.id_petugas_ismi=tb_petugas_ismi.id_petugas_ismi INNER JOIN tb_pengaduan_ismi on tb_tanggapan_ismi.id_pengaduan_ismi = tb_pengaduan_ismi.id_pengaduan_ismi WHERE `tgl_tanggapan_ismi` = '$cari_ismi'";
        $role = mysqli_query($conn, $sql2);
        echo "<br><b>Hasil pencarian : </b>" . $cari_ismi . "<br>";
    } else {
        $sql2 = "SELECT * FROM `tb_tanggapan_ismi` INNER JOIN tb_petugas_ismi on tb_tanggapan_ismi.id_petugas_ismi=tb_petugas_ismi.id_petugas_ismi INNER JOIN tb_pengaduan_ismi on tb_tanggapan_ismi.id_pengaduan_ismi = tb_pengaduan_ismi.id_pengaduan_ismi LIMIT $awalData_ismi, $jumlahPerHalaman_ismi";
        $role = mysqli_query($conn, $sql2);
    }
    $role = mysqli_query($conn, $sql2);
    if (!$role) {
        echo "Gagal Tampil";
        die;
    }
    ?>
    <?php
    if (isset($_POST["semua"])) {
        $keywordd = $_POST["tgl"];
        $sql2 = "SELECT * FROM `tb_tanggapan_ismi` INNER JOIN tb_petugas_ismi on tb_tanggapan_ismi.id_petugas_ismi=tb_petugas_ismi.id_petugas_ismi INNER JOIN tb_pengaduan_ismi on tb_tanggapan_ismi.id_pengaduan_ismi = tb_pengaduan_ismi.id_pengaduan_ismi";
        $role = mysqli_query($conn, $sql2);
    }
    ?>
    <br><br>
    <center>
        <table class="table">
            <thead>
                <tr>
                    <th hidden>Id Tanggapan</th>
                    <th>Isi Laporan</th>
                    <th hidden>Id Pengaduan</th>
                    <th>Tanggal Tanggapan</th>
                    <th>Tanggapan</th>
                    <th>Petugas</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($role as $row) : ?>
                    <tr>
                        <td hidden><?= $row["id_tanggapan_ismi"]; ?></td>
                        <td><?= $row["isi_laporan_ismi"]; ?></td>
                        <td hidden><?= $row["id_pengaduan_ismi"]; ?></td>
                        <td><?= $row["tgl_tanggapan_ismi"]; ?></td>
                        <td><?= $row["tanggapan_ismi"]; ?></td>
                        <td><?= $row["nama_petugas_ismi"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </center>

    <script src="../assets/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>
</body>
<center>
    <!-- Pagination -->
    <?php if ($jumlahHalaman_ismi > 1) : ?>
        <div style="margin-top: 4rem;">
            <!-- <?php if ($halaman_ismi > 1) : ?>
                    <a href="?halaman=<?php echo $halaman_ismi - 1; ?>" style="color: #3C2A21; text-align:center; border-color:#3C2A21 ; font-size: 24px; margin-right: 15px;">Previous</a>
                <?php endif; ?> -->

            <?php for ($x_ismi = 1; $x_ismi <= $jumlahHalaman_ismi; $x_ismi++) : ?>
                <?php if ($x_ismi == $halaman_ismi) : ?>
                    <b style="color: #3C2A21 ; font-size: 22px;"><?php echo $x_ismi; ?></b>
                <?php else : ?>
                    <a href="?halaman=<?php echo $x_ismi; ?>" style="color: #3C2A21; text-align:center; border-color:#3C2A21 ; font-size: 22px; padding-left: 3px; padding-right: 3px"><?php echo $x_ismi; ?></a>
                <?php endif; ?>
            <?php endfor; ?>
            <!-- 
                <?php if ($halaman_ismi < $jumlahHalaman_ismi) : ?>
                    <a href="?halaman=<?php echo $halaman_ismi + 1; ?>" style="color: #3C2A21; text-align:center; border-color:#3C2A21 ; font-size: 24px; margin-left: 15px;">Next</a>
                <?php endif; ?> -->
        </div>
    <?php endif; ?>
</center>
<footer>
    <p>Copyright &copy; 2023 Ismi nabilah</p>
</footer>

</html>