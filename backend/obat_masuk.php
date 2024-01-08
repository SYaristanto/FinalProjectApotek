

// require 'config/db_apotek.php';

// if(isset($_POST['tambah_obat_masuk'])) {
//     global $db_connect;

//     $nama_obat = mysqli_real_escape_string($db_connect, $_POST['Nama_Obat']);
//     $tanggal_masuk = mysqli_real_escape_string($db_connect, $_POST['Tanggal_Masuk']);
//     $jumlah_masuk = mysqli_real_escape_string($db_connect, $_POST['Jumlah_Masuk']);
//     $harga_beli = mysqli_real_escape_string($db_connect, $_POST['Harga_Beli']);
//     $satuan = mysqli_real_escape_string($db_connect, $_POST['Satuan']);
//     $nama_supplier = mysqli_real_escape_string($db_connect, $_POST['Nama_Supplier']);

//     // Validasi data (sesuaikan dengan kebutuhan Anda)

//     // Lakukan operasi SQL untuk mendapatkan id_supplier
//     $query_id_supplier = "SELECT id_supplier FROM tbl_supplier WHERE nama_supplier = '$nama_supplier'";
//     $result_id_supplier = mysqli_query($db_connect, $query_id_supplier);

//     if($result_id_supplier) {
//         $row_id_supplier = mysqli_fetch_assoc($result_id_supplier);
//         $id_supplier = $row_id_supplier['id_supplier'];

//         // Lakukan operasi SQL untuk menambahkan data obat masuk
//         $query_insert = "INSERT INTO tbl_obat_masuk (nama_obat, tanggal_masuk, jumlah_masuk, harga_beli, satuan, id_supplier) 
//                         VALUES ('$nama_obat', '$tanggal_masuk', '$jumlah_masuk', '$harga_beli', '$satuan', '$id_supplier')";
//         $result_insert = mysqli_query($db_connect, $query_insert);

//         if($result_insert) {
//             echo "Data obat masuk berhasil ditambahkan.";
//             header("Location:../pages/obat_masuk.php");
//             exit();
//         } else {
//             echo "Gagal menambahkan data obat masuk: " . mysqli_error($db_connect);
//             exit();
//         }
//     } else {
//         echo "Gagal mendapatkan id_supplier: " . mysqli_error($db_connect);
//         exit();
//     }
// }
// ?>

<?php

require 'config/db_apotek.php';

if (isset($_POST['tambah_obat_masuk'])) {
    global $db_connect;

    $nama_obat = mysqli_real_escape_string($db_connect, $_POST['Nama_Obat']);
    $tanggal_masuk = mysqli_real_escape_string($db_connect, $_POST['Tanggal_Masuk']);
    $jumlah_masuk = mysqli_real_escape_string($db_connect, $_POST['Jumlah_Masuk']);
    $harga_beli = mysqli_real_escape_string($db_connect, $_POST['Harga_Beli']);
    $satuan = mysqli_real_escape_string($db_connect, $_POST['Satuan']);
    $nama_supplier = mysqli_real_escape_string($db_connect, $_POST['Nama_Supplier']);

    // Validasi data (sesuaikan dengan kebutuhan Anda)

    // Lakukan operasi SQL untuk menambahkan data obat masuk
    $query_insert = "INSERT INTO tbl_obat_masuk (nama_obat, tanggal_masuk, jumlah_masuk, harga_beli, satuan, id_supplier) 
                    SELECT '$nama_obat', '$tanggal_masuk', '$jumlah_masuk', '$harga_beli', '$satuan', tbl_supplier.id_supplier
                    FROM tbl_supplier
                    WHERE tbl_supplier.nama_supplier = '$nama_supplier'";
    
    $result_insert = mysqli_query($db_connect, $query_insert);

    if ($result_insert) {
        echo "Data obat masuk berhasil ditambahkan.";
        header("Location:../pages/obat_masuk.php");
        exit();
    } else {
        echo "Gagal menambahkan data obat masuk: " . mysqli_error($db_connect);
        exit();
    }
}
if(isset($_POST['batal'])) {
    header("Location:../pages/obat_masuk.php");
    exit();
}

?>
