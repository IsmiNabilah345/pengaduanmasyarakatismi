<?php

use Spipu\Html2Pdf\Html2Pdf;

include "../koneksi.php";

$sql = "SELECT * FROM tb_petugas_ismi";
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
            width: 29%;
            padding: 5px;
        }
    </style>
</head>

<body>
    <!-- <img src="ismi_logo.jpg" alt=""> -->
    <h2>Pemerintahan Kota Cimahi</h2>
    <h3>Data Admin dan Petugas</h3>
    <h5>Kecamatan Cimahi Tengah<br>Jl. Terusan No.44 Cimahi Kec. Cimahi Tengah Kota Cimahi - 40525</h5>
    <hr><br>
    <table class="table" border="1" cellpadding="1" style="margin-top: 10px;">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Username</th>
                <th>Nomor Telepon</th>
                <th>Level</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($role as $row) : ?>
                <tr>
                    <td><?= $row["nama_petugas_ismi"]; ?></td>
                    <td><?= $row["username_petugas_ismi"]; ?></td>
                    <td><?= $row["telp_petugas_ismi"]; ?></td>
                    <td><?= $row["level_ismi"]; ?></td>
                    <!-- <td>
                            <a href="user_edit.php?id=<?= $row['id_user']; ?>" class="btn btn-dark btn-sm" title="Update">Edit</a>
                            <a href="user_hapus.php?id=<?= $row['id_user']; ?>" class="btn btn-dark btn-sm" oneclick="return confirm ('yakin?');"> Hapus</a>
                        </td> -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();
require '../assets/html2pdf/autoload.php';
$pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
$pdf->WriteHTML($html);
$pdf->Output('Data Petugas.pdf', 'I');
?>