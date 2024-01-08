<?php

require 'config/db_apotek.php';

if(isset($_GET['id_obat'])) {
    global $db_connect;

    // Hapus terlebih dahulu data di tabel anak (tbl_penjualan)
    mysqli_query($db_connect, "DELETE FROM tbl_penjualan WHERE id_obat = '$_GET[id_obat]'");

    // Hapus data di tabel induk (tbl_stok_obat)
    $result = mysqli_query($db_connect, "DELETE FROM tbl_stok_obat WHERE id_obat = '$_GET[id_obat]'");

    if($result) {
        header("Location:../pages/stok_obat.php");
        exit();
    } else {
        echo "Gagal menghapus stok obat: " . mysqli_error($db_connect);
        header("Location:../pages/stok_obat.php");
        exit();
    }
}
?>