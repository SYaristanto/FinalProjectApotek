<?php

require 'config/db_apotek.php';

if (isset($_POST['simpan'])) {
    global $db_connect;

    $nama_supplier = mysqli_real_escape_string($db_connect, $_POST['nama_supplier']);
    $nama_obat = mysqli_real_escape_string($db_connect, $_POST['nama_obat']);
    $tanggal_masuk = mysqli_real_escape_string($db_connect, $_POST['tanggal_masuk']);
    $jumlah_masuk = mysqli_real_escape_string($db_connect, $_POST['jumlah_masuk']);
    $harga_beli = mysqli_real_escape_string($db_connect, $_POST['harga_beli']);
    $satuan = mysqli_real_escape_string($db_connect, $_POST['satuan']);

    // Validasi data (sesuaikan dengan kebutuhan Anda)

    // Lakukan operasi SQL untuk mengedit data obat masuk
    $query = "UPDATE tbl_obat_masuk
    INNER JOIN tbl_supplier ON tbl_obat_masuk.id_supplier = tbl_supplier.id_supplier
    SET tbl_obat_masuk.tanggal_masuk = ?, tbl_obat_masuk.jumlah_masuk = ?, 
        tbl_obat_masuk.harga_beli = ?, tbl_obat_masuk.satuan = ?
    WHERE tbl_supplier.nama_supplier = ? AND tbl_obat_masuk.nama_obat = ?";

    $stmt = mysqli_prepare($db_connect, $query);

    // Bind parameter ke query
    mysqli_stmt_bind_param($stmt, "ssssss", $tanggal_masuk, $jumlah_masuk, $harga_beli, $satuan, $nama_supplier, $nama_obat);

    // Eksekusi statement
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "Data obat masuk berhasil diupdate.";
        header("Location:../pages/obat_masuk.php");
        exit();
    } else {
        echo "Gagal mengupdate data obat masuk: " . mysqli_error($db_connect);
        header("Location:../pages/obat_masuk.php");
        exit();
    }
}

if (isset($_POST['batal'])) {
    header("Location:../pages/obat_masuk.php");
    exit();
}
?>