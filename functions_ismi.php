<?php

include "../koneksi.php";

function cariMasyarakat($keyword)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_masyarakat_ismi WHERE nama_ismi='$keyword'");
    $rows = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $rows[] = $row;
    }
    return $rows;
}

function cariSemuaMasyarakat()
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_masyarakat_ismi");
    $rows = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $rows[] = $row;
    }
    return $rows;
}

function cariPetugas($keyword2)
{
    global $conn;
    $query2 = mysqli_query($conn, "SELECT * FROM tb_petugas_ismi WHERE nama_petugas_ismi='$keyword2'");
    $rows = [];
    while ($row = mysqli_fetch_array($query2)) {
        $rows[] = $row;
    }
    return $rows;
}

function cariSemuaPetugas()
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_petugas_ismi");
    $rows = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $rows[] = $row;
    }
    return $rows;
}
