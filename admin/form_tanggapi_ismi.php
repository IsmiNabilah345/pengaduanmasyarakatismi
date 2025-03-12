<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tanggapi</title>
    <style>
        body {
            background-color: #B2B2B2;
            font-family: 'Segoe UI';
        }
    </style>
</head>

<body>
    <?php
    include "../koneksi.php";

    $id = $_GET['id'];
    $query_mysql = mysqli_query($conn, "SELECT * FROM tb_pengaduan_ismi WHERE id_pengaduan_ismi = '$id'");

    while ($data = mysqli_fetch_array($query_mysql)) {
    ?>
        <form method="post" action="simpan_tanggapan_ismi.php">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link" href="admin_ismi.php">Back</a>
                            <!-- <a class="nav-link disabled">Disabled</a> -->
                        </div>
                    </div>
                </div>
            </nav><br>

            <center>
                <h4>Form Penaggapan</h4>
                <br><br>
                <input type="number" nmae="id_tanggapan_ismi" hidden>
                <input type="number" name="id_pengaduan_ismi" value="<?php echo $data['id_pengaduan_ismi']; ?>" hidden>
                <h5>Tanggal Penanggapan</h5>
                <input type="date" name="tgl_tanggapan_ismi" class="form-control" aria-describedby="addon-wrapping" style=" width: 22rem; text-align: center;" disabled value="<?php date_default_timezone_set("Asia/Jakarta");
                                                                                                                                                                                echo date("Y-m-d"); ?>" /><br>
                <br>
                <h5>Tanggapan</h5>
                <textarea type="text" name="tanggapan_ismi" class="form-control" aria-describedby="addon-wrapping" style=" width: 22rem; height: 10rem;"></textarea>
                <input type="number" name="id_petugas_ismi" hidden>
                <br>
                <input style="width: 350px;" type="submit" name="daftar" value="Simpan" class="form-control" aria-describedby="addon-wrapping"><br>
            </center>
        </form>
    <?php } ?>
    <script src="../assets/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>