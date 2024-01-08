<?php

require 'config/db_apotek.php';

if(isset($_GET['id_supplier'])) {
    global $db_connect;

    $id_supplier = mysqli_real_escape_string($db_connect, $_GET['id_supplier']);

    // Hapus terlebih dahulu data yang terkait di tabel tbl_obat_masuk
    $query_delete_obat_masuk = "DELETE FROM tbl_obat_masuk WHERE id_supplier = '$id_supplier'";
    $result_delete_obat_masuk = mysqli_query($db_connect, $query_delete_obat_masuk);

    if (!$result_delete_obat_masuk) {
        echo "Gagal menghapus data terkait di tabel tbl_obat_masuk: " . mysqli_error($db_connect);
        exit();
    }

    // Setelah menghapus data terkait, barulah hapus supplier
    $query_delete_supplier = "DELETE FROM tbl_supplier WHERE id_supplier = '$id_supplier'";
    $result_delete_supplier = mysqli_query($db_connect, $query_delete_supplier);

    if ($result_delete_supplier) {
        header("Location:../pages/supplier.php");
        exit();
    } else {
        echo "Gagal menghapus supplier: " . mysqli_error($db_connect);
        header("Location:../pages/supplier.php");
        exit();
    }
}
?>
