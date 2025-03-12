<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan</title>
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

        h5 {
            margin-left: 1.4rem;
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
                    <a class="nav-link" style="margin-left: 52rem;" href="profil_masyarakat_ismi.php">Profil</a>
                    <a class="nav-link active" href="../logout_ismi.php">Logout</a>
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
    // $id = $_GET['id'];
    $nik = @$_SESSION['nik_masyarakat_ismi'];
    $sql = "SELECT * FROM tb_pengaduan_ismi WHERE nik_ismii=$nik";
    $role = mysqli_query($conn, $sql); //setting db $ 
    ?>
    <!-- <h5>Halo <?= $_SESSION['nama_ismi']; ?></h5> -->

    <nav>
        <a href="masyarakat_ismi.php" style="margin-left: 1.4rem;">[+] Tambah Pengaduan</a>
    </nav>
    <br><br>
    <center>
        <!-- <div class="container" width="100%"> -->
        <table class="table">
            <thead>
                <tr>
                    <!-- <th>Id</th> -->
                    <th>Tanggal Pengaduan</th>
                    <th hidden>NIK</th>
                    <th>Isi Laporan</th>
                    <!-- <th>Tanggapan</th> -->
                    <th hidden>Foto</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($role)){ ?>
                    <tr>
                        <td><?= $row["tgl_pengaduan_ismi"]; ?></td>
                        <td hidden><?= $row["nik_ismii"]; ?></td>
                        <td><?= $row["isi_laporan_ismi"]; ?></td>
                        <!-- <td><?= $row["tanggapan_ismi"]; ?></td> -->
                        <td hidden><?= "<img src='../assets/image_pengaduan/$row[foto_ismi]' width='85' height='90' />" ?></td>
                        <?php
                        if ($row["status_ismi"] === '0') { ?>
                            <td>belum di Tanggapi</td>
                        <?php
                        } else { ?>
                            <td><?= $row["status_ismi"]; ?></td>
                        <?php
                        }
                        ?>
                        <td>
                            <a href="detail_m_ismi.php?id=<?= $row['id_pengaduan_ismi']; ?>" class="btn btn-dark btn-sm">Detail</a>
                        </td>
                        <!-- <td>
                            <a href="user_edit.php?id=<?= $row['id_user']; ?>" class="btn btn-dark btn-sm" title="Update">Edit</a>
                            <a href="user_hapus.php?id=<?= $row['id_user']; ?>" class="btn btn-dark btn-sm" oneclick="return confirm ('yakin?');"> Hapus</a>
                        </td> -->
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- </div> -->
    </center>
    <script src="../assets/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>
</body>
<footer>
    <p>Copyright &copy; 2023 ismi nabilah</p>
</footer>

</html>