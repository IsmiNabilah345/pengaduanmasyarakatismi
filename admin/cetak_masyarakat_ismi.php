<?php

use Spipu\Html2Pdf\Html2Pdf;

include "../koneksi.php";

$sql = "SELECT * FROM tb_masyarakat_ismi";
$role = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
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
            width: 650px;
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
    <h2>Pemerintahan Kota Cimahi</h2>
    <h3>Data Masyarakat</h3>
    <h5>Kecamatan Cimahi Tengah<br>Jl. Terusan No.44 Cimahi Kec. Cimahi Tengah Kota Cimahi - 40525</h5>
    <hr><br>
    <div>
        <table class="table" border="1" width="100%" style="margin-top: 10px;">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Nomor Telepon</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($role as $row) : ?>
                    <tr>
                        <td><?= $row["nik_masyarakat_ismi"]; ?></td>
                        <td><?= $row["nama_ismi"]; ?></td>
                        <td><?= $row["username_ismi"]; ?></td>
                        <td><?= $row["telp_ismi"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();
require '../assets/html2pdf/autoload.php';
$pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
$pdf->WriteHTML($html);
$pdf->Output('Data Masyarakat.pdf', 'I');
?>