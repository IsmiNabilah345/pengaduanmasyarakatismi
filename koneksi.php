<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "pengaduan_ismi";
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    echo 'Gagal koneksi ke database';
}
