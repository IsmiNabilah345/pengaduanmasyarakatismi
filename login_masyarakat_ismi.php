<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM LOGIN</title>
    <style>
        body {
            background-color: #B2B2B2;
            font-family: 'Segoe UI';
        }

        #card {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
            backdrop-filter: blur(14px);
            box-shadow: #fffaed;
            height: 500px;
            width: 550px;

        }

        button {
            width: 200px;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 2px;
            margin-top: 5px;
        }

        button:hover {
            background-color: #fffaed;
            color: black;
        }

        form input {
            Border: none;
            Background: none;
            border-bottom: 2px solid;
            border-radius: 1px;
        }

        a.href {
            color: black;
        }

        /* h1 {
            margin-left: 17.5rem;
            margin-top: 2.6rem;
        } */
    </style>
</head>

<body>

    <br>
    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "Login gagal! username dan password salah";
        } elseif ($_GET['pesan'] == "logout") {
            echo "Anda telah berhasil logout";
        } else {
            echo "Anda harus login untuk mengakses halaman admin";
        }
    }
    ?>
    <div>
        <form method="post" action="ceklogin_m_ismi.php"><br>

            <div class="container px-4 text-center" style="display: flex;">
                <div class="row gx-5">

                    <div class="col-lg-6" style="margin-left: -38rem; margin-top:7rem;">
                        <!-- <div id="card"> -->
                        <center>
                            <h1>Username</h1>
                            <input type="text" name="username"><br>
                            <h1>Password</h1>
                            <input type="password" name="password"><br><br><br>
                            <button type="submit" style="font-family: cursive; border-radius:3px;">LOGIN</button><br><br>
                            <a href="registrasi_ismi.php" class="href">Belum punya akun? Registrasi disini</a>
                            <br>
                        </center>
                        <!-- </div> -->
                    </div>

                    <div class="col-lg-6">
                        <!-- <h1 style="border:1px; text-align:center; margin-left:50rem; margin-top:-14rem;"></h1> -->
                        <h1 style="border:1px; text-align:center; margin-left:50rem; margin-top:-14rem;">Halo Selamat Datang di<br>Pengaduan Masyarakat RW.02 <br> Kecamatan Cimahi Tengah</h1><br><br>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>