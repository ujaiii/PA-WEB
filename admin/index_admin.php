<?php
    session_start();
    require '../koneksi.php';
    if(isset($_SESSION['login'])){
      if($_SESSION['Role'] === "admin"){
        //Langsung Masuk Ke Halaman Html dibawah
      }else{
        header("Location: ../user/index_user.php");
      }
    }else{
        header("Location: ../umum/index.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuy Thrift Store</title>
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../img/CUYLOGO-removebg-preview.ico">
    <script src="../js/script.js"></script>
</head>
<body>
    <section id="header"> 
        <a href="#"><img src="../img/CUYLOGO-removebg-preview.png" class="logo " alt=""></a>
        <div>
            <ul id="navbar">
               <div class="navigation">
                <li><a class="active"href="index_admin.php">Home</a></li>
                <li><a href="shop_admin.php">Shop</a></li>
                <li><a href="../logout.php">Logout</li>
                <li id="bg-lg"><a href="admin.php"><i class="fa-solid fa-cart-shopping"></i></a></li> 
                <!-- <li id="bg-lg"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>  -->
               </div>
            </ul>
        </div>
        <div id="mobile">
            <img src="../img/menu.png" alt="" class="bar" width="25px" height="25px">
            <a href="admin.php" ><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
    </section>


    <section id="promosi">
        <h2>Selamat Datang Admin</h2>
    </section>


    <section id="features" class="section-p1">
        <div class="fe-box">
            <img src="../img/features/f1.png" alt="">
            <h6>Mudah di akses</h6>
        </div>
        <div class="fe-box">
            <img src="../img/features/f2.png" alt="">
            <h6>Hemat waktu</h6>
        </div>
        <div class="fe-box">
            <img src="../img/features/f4.png" alt="">
            <h6>Customer senang</h6>
        </div>
        <div class="fe-box">
            <img src="../img/features/f5.png" alt="">
            <h6>Admin senang</h6>
        </div>
        <div class="fe-box">
            <img src="../img/features/f6.png" alt="">
            <h6>24/7 Support</h6>
        </div>
    </section>

   <section id="banner" class="section-m1">
    <h4>Memberikan service terbaik</h4>
    <h2>Diskon <span>50% </span> Semua Baju & Aksesoris di musim panas </h2>
    <button onclick="window.location.href='shop_admin.php';" class="normal">Lihat Produk Kami</button>
   </section>

   <section id="banner3">
        <div class="banner-box">
            <h2>Produk Sale</h2>
            <h3>Pakaian Kaos</h3>
        </div>
        <div class="banner-box banner-box2 ">
            <h2>Produk Sale</h2>
            <h3>Pakaian Kemeja</h3>
        </div>
        <div class="banner-box banner-box3">
            <h2>Produk Sale</h2>
            <h3>Celana</h3>
        </div>
        <div class="banner-box banner-box3">
            <h2>Produk Sale</h2>
            <h3>Sepatu</h3>
        </div>
   </section>


   <section id="newsletter" class="section-p1 section-m1"> 
   </section>


   <footer class="section-p1">
    <div class="col">
        <img class="logo" src="../img/CUYLOGO-removebg-preview.png " alt="">
        <h4>Contact</h4>
        <p><strong>Address :</strong> Jalan Perjuangan 60 Samarinda, Indonesia</p>
        <p><strong>Phone   :</strong> +6212345679</p>
        <p><strong>Open    :</strong> 09.00-21.00 </p>
        <div class="follow">
            <h4>Follow Us</h4>
            <div class="icon">
                <i class="fab fa-facebook"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-pinterest-p"></i>
                <i class="fab fa-youtube"></i>
            </div>
        </div>
    </div>
   
    <div class="col">
        <h4>About</h4>
        <a href="#">About Us</a>
        <a href="#">Delivery Information</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms & Condition</a>
        <a href="#">Contact Us</a>
    </div>

    <div class="col">
        <h4>My Account</h4>
        <a href="../logout.php">Sign Out</a>
        <a href="admin.php">View Cart</a>
        <a href="shop_admin.php">Track My Order</a>
    </div>

   <div class="col install">
     <h4>Install App</h4>
     <p>From App Store or Google Play</p>
     <div class="row">
        <img src="../img/pay/app.jpg" alt="">
        <img src="img/pay/play.jpg" alt="">
     </div>
     <p>M-Banking juga bisa cuy</p>
     <img src="../img/pay/pay.png" alt="">
   </div>

   <div class="copyright">
    <p>@ Copyright 2023 Cuy Thrift Store SMD</p>
   </div>

   </footer>


    <script src="../js/script.js"></script>
</body>
</html>