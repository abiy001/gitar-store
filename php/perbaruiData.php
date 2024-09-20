<?php

include('koneksi.php');

// cek apakah tombol daftar sudah diklik atau blum?
function perbarui_gitar($POST, $id_gitar) {
    global $koneksi;

    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $stock = $_POST['stock'];
    $photo = $_FILES['photo']['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $file_tmp = $_FILES['photo']['tmp_name'];
    move_uploaded_file($file_tmp, './image/'.$photo);
    
    $query = "UPDATE product SET nama = '$nama', brand = '$brand' , stock = '$stock', photo = '$photo', price = '$price', description = '$description', price = '$price', WHERE id=$id";
    mysqli_query($koneksi, $query);
    
   return mysqli_affected_rows($koneksi);
}


?>