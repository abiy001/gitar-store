<?php
  $koneksi = new mysqli("localhost", "root", "", "db_gitar");

  // Cek apakah $_SESSION['keranjang'] sudah didefinisikan
  if (!isset($_SESSION['keranjang']) || !is_array($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = array(); // Inisialisasi dengan array kosong jika belum ada
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="assets/js/color-modes.js"></script>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
<meta name="generator" content="Hugo 0.122.0">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://cdn.tailwindcss.com"></script>
<title>Detail Barang</title>


<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">

<link rel="stylesheet"href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

  .logo {
      color: white;
      font-size: 35px;
      letter-spacing: 1px;
      cursor: pointer;
  }

  span {
    color: #999;
  }

  nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 6px;
    padding-left: 8%;
    padding-right: 8%;
}

  nav ul li {
    list-style: none;
    display: inline-block;
    padding: 10px 25px; 
  }

  nav ul li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
    text-transform: capitalize;
  }

  nav ul li a:hover {
    color: #999;
    transition: .4s;
  }
</style>

</head>
<body style="background-color: #191919;">
<header data-bs-theme="dark">
  <nav class="flex items-center justify-between pt-45" data-aos="fade-down">
    <h1 class="logo text-white">prime gu<span>itar</span></h1>
    <ul>
      <li><a href="lobby.php">Home</a></li>
      <li><a href="#">product</a></li>
    </ul>
    <form class="d-flex">
        <button class="btn btn-outline-light" type="submit" formaction="keranjang.php">
          <i class='bx bx-cart-alt'></i>
        </button>
    </form>
  </nav>
</header>
  <div class="containzer-fluid py-5">
    <div class="container">
      <div class="row">
        <?php
          include 'koneksi.php';

          // Periksa apakah 'id' ada di URL
          if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            $tambah = mysqli_query($koneksi, "SELECT * from product WHERE id='$id'");

            // Cek apakah product ditemukan
            if (mysqli_num_rows($tambah) > 0) {
              while ($product = mysqli_fetch_array($tambah)) {
              // Tampilkan detail product
              ?>

                  <div class="col-md-5">
                    <img class="card-img-top w-50 rounded-xl" src="../image/<?= $product['photo'] ?>" alt="" >
                  </div>
                  <div class="col-md-6 offset-md-1">
                    <h1 class="text-white"><b><?= $product['name'] ?></b></h1>
                    <h3 class="text-white"><?= $product['description'] ?></h3><br>
                    <h2 class="text-white"><b>Rp. <?= number_format($product['price']); ?></b></h2><br>
                    <p class="review-rating text-yellow-500">★★★★☆</p>
                    <form action="keranjang.php?id=<?php echo $product['id'] ?>" method="POST">
                      <div class="form-group col-md-3">
                        <div class="input-group">
                          <input type="number" min="1" value="1" class="form-control" name="jumlah"/>
                          <input type="hidden" min="1" value="<?= $product['price'] ?>" class="form-control" name="price"/>
                          <input type="hidden" min="1" value="<?= $product['photo'] ?>" class="form-control" name="photo"/>
                          <input type="hidden" min="1" value="<?= $product['name'] ?>" class="form-control" name="name" />
                        </div>   
                      </div>
                      <input type="submit" value="Tambahkan keranjang" name="add" class="btn bg-zinc-600 text-white mt-auto" />
                    </form>
                    </div>
                <?php
              }
            } 
          } 
        ?>
      </div>
    </div>
  </div>

  <div class="container-fluid py-2 bg-transparent text-center">
    <div class="container">
      <h2 class="text-center text-white font-bold text-2xl mb-5">product</h2>
    </div>
  </div>
  <div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
      <?php
        include 'koneksi.php';

        $tambah = mysqli_query($koneksi, "SELECT * from product");
          while ($product = mysqli_fetch_array($tambah)) {
      ?>
        <div class="col mb-5">
          <div class="card h-full">
            <img class="card-img-top" src="../image/<?= $product['photo'] ?>" />                        
              <div class="card-body p-3 bg-zinc-700 text-white">                          
                <p><?= $product['description'] ?></p>
                <p><b>Rp. <?php echo number_format($product['price']); ?></b></p>
                <p class="review-rating">★★★★☆</p>
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                  <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="detail.php?id=<?= $product['id'] ?>">DETAIL</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>