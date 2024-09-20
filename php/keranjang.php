<?php
include "koneksi.php";
session_start();

$total = 0;

$id = $_SESSION['id_user'];

if(isset($id)){

    if (isset($_POST['add'])){

        if(isset($_SESSION['cart'])){
            $item_array_id = array_column($_SESSION['cart'], 'id');
            if(!in_array($_GET["id"], $item_array_id)){
                $count = count($_SESSION['cart']);
                $item_array = array(
                    'id' => $_GET['id'],
                    'name' => $_POST['name'],
                    'price' => $_POST['price'],
                    'photo' => $_POST['photo'],
                    'jumlah' => $_POST['jumlah'],
                );

                $_SESSION['cart'] [$count] = $item_array;
                echo "<script>
                alert('berhasil dimasukkan ke keranjang');
                </script>";
            }else {
                echo"<script>
                alert('sudah ada di keranjang');
                </script>";
         }
        }else{
            $item_array = array(
                'id' => $_GET['id'],
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'photo' => $_POST['photo'],
                'jumlah' => $_POST['jumlah'],
            );

            $_SESSION['cart'] [0] = $item_array;
            echo "<script>
            alert('berhasil dimasukkan ke keranjang');
            </script>";
        }
    }
    if(isset($_GET['aksi'])){
        if($_GET['aksi'] == 'hapus'){
            foreach($_SESSION['cart'] as $key => $value){
                if($value['id'] == $_GET['id']){
                    unset($_SESSION{'cart'} [$key]);
                    echo"<script>alert('produk dihapus dari keranjang');</script>";
                    echo"<script>window.location = 'keranjang.php';</script>";
                }
            }
        }else if ($_GET['aksi'] == 'beli'){
            $total = $_GET['total'];

            $query = mysqli_query($koneksi, "INSERT INTO transaction(tanggal,id_pelanggan,total) VALUES ('". date("Y-m-d") . "','$id','$total')");
            $id_transaksi = mysqli_insert_id($koneksi);
            
            foreach($_SESSION['cart'] as $key => $value){
                $id_produk = $value['id'];
                $jumlah = $value['jumlah'];
                $sql = "INSERT INTO detail(id_transaksi,id_produk,jumlah) VALUES ('$id_transaksi','$id_produk','$jumlah')";
                $res = mysqli_query($koneksi, $sql);

                if ($res > 0){
                    unset($_SESSION['cart']);

                    echo "<script>
                    alert('terimakasih sudah berbelanja');
                    </script>";

                    echo "<script>
                    window.location = 'cetak.php?id=". $id_transaksi."';
                    </script>";
                }
            }
        }
    }
}
else{
    echo "<script>
    alert('login dulu');
    </script>";
    echo "<script>
   document.location.href = 'login.php';
    </script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>Keranjang Belanja</title>
<!-- Favicon-->
<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
<!-- Bootstrap icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
<!-- Core theme CSS (includes Bootstrap)-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-neutral-800 font-[poppins]">

   
    <main class="container mx-auto my-8 p-4 shadow-lg rounded-lg">
        <h2 class="text-4x1 font-semibold mb-4">Keranjang Belanja</h2>
        <div class="space-y-4">
            <?php
                if (!empty($_SESSION['cart'])) {    
                    foreach($_SESSION['cart'] as $value){ ?>
                <div class="min-w-full bg-slate-50 flex items-center gap-4 p-4 justify-between">
                    <div class="flex items-center gap-4">
                        <img src="../image/<?php echo $value['photo']?>" alt="" class="w-32">
                        <div class="flex flex-col gap-1">
                        <h1 class="font-bold text-x1"><?php echo $value['name']?></h1>
                        <p>jumlah beli : <span><?php echo $value['jumlah']?></span></p>
                        <p class="text-lg font-bold text yellow-500"><?php echo number_format($value['price'] * $value['jumlah']) ?></p>
                        </div>
                    </div>

                    <form action="" method="POST">
                        <a name="hapus" href="keranjang.php?aksi=hapus&id=<?php echo $value['id']?>" class="btn bg-zinc-700 hover:bg-zinc-700 text-white btn-sm">hapus</a>
                    </form>
                </div>        
                <?php
                    
                    }
                 ?>
                <?php } ?>
        </div>
        <div class="flex justify-between font-bold border-t pt-4 mt-4">
            <?php 
            foreach($_SESSION['cart'] as $value){
                $total = $total + ($value['price'] * $value['jumlah']);
            }  ?>
            <span>Total <?php echo number_format($total) ?></span>
        </div>

        <div class="mt-8">
            <form action="" method="POST">
                <a href="detail.php" class="btn bg-zinc-700 hover:bg-zinc-900 text-white btn-sm ">go back</a>
                <a href="keranjang.php?aksi=beli&total=<?php echo $total ?>" class="btn bg-zinc-700 hover:bg-zinc-800 text-white btn-sm ">Checkout</a>
                
            </form>
        </div>
    </main>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>