<?php
include 'koneksi.php';
    
    if (isset($_POST['simpan'])) {
        $name = $_POST['name'];
        $brand = $_POST['brand'];
        $stock = $_POST['stock'];
        $photo = $_POST['photo']['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $file_tmp = $_FILES['photo']['tmp_name'];
        move_uploaded_file($file_tmp, 'images/'.$photo);
        $query = mysqli_query($koneksi, "INSERT INTO product(name,stock,photo,description,price,) VALUE ('$nama', '$stock','$photo','$description','$price')");

        if ($query > 0) {
            echo "<script>
            alert('Data created success')
            document.location.href = 'dasbor.php'
            </script>";
        } else {
            echo "<script>
            alert('Data created failed')
            document.location.href = 'dasbor.php'
        </script>";    
        }
}       
?>