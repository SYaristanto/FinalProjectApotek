<?php
require 'config/db_apotek.php';

if(isset($_POST['simpan'])) {
    global $db_connect;

    $nama_user = mysqli_real_escape_string($db_connect, $_POST['nama_user']);
    $email = mysqli_real_escape_string($db_connect, $_POST['email']);
    $password = mysqli_real_escape_string($db_connect, $_POST['password']);
    $role = mysqli_real_escape_string($db_connect, $_POST['role']);

    // Jika password diisi, hash password baru
    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE tbl_user SET email = '$email', password = '$hashed_password', role = '$role' WHERE nama = '$nama_user'";
    } else {
        // Jika password tidak diisi, tidak termasuk dalam proses update password
        $query = "UPDATE tbl_user SET email = '$email', role = '$role' WHERE nama = '$nama_user'";
    }

    $result = mysqli_query($db_connect, $query);

    if($result) {
        echo "Data user berhasil diupdate.";
        header("Location:../pages/data_user.php");
        exit();
    } else {
        echo "Gagal mengupdate data user: " . mysqli_error($db_connect);
        header("Location:");
        exit();
    }
}

if(isset($_POST['batal'])) {
    header("Location:../pages/data_user.php");
    exit();
}
?>
