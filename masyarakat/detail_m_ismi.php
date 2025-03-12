<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
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

        table {
            margin-top: 5rem;
        }
    </style>
</head>

<body>
    <!-- <h3 style="border:1px; padding:15px; display:block; background: rgba(255, 255, 255, 0.2); text-align:center;">Pengaturan Penggguna</h3> -->

</html>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" aria-current="page"><img src="../ismi_logo.jpg" class="max-h-50px logo-default" style="max-height: 40px" /></a>
                <a class="nav-link"><b>Pengaduan Masyarakat RW.02 Cimahi Tengah</b></a>
                <a class="nav-link active" href="tampil_pengaduan_ismi.php">Pengaduan</a>
                <a class="nav-link" style="margin-left: 45rem;" href="profil_masyarakat_ismi.php">Profil</a>
                <a class="nav-link" href="../logout_ismi.php">Logout</a>
            </div>
        </div>
    </div>
</nav><br>
<?php
include '../koneksi.php';

session_start();
$id = $_GET['id'];
$sql = "SELECT * FROM tb_tanggapan_ismi INNER JOIN tb_petugas_ismi on tb_tanggapan_ismi.id_petugas_ismi=tb_petugas_ismi.id_petugas_ismi INNER JOIN tb_pengaduan_ismi on tb_tanggapan_ismi.id_pengaduan_ismi = tb_pengaduan_ismi.id_pengaduan_ismi WHERE tb_pengaduan_ismi.id_pengaduan_ismi = '$id'";
$role = mysqli_query($conn, $sql); //setting db $ 
$y = mysqli_fetch_array($role);

?>

<center>
    <table class="table">
        <thead>
            <tr>
                <th hidden>Id Tanggapan</th>
                <th>Tanggal Tanggapan</th>
                <th>Isi Laporan</th>
                <th>Foto</th>
                <th hidden>Id Pengaduan</th>
                <th>Tanggapan</th>
                <th>Petugas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($role as $row) : ?>
                <tr>
                    <td hidden><?= $row["id_tanggapan_ismi"]; ?></td>
                    <td><?= $row["tgl_tanggapan_ismi"]; ?></td>
                    <td><?= $row["isi_laporan_ismi"]; ?></td>
                    <td><?= "<img src='../assets/image_pengaduan/$row[foto_ismi]' width='85' height='90' />" ?></td>
                    <td hidden><?= $row["id_pengaduan_ismi"]; ?></td>
                    <td><?= $row["tanggapan_ismi"]; ?></td>
                    <td><?= $row["nama_petugas_ismi"]; ?></td>
                    <!-- <td>
                            <a href="user_edit.php?id=<?= $row['id_user']; ?>" class="btn btn-dark btn-sm" title="Update">Edit</a>
                            <a href="user_hapus.php?id=<?= $row['id_user']; ?>" class="btn btn-dark btn-sm" oneclick="return confirm ('yakin?');"> Hapus</a>
                        </td> -->
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
<!-- <table>
        <thead>
            <tr>
                <th>Isi Laporan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($role as $row) : ?>
                <tr>
                <?php
                include '../koneksi.php';
                $query = "SELECT * FROM tb_pengaduan_ismi WHERE id_pengaduan_ismi=$id";
                $exec = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($exec)) {
                    echo "<option value='" . $row['id_pengaduan_ismi'] . "'>" . $row['isi_laporan_ismi'] . "</option>";
                }
                ?>
                </tr>
                <tr>
                    <td><?= $row["tanggapan_ismi"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
</table> -->