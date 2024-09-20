<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>portofolio</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</head>
<body>
    <!-- hero section start -->
    <div class="hero">
        <nav data-aos="fade-down">
            <h2 class="logo">prime gu<span class="text-neutral-500">itar</span></h2>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#history">history</a></li>
                <li><a href="detail.php">product</a></li>
                <li><a href="#contact">Contact me</a></li>
            </ul>
            <a href="login.php" id="btn">login</a>
        </nav>

        <div class="content">
            <h4 class="text-4xl text-neutral-500 mb-2 font-mono">Welcome To</h4>
            <h1 class="text-5xl text-neutral-500 mb-4 font-serif">Premium Guit<span class="text-stone-100">ar Store</span></h1>
            <h3 class="text-2xl text-neutral-500 mb-3 font-serif">Famous Brand In This Store</h3>
        </div>
    </div>
    <section class="about">
        <div class="main " id="history">
            <img data-aos="zoom-in-right" class="foto" src="https://stuff.fendergarage.com/images/v/I/u/artist-feed-card-2023-v4@2x.jpg" alt="">
            <div class="about-text">
                <h2 data-aos="zoom-out-down">History</h2>
                <h5 data-aos="fade-up">guitar<span>History</span></h5>
                <p data-aos="fade-left">The original shape of the guitar in the fourteenth and fifteenth centuries. A plucked string instrument that was first called a guitar appeared in Spain around the turn of the fifteenth century. The instrument was actually called a vihuela, and consisted of four double-strings (paired courses).</p>
            </div>
        </div>
    </section>

    <div class="service">
        <section class="py-5" id="product">
            <h1 data-aos="fade-up" data-aos-anchor-placement="center-center" class="text-white pb-5 text-7xl flex items-center justify-center"><b>our superior product</b></h1>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center ">
                    <?php
                        include 'koneksi.php';

                        $simpan = mysqli_query($koneksi, "SELECT * from product LIMIT 2");
                        while ($product = mysqli_fetch_array($simpan)) {
                        ?>
                        <div class="col mb-5">
                            <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1100" class="h-full bg-zinc-700 text-slate-200 rounded-3xl">
                            
                                <img class="card-img-top rounded-2xl" src="../image/<?= $product['photo'] ?>" />
                            
                                <div class="card-body p-4">
                                    <!-- <p class="text-center text-xl"><b><?= $product['name'] ?></b></p> -->
                                    <p class="text-3xl text-xl"><b><?= $product['brand'] ?></b></p>
                                    <!-- <p class="text-3xl"><?= $product['stock'] ?></p> -->
                                    <p class="text-3xl"><?= $product['description'] ?></p>
                                    <!-- <p class="text-3xl"><?= $product['price'] ?></p> -->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn border text-white mt-auto" href="detail.php">DETAIL</a></div>
                                </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </div>

    <div id="contact" class="contact-me">
        <p data-aos="fade-down" data-aos-easing="linear" data-aos-duration="800">Hafidh Abiyyu</p>
        <p data-aos="fade-down" data-aos-easing="linear" data-aos-duration="900">Follow my sosmed here</p>
        <div class="social">
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
        </div>
        <p class="end">made by Hafidh Abiyyu</p>
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>