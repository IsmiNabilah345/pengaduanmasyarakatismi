<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Masyarakat</title>
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


    <!-- <nav>
        <h3><a href="admin.php">Home</a> || <a href="member.php">Member</a> || <a href="outlet.php">Outlet</a> || <a href="paket.php">Paket Cucian</a> || <a href="transaksi.php">Transaksi</a> || <a href="../logout.php">Logout</a></h3>
    </nav> -->
    <br>
    <?php
    include '../koneksi.php';
    require '../functions_ismi.php';

    $sql = "SELECT * FROM tb_masyarakat_ismi";
    $role = mysqli_query($conn, $sql); //setting db $ 

    ?>
    <form action="" method="post">
        <label>Cari :</label>
        <input type="text" name="keyword" autocomplete="off">
        <input type="submit" name="cari" value="Cari">
        <input type="submit" name="semua" value="Seluruh">
    </form><br><br>

    <?php
    if (isset($_POST["cari"])) {
        $keyword = $_POST["keyword"];
        $role = cariMasyarakat($keyword);
    }
    ?>
    <?php
    if (isset($_POST["semua"])) {
        $keywordd = $_POST["keyword"];
        $role = cariSemuaMasyarakat($keywordd);
    }
    ?>
    <nav>
        <a href="tambah_masyarakat_ismi.php" style="margin-left: 1.4rem;">[+] Tambah Data Masyarakat</a>
    </nav><br>
    <center>
        <table class="table">
            <thead>
                <tr>
                    <!-- <th>Id</th>
                    <th>Tanggal Pengaduan</th> -->
                    <th>NIK</th>
                    <!-- <th>Password</th> -->
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Nomor Telepon</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($role as $row) : ?>
                    <tr>
                        <td><?= $row["nik_masyarakat_ismi"]; ?></td>
                        <td><?= $row["nama_ismi"]; ?></td>
                        <td><?= $row["username_ismi"]; ?></td>
                        <td><?= $row["telp_ismi"]; ?></td>
                        <td>
                            <a href="masyarakat_edit_ismi.php?id=<?= $row['nik_masyarakat_ismi']; ?>" class="btn btn-dark btn-sm" title="Update">Edit</a>
                            <a href="masyarakat_hapus_ismi.php?id=<?= $row['nik_masyarakat_ismi']; ?>" class="btn btn-dark btn-sm" oneclick="return confirm ('yakin?');"> Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </center>
    <script src="../assets/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>
</body>
<footer>
    <p>Copyright &copy; 2023 ismi nabilah</p>
</footer>

</html>