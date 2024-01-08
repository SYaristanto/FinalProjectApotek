<?php
// require 'config/db_apotek.php';

// if(isset($_POST['simpan'])) {
//     global $db_connect;

//     $nama = mysqli_real_escape_string($db_connect, $_POST['nama']);
//     $email = mysqli_real_escape_string($db_connect, $_POST['email']);
//     $role = mysqli_real_escape_string($db_connect, $_POST['role']);

    // Generate password acak
//     $password = generateRandomPassword();

//     // Hash password
//     $hashed_password = password_hash($password, PASSWORD_DEFAULT);

//     // Query untuk menambahkan user ke dalam database
//     $query = "INSERT INTO tbl_user (nama, email, role, password) VALUES ('$nama', '$email', '$role', '$hashed_password')";
//     $result = mysqli_query($db_connect, $query);

//     if($result) {
//         echo "User berhasil ditambahkan. Password: $password";
//         header("Location:../pages/data_user.php");
//         exit();
//     } else {
//         echo "Gagal menambahkan user: " . mysqli_error($db_connect);
//         header("Location:");
//         exit();
//     }
// }

// if(isset($_POST['batal'])) {
//     header("Location:../pages/data_user.php");
//     exit();
// }

// Fungsi untuk membuat password acak
// function generateRandomPassword($length = 8) {
//     $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
//     $password = '';
//     for ($i = 0; $i < $length; $i++) {
//         $password .= $characters[rand(0, strlen($characters) - 1)];
//     }
//     return $password;
// }
?>

<?php

require 'config/db_apotek.php';

if(isset($_POST['simpan'])) {
    global $db_connect;

    $nama = mysqli_real_escape_string($db_connect, $_POST['nama']);
    $email = mysqli_real_escape_string($db_connect, $_POST['email']);
    $role = mysqli_real_escape_string($db_connect, $_POST['role']);
    $password = $_POST['password'];  // Gunakan input password dari form

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk menambahkan user ke dalam database
    $query = "INSERT INTO tbl_user (nama, email, role, password) VALUES ('$nama', '$email', '$role', '$hashed_password')";
    $result = mysqli_query($db_connect, $query);

    if($result) {
        echo "User berhasil ditambahkan.";
        header("Location:../pages/data_user.php");
        exit();
    } else {
        echo "Gagal menambahkan user: " . mysqli_error($db_connect);
        header("Location:../pages/data_user.php");
        exit();
    }
}

if(isset($_POST['batal'])) {
    header("Location:../pages/data_user.php");
    exit();
}
?>