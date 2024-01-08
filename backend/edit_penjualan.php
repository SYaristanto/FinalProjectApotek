<?php

require 'config/db_apotek.php';

if (isset($_POST['simpan_penjualan'])) {
    global $db_connect;

    $nama_obat = mysqli_real_escape_string($db_connect, $_POST['nama_obat']);
    $nama_user = mysqli_real_escape_string($db_connect, $_POST['nama_user']);
    $tanggal_penjualan = mysqli_real_escape_string($db_connect, $_POST['Tanggal_Penjualan']);
    $jumlah_terjual = mysqli_real_escape_string($db_connect, $_POST['Jumlah_Terjual']);
    $harga_satuan = mysqli_real_escape_string($db_connect, $_POST['Harga_Satuan']);
    $total_harga = mysqli_real_escape_string($db_connect, $_POST['Total']);
    $bayar = mysqli_real_escape_string($db_connect, $_POST['Bayar']);
    $kembali = mysqli_real_escape_string($db_connect, $_POST['Kembali']);

    // Lakukan INNER JOIN untuk mendapatkan id_obat dan id_user
    $query = "SELECT p.id_penjualan, s.id_obat, u.id_user
              FROM tbl_penjualan p
              INNER JOIN tbl_stok_obat s ON p.id_obat = s.id_obat
              INNER JOIN tbl_user u ON p.id_user = u.id_user
              WHERE s.nama_obat = '$nama_obat' AND u.nama = '$nama_user'";
              
    $result = mysqli_query($db_connect, $query);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        echo "Data penjualan tidak ditemukan.";
        exit();
    }

    $id_penjualan = $row['id_penjualan'];
    $id_obat = $row['id_obat'];
    $id_user = $row['id_user'];

    // Validasi data (sesuaikan dengan kebutuhan Anda)

    // Lakukan operasi SQL untuk mengupdate data penjualan
    $update_query = "UPDATE tbl_penjualan SET id_obat='$id_obat', id_user='$id_user', tanggal_penjualan='$tanggal_penjualan', jumlah_terjual='$jumlah_terjual', harga_satuan='$harga_satuan', total_harga='$total_harga', bayar='$bayar', kembali='$kembali' WHERE id_penjualan='$id_penjualan'";
    $update_result = mysqli_query($db_connect, $update_query);

    if ($update_result) {
        echo "Data penjualan berhasil diupdate.";
        header("Location:../pages/penjualan.php");
        exit();
    } else {
        echo "Gagal mengupdate data penjualan: " . mysqli_error($db_connect);
        header("Location:../pages/penjualan.php");
        exit();
    }
}

if (isset($_POST['batal'])) {
    header("Location:../pages/penjualan.php");
    exit();
}
?>