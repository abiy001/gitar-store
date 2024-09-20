<?php
include 'perbaruiData.php';

$id_gitar = (int)$_GET['id_gitar'];

if(isset($_POST['perbarui'])) { 
        if(perbarui_gitar($_POST, $id_gitar) > 0 ) {
        echo "<script>
        alert('Data updated success');
        document.location.href = 'dashboard.php';
        </script>";
    } else {
        echo "<script>
        alert('Data updated failed');
        document.location.href = 'dashboard.php';
        </script>";
    }
}
?>
