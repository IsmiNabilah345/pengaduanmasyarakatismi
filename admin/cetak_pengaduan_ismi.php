<?php ob_start(); ?>
<html>

<head>
    <title>Cetak PDF</title>
    <style>
        h2 {
            text-align: center;
            line-height: 1rem;
        }

        h3 {
            text-align: center;
            line-height: 1rem;
        }

        h5 {
            text-align: center;
        }

        .table {
            border-collapse: collapse;
            table-layout: fixed;
            width: 630px;
        }

        .table th {
            padding: 5px;
            text-align: center;
        }

        .table td {
            word-wrap: break-word;
            width: 25%;
            padding: 5px;
        }
    </style>
</head>

<body>
    <?php
    // Load file koneksi.php
    include "../koneksi.php";

    $tgl_awal_ismi = @$_GET['tgl_awal']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
    $tgl_akhir_ismi = @$_GET['tgl_akhir']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)

    if (empty($tgl_awal_ismi) or empty($tgl_akhir_ismi)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
        // Buat query untuk menampilkan semua data transaksi
        $query = "SELECT * FROM tb_pengaduan_ismi WHERE status_ismi='selesai'";
        $label = "Data Pengaduan";
    } else { // Jika terisi
        // Buat query untuk menampilkan data transaksi sesuai periode tanggal
        $query = "SELECT * FROM tb_pengaduan_ismi WHERE (tgl_pengaduan_ismi BETWEEN '" . $tgl_awal_ismi . "' AND '" . $tgl_akhir_ismi . "') AND status_ismi='selesai'";

        $tgl_awal_ismi = date('d-m-Y', strtotime($tgl_awal_ismi)); // Ubah format tanggal jadi dd-mm-yyyy
        $tgl_akhir_ismi = date('d-m-Y', strtotime($tgl_akhir_ismi)); // Ubah format tanggal jadi dd-mm-yyyy
        $label = 'Periode Tanggal ' . $tgl_awal_ismi . ' s/d ' . $tgl_akhir_ismi;
    }
    ?>
    <h2>Pemerintahan Kota Cimahi</h2>
    <h3>Data Masyarakat</h3>
    <h5>Kecamatan Cimahi Tengah<br>Jl. Terusan No.44 Cimahi Kec. Cimahi Tengah Kota Cimahi - 40525</h5>
    <!-- <h5><?php echo $label ?></h5> -->
    <hr>
    <br>
    <table class="table" border="1" width="100%" style="margin-top: 10px;">
        <tr>
            <th>Tanggal Pengaduan</th>
            <th>NIK</th>
            <th>Isi Laporan</th>
            <!-- <th>Foto</th> -->
            <th>Status</th>
        </tr>

        <?php
        $sql = mysqli_query($conn, $query); // Eksekusi/Jalankan query dari variabel $query
        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

        if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                $tgl = date('d-m-Y', strtotime($data['tgl_pengaduan_ismi'])); // Ubah format tanggal jadi dd-mm-yyyy

                echo "<tr>";
                echo "<td>" . $tgl . "</td>";
                echo "<td>" . $data['nik_ismii'] . "</td>";
                echo "<td>" . $data['isi_laporan_ismi'] . "</td>";
                // echo "<td>" . $data['foto_ismi'] . "</td>";
                echo "<td>" . $data['status_ismi'] . "</td>";
                echo "</tr>";
            }
        } else { // Jika data tidak ada
            echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
        }
        ?>
    </table>
</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();
require '../assets/html2pdf/autoload.php';
$pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
$pdf->WriteHTML($html);
$pdf->Output('Data Pengaduan Masyarakat.pdf', 'I');
?>