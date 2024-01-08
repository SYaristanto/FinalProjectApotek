<?php

require 'config/db_apotek.php';

if (isset($_POST['tambah'])) {
    global $db_connect;

    $nama_supplier = mysqli_real_escape_string($db_connect, $_POST['Nama_Supplier']);
    $email = mysqli_real_escape_string($db_connect, $_POST['Email']);
    $alamat = mysqli_real_escape_string($db_connect, $_POST['Alamat']);
    $no_telp = mysqli_real_escape_string($db_connect, $_POST['No_Telp']);
    // Validasi data (sesuaikan dengan kebutuhan Anda)

    // Lakukan operasi SQL untuk menambahkan data supplier
    $query = "INSERT INTO tbl_supplier (nama_supplier, email, alamat, no_telp) VALUES ('$nama_supplier', '$email', '$alamat', '$no_telp')";
    $result = mysqli_query($db_connect, $query);

    if ($result) {
        echo "Data supplier berhasil ditambahkan.";
        header("Location:../pages/supplier.php");
        exit();
    } else {
        echo "Gagal menambahkan data supplier: " . mysqli_error($db_connect);
        header("Location:");
        exit();
    }
}

if (isset($_POST['batal'])) {
    header("Location:../pages/supplier.php");
    exit();
}
