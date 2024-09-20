<?php
include 'hapusGitar.php';

$id_gitar = $_GET['id'];


if(hapus($id_gitar) > 0) {
    echo"<script>
    alert('data deleted success');
    document.location.href = 'dasbor.php';
    </script>";
} else {
    echo"<script>
    alert('data deleted failed');
    document.location.href = 'dasbor.php';
    </script>";
}

?>