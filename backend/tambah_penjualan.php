<?php

require 'config/db_apotek.php';

if (isset($_POST['tambah_penjualan'])) {
    global $db_connect;

    // Mengambil data dari form input
    $nama_obat = mysqli_real_escape_string($db_connect, $_POST['nama_obat']);
    $nama_user = mysqli_real_escape_string($db_connect, $_POST['nama_user']);
    $tanggal_penjualan = mysqli_real_escape_string($db_connect, $_POST['Tanggal_Penjualan']);
    $jumlah_terjual = mysqli_real_escape_string($db_connect, $_POST['Jumlah_Terjual']);
    $harga_satuan = mysqli_real_escape_string($db_connect, $_POST['Harga_Satuan']);
    $total_harga = mysqli_real_escape_string($db_connect, $_POST['Total']);
    $bayar = mysqli_real_escape_string($db_connect, $_POST['Bayar']);
    $kembali = mysqli_real_escape_string($db_connect, $_POST['Kembali']);

    // Cari ID_Obat berdasarkan nama obat
    $query_obat = "SELECT id_obat FROM tbl_stok_obat WHERE nama_obat = '$nama_obat'";
    $result_obat = mysqli_query($db_connect, $query_obat);
    $row_obat = mysqli_fetch_assoc($result_obat);
    $id_obat = $row_obat['id_obat'];

    // Cari ID_User berdasarkan nama user
    $query_user = "SELECT id_user FROM tbl_user WHERE nama = '$nama_user'";
    $result_user = mysqli_query($db_connect, $query_user);
    $row_user = mysqli_fetch_assoc($result_user);
    $id_user = $row_user['id_user'];
    
    // Lakukan operasi SQL untuk menambahkan penjualan
    $query_insert = "INSERT INTO tbl_penjualan (id_obat, id_user, tanggal_penjualan, jumlah_terjual, harga_satuan, total_harga, bayar, kembali) VALUES ('$id_obat', '$id_user', '$tanggal_penjualan', '$jumlah_terjual', '$harga_satuan', '$total_harga', '$bayar', '$kembali')";
    $result_insert = mysqli_query($db_connect, $query_insert);

    if($result_insert) {
     // Fetch the actual names from tbl_stok_obat and tbl_user based on id_obat and id_user
     $query_obat_name = "SELECT nama_obat FROM tbl_stok_obat WHERE id_obat = '$id_obat'";
     $result_obat_name = mysqli_query($db_connect, $query_obat_name);
     $row_obat_name = mysqli_fetch_assoc($result_obat_name);
     $nama_obat_actual = $row_obat_name['nama_obat'];

     $query_user_name = "SELECT nama FROM tbl_user WHERE id_user = '$id_user'";
     $result_user_name = mysqli_query($db_connect, $query_user_name);
     $row_user_name = mysqli_fetch_assoc($result_user_name);
     $nama_user_actual = $row_user_name['nama'];

    echo "Data penjualan berhasil ditambahkan. Obat: $nama_obat_actual, User: $nama_user_actual";
    header("Location:../pages/penjualan.php");
    exit();
    } else {
     echo "Gagal menambahkan stok obat: " . mysqli_error($db_connect);
     header("Location:");
     exit();
 }

}

if(isset($_POST['batal'])) {
 header("Location:../pages/penjualan.php");
 exit();
}
?>