<?php
session_start();
require'./config/db_apotek.php';

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = mysqli_query($db_connect, "SELECT * FROM tbl_user WHERE email = '$email'");
    if (mysqli_num_rows($user) > 0) {
        $data = mysqli_fetch_assoc($user);

        if (password_verify($password, $data['password'])) {

            //otorisasi
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['role'] = $data['role'];

            if ($_SESSION['role'] == 'admin') {
                header('Location:../pages/dashboard.php');
                exit;
            
            } else if ($_SESSION['role'] == 'super_admin') {
                header('Location:../pages/dashboard_owner.php'); // Sesuaikan dengan nama file dashboard super admin
                exit;
            
            } else {
                header('Location:../login.php');
            }

        } else {
            echo "password salah";
            die;
        }

    } else {
        echo "username atau password salah";
    die;
}
}



// if(isset($_POST['login'])) {
//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     $user = mysqli_query($db_connect, "SELECT * FROM tbl_user WHERE email ='$email'");
//     if(mysqli_num_rows($user) > 0 ){
//         $data = mysqli_fetch_assoc($user);
        
//         if(password_verify($password, $data['password'])) {
            
//             // Otorisasi
//             $_SESSION['email'] = $data['email'];
//             $_SESSION['role'] = $data['role'];
//             if($_SESSION['role'] == 'admin') {
                
//                 header('Location:../pages/dashboard.php');
//                 exit;
//             }
//             else{
//                 header('Location:../../login.php');  
//             }
//         }
//         else {
//             echo"password salah";
//             die;
//         }
//     }
//     else {
//         echo"username atau password salah";
//         die;
//     }
// }
?>