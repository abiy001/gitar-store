<?php
    include "koneksi.php";

    function hapus($id) {
        global $koneksi;
        $query = mysqli_query($koneksi, "DELETE FROM product WHERE id='$id'");
        
        return mysqli_affected_rows($koneksi);
    }
?>