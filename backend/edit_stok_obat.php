<?php

require 'config/db_apotek.php';

if(isset($_POST['simpan'])) {
    global $db_connect;

    $nama_obat = mysqli_real_escape_string($db_connect, $_POST['Nama_Obat']);
    $jenis = mysqli_real_escape_string($db_connect, $_POST['Jenis']);
    $stok = mysqli_real_escape_string($db_connect, $_POST['Stok']);
    $expired = mysqli_real_escape_string($db_connect, $_POST['Expired']);
    $satuan = mysqli_real_escape_string($db_connect, $_POST['Satuan']);
    $harga_satuan = mysqli_real_escape_string($db_connect, $_POST['Harga_Satuan']);

    // Validasi data (sesuaikan dengan kebutuhan Anda)

    // Lakukan operasi SQL untuk menambahkan atau mengedit stok obat
    $query = "SELECT * FROM tbl_stok_obat WHERE nama_obat = '" . $nama_obat . "' AND jenis = '" . $jenis . "'";
    $result = mysqli_query($db_connect, $query);

    if (mysqli_num_rows($result) > 0) {
        // Jika obat sudah ada, lakukan operasi update
        $query = "UPDATE tbl_stok_obat SET stok = '" . $stok . "', expired = '" . $expired . "', satuan = '" . $satuan . "', harga_satuan = '" . $harga_satuan . "' WHERE nama_obat = '" . $nama_obat . "' AND jenis = '" . $jenis . "'";
    } else {
        // Jika obat belum ada, lakukan operasi insert
        $query = "INSERT INTO tbl_stok_obat (nama_obat, jenis, stok, expired, satuan, harga_satuan) VALUES ('" . $nama_obat ."', '" . $jenis ."', '" . $stok . "', '" . $expired . "', '" . $satuan ."', '" . $harga_satuan . "')";
    }

    $result = mysqli_query($db_connect, $query);

    if($result) {
        echo "Stok obat berhasil diupdate/tambahkan.";       
        header("Location:../pages/stok_obat.php");
        exit();
    } else {
        echo "Gagal mengupdate/tambahkan stok obat: " . mysqli_error($db_connect);
        header("Location:");
        exit();
    }
}
if(isset($_POST['batal'])) {
    header("Location:../pages/stok_obat.php");
    exit();
}
?>