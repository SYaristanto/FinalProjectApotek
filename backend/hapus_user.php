<?php
require 'config/db_apotek.php';

if(isset($_GET['id_user'])) {
    global $db_connect;

    $id_user = mysqli_real_escape_string($db_connect, $_GET['id_user']);

    // Lakukan operasi SQL untuk menghapus user
    $query = "DELETE FROM tbl_user WHERE id_user = '$id_user'";
    $result = mysqli_query($db_connect, $query);

    if($result) {
        echo "User berhasil dihapus.";
        header("Location:../pages/data_user.php");
        exit();
    } else {
        echo "Gagal menghapus user: " . mysqli_error($db_connect);
        header("Location:../pages/data_user.php");
        exit();
    }
}
?>