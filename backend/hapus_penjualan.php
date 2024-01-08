<?php

require 'config/db_apotek.php';

if(isset($_GET['id_penjualan'])) {
    global $db_connect;
        mysqli_query($db_connect, "DELETE FROM tbl_penjualan WHERE id_penjualan = '$_GET[id_penjualan]'");
        header("Location:../pages/penjualan.php");
        exit();

    if($result) {
       
    } else {
        echo "Gagal menghapus stok obat: " . mysqli_error($db_connect);
        header("Location:../pages/penjualan.php");
        exit();
    }   
}
?>