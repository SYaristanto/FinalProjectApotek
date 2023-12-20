<?php

require './config/db_apotek.php';

if(isset($_POST['tambah stok obat'])) {
    global $db_connect;

    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $tempImage = $_FILES['image']['tmp_name'];

    $randomFilename = time().'-'.md5(rand()).'-'.$image;

    $uploadPath = __DIR__.'/../upload/'.$randomFilename;

    $result = mysqli_query($db_connect, 'SELECT MAX(id) AS max_id FROM products');
     

    if(move_uploaded_file($tempImage,$uploadPath)) {
        mysqli_query($db_connect,"INSERT INTO products (name,price,image)
                    VALUES ('$name','$price','/upload/$randomFilename')");
        echo "berhasil upload";
    } else {
        echo "gagal upload";
    }

}