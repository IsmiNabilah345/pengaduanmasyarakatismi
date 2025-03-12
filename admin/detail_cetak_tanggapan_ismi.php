<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- <title>Laporan PDF Pengaduan Masyarakat Periode Tanggal</title> -->

    <link rel="stylesheet" href="../assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">

    <!-- Include File jQuery -->
    <script src="../assets/js/jquery.min.js"></script>
    <style>
        body {
            background-color: #B2B2B2;
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

        form {
            padding-left: 1rem;
        }

        h4 {
            padding-left: 1rem;
        }
    </style>

</head>

<body>
    <!-- <div style="padding: 15px;"> -->

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="../registrasi_p_ismi.php">Registrasi</a>
                    <a class="nav-link" aria-current="page" href="admin_ismi.php">Data Pengaduan</a>
                    <a class="nav-link" aria-current="page" href="data_masyarakat_ismi.php">Data Masyarakat</a>
                    <a class="nav-link" aria-current="page" href="data_petugas_ismi.php">Data Petugas</a>
                    <a class="nav-link" aria-current="page" href="data_tanggapan_ismi.php">Data Tanggapan</a>
                    <a class="nav-link active" aria-current="page" href="data_laporan_ismi.php">Laporan</a>
                    <a class="nav-link" aria-current="page" href="log_ismi.php">Log Activity</a>
                    <a class="nav-link" href="../logout_ismi.php">Logout</a>
                </div>
            </div>
        </div>
    </nav><br>

    <form method="get" action="">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="form-group">
                    <label>Filter Tanggal</label>
                    <div class="input-group">
                        <input type="date" name="tgl_awal" value="<?= @$_GET['tgl_awal'] ?>" class="form-control tgl_awal" placeholder="Tanggal Awal">
                        <span class="input-group-addon">s/d</span>
                        <input type="date" name="tgl_akhir" value="<?= @$_GET['tgl_akhir'] ?>" class="form-control tgl_akhir" placeholder="Tanggal Akhir">
                    </div>
                </div>
            </div>
        </div><br>

        <button type="submit" name="filter" value="true" class="btn btn-primary">TAMPILKAN</button>

        <?php
        if (isset($_GET['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
            echo '<a href="detail_cetak_tanggapan_ismi.php" class="btn btn-default">RESET</a>';
        ?>
    </form>

    <?php
    // Load file koneksi.php
    include "../koneksi.php";

    $tgl_awal_ismi = @$_GET['tgl_awal']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
    $tgl_akhir_ismi = @$_GET['tgl_akhir']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)

    if (empty($tgl_awal_ismi) or empty($tgl_akhir_ismi)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
        // Buat query untuk menampilkan semua data transaksi
        $query = "SELECT * FROM tb_tanggapan_ismi INNER JOIN tb_petugas_ismi on tb_tanggapan_ismi.id_petugas_ismi=tb_petugas_ismi.id_petugas_ismi";
        $url_cetak = "cetak_tanggapan_ismi.php";
        $label = "Semua Data Tanggapan";
    } else { // Jika terisi
        // Buat query untuk menampilkan data transaksi sesuai periode tanggal
        $query = "SELECT * FROM tb_tanggapan_ismi INNER JOIN tb_petugas_ismi on tb_tanggapan_ismi.id_petugas_ismi=tb_petugas_ismi.id_petugas_ismi WHERE (tgl_tanggapan_ismi BETWEEN '" . $tgl_awal_ismi . "' AND '" . $tgl_akhir_ismi . "')";
        $url_cetak = "cetak_tanggapan_ismi.php?tgl_awal=" . $tgl_awal_ismi . "&tgl_akhir=" . $tgl_akhir_ismi . "&filter=true";
        $tgl_awal_ismi = date('d-m-Y', strtotime($tgl_awal_ismi)); // Ubah format tanggal jadi dd-mm-yyyy
        $tgl_akhir_ismi = date('d-m-Y', strtotime($tgl_akhir_ismi)); // Ubah format tanggal jadi dd-mm-yyyy
        $label = 'Periode Tanggal ' . $tgl_awal_ismi . ' s/d ' . $tgl_akhir_ismi;
    }
    ?>
    <br>
    <!-- <h4 style="margin-bottom: 5px;"><b>Data Pengaduan</b></h4> -->
    <h4><?php echo $label ?><br /></h4 h4{ }>

    <div style="margin-top: 5px; padding-left: 1rem;;">
        <a href="<?php echo $url_cetak ?>" target="_blank" rel="noopener noreferrer">CETAK PDF</a>
    </div>

    <!-- <div class="table-responsive" style="margin-top: 10px;"> -->
    <table class="table">
        <thead>
            <tr>
                <th>Id Pengaduan</th>
                <th>Tanggal Tanggapan</th>
                <th>Tanggapan</th>
                <th>Petugas</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $sql = mysqli_query($conn, $query); // Eksekusi/Jalankan query dari variabel $query
            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

            if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                    $tgl = date('d-m-Y', strtotime($data['tgl_tanggapan_ismi'])); // Ubah format tanggal jadi dd-mm-yyyy

                    echo "<tr>";
                    echo "<td>" . $data['id_pengaduan_ismi'] . "</td>";
                    echo "<td>" . $tgl . "</td>";
                    echo "<td>" . $data['tanggapan_ismi'] . "</td>";
                    echo "<td>" . $data['nama_petugas_ismi'] . "</td>";
                    echo "</tr>";
                }
            } else { // Jika data tidak ada
                echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <!-- </div> -->
    <!-- </div> -->

    <!-- Include File JS Custom (untuk fungsi Datepicker) -->
    <script src="../assets/js/custom.js"></script>

    <script>
        $(document).ready(function() {
            setDateRangePicker(".tgl_awal", ".tgl_akhir")
        })
    </script>
    <script src="../assets/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>

</body>
<footer>
    <p>Copyright &copy; 2023 ismi nabilah</p>
</footer>

</html>