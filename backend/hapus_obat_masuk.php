<?php

require 'config/db_apotek.php';

if(isset($_GET['id_obat_masuk'])) {
    global $db_connect;

    $id_obat_masuk = mysqli_real_escape_string($db_connect, $_GET['id_obat_masuk']);

    // Hapus data obat masuk
    $query_delete_obat_masuk = "DELETE FROM tbl_obat_masuk WHERE id_obat_masuk = '$id_obat_masuk'";
    $result_delete_obat_masuk = mysqli_query($db_connect, $query_delete_obat_masuk);

    if ($result_delete_obat_masuk) {
        header("Location:../pages/obat_masuk.php");
        exit();
    } else {
        echo "Gagal menghapus data obat masuk: " . mysqli_error($db_connect);
        header("Location:../pages/obat_masuk.php");
        exit();
    }
}
?>
