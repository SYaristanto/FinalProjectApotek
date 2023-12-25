<?php

require 'config/db_apotek.php';
// $hapus = mysqli_query($db_connect, "SELECT * FROM tbl_stok_obat");

if(isset($_GET['id_obat'])) {
    global $db_connect;

    // $id_obat = mysqli_real_escape_string($db_connect, $_POST['id_obat']);
    // Lakukan operasi SQL untuk menghapus stok obat
    mysqli_query($db_connect, "DELETE FROM tbl_stok_obat WHERE id_obat = '$_GET[id_obat]'");
    header("Location:../pages/stok_obat.php");
    exit();
    // mysqli_query($db_connect,"DELETE FROM tbl_stok_obat WHERE id_obat = '$_GET[id_obat]'");
    // header("Location:../pages/stok_obat.php");
    // die():

    // if($result) {
       
    // } else {
    //     echo "Gagal menghapus stok obat: " . mysqli_error($db_connect);
    //     exit();
    // }   
}
?>