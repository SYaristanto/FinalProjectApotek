<?php

require 'config/db_apotek.php';

if(isset($_POST['tambah'])) {
    global $db_connect;

    $nama = mysqli_real_escape_string($db_connect, $_POST['Nama_Obat']);
    $jenis = mysqli_real_escape_string($db_connect, $_POST['Jenis']);
    $stok = mysqli_real_escape_string($db_connect, $_POST['Stok']);
    $expired = mysqli_real_escape_string($db_connect, $_POST['Expired']);
    $satuan = mysqli_real_escape_string($db_connect, $_POST['Satuan']);
    $harga_satuan = mysqli_real_escape_string($db_connect, $_POST['Harga_Satuan']);

    // Validasi data (sesuaikan dengan kebutuhan Anda)

    // Lakukan operasi SQL untuk menambahkan stok obat
    $query = "INSERT INTO tbl_stok_obat (nama, jenis, stok, expired, satuan, harga_satuan) VALUES ('" . $nama ."', '" . $jenis ."', '" . $stok . "', '" . $expired . "', '" . $satuan ."', '" . $harga_satuan . "')";
    $result = mysqli_query($db_connect, $query);

    if($result) {
        echo "Stok obat berhasil ditambahkan.";
        header("Location:../pages/stok_obat.php");
        exit();
    } else {
        echo "Gagal menambahkan stok obat: " . mysqli_error($db_connect);
        header("Location:");
        exit();
    }
}
