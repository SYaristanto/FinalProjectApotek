<?php

require 'config/db_apotek.php';

if (isset($_POST['simpan'])) {
    global $db_connect;

    $nama_supplier = mysqli_real_escape_string($db_connect, $_POST['nama_supplier']);
    $email = mysqli_real_escape_string($db_connect, $_POST['email']);
    $alamat = mysqli_real_escape_string($db_connect, $_POST['alamat']);
    $no_telp = mysqli_real_escape_string($db_connect, $_POST['no_telepon']);

    // Validasi data (sesuaikan dengan kebutuhan Anda)

    // Lakukan operasi SQL untuk mengedit data supplier
    $query = "UPDATE tbl_supplier SET nama_supplier = ?, email = ?, alamat = ?, no_telp = ? WHERE nama_supplier = ?";

    $stmt = mysqli_prepare($db_connect, $query);

    // Bind parameter ke query
    mysqli_stmt_bind_param($stmt, "sssss", $nama_supplier, $email, $alamat, $no_telp, $nama_supplier);

    // Eksekusi statement
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "Data supplier berhasil diupdate.";
        header("Location:../pages/supplier.php");
        exit();
    } else {
        echo "Gagal mengupdate data supplier: " . mysqli_error($db_connect);
        header("Location:../pages/supplier.php");
        exit();
    }
}

if (isset($_POST['batal'])) {
    header("Location:../pages/supplier.php");
    exit();
}
?>

