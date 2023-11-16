<?php
    session_start();
    require '../koneksi.php';
    if(isset($_SESSION['login'])){
      if($_SESSION['Role'] === "user"){
        header("Location: ../user/index_user.php");
      }else{
        header("Location: ../admin/index_admin.php");
      }
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
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a class="active" href="blog.php">Blog</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li id="kontak" onclick="myFunction()"><a href="../login.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
               </div>
            </ul>
        </div>
        <div id="mobile">
            <img src="../img/menu.png" alt="" class="bar" width="25px" height="25px">
            <a href="../login.php" ><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
    </section>


    <section id="page-header" class="blog-header">
        
        <h2>Silahkan Baca</h2>
        
        <p>Baca mengenai update update terbaru</p>
       
    </section>

    <section id="blog" class="">
        <div class="blog-box">
            <div class="blog-img">
                <img src="../img/blog/b1.jpg" alt="">
            </div>
            <div class="blog-details">
                <h4>Jersey basket dengan bahan full printing</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, error eum ullam, suscipit aut natus tempora explicabo facere impedit sequi animi debitis expedita earum maxime recusandae vitae nihil quisquam doloremque.
               </p>
               <a href="#">CONTINUE READING</a>
            </div>
            <h1>24/01</h1>
        </div>
        <div class="blog-box">
            <div class="blog-img">
                <img src="../img/blog/b2.jpg" alt="">
            </div>
            <div class="blog-details">
                <h4>Jersey basket dengan bahan full printing</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, error eum ullam, suscipit aut natus tempora explicabo facere impedit sequi animi debitis expedita earum maxime recusandae vitae nihil quisquam doloremque.
               </p>
               <a href="#">CONTINUE READING</a>
            </div>
            <h1>24/01</h1>
        </div>
        <div class="blog-box">
            <div class="blog-img">
                <img src="../img/blog/b3.jpg" alt="">
            </div>
            <div class="blog-details">
                <h4>Jersey basket dengan bahan full printing</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, error eum ullam, suscipit aut natus tempora explicabo facere impedit sequi animi debitis expedita earum maxime recusandae vitae nihil quisquam doloremque.
               </p>
               <a href="#">CONTINUE READING</a>
            </div>
            <h1>24/01</h1>
        </div>
        <div class="blog-box">
            <div class="blog-img">
                <img src="../img/blog/b4.jpg" alt="">
            </div>
            <div class="blog-details">
                <h4>Jersey basket dengan bahan full printing</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, error eum ullam, suscipit aut natus tempora explicabo facere impedit sequi animi debitis expedita earum maxime recusandae vitae nihil quisquam doloremque.
               </p>
               <a href="#">CONTINUE READING</a>
            </div>
            <h1>24/01</h1>
        </div>
        <div class="blog-box">
            <div class="blog-img">
                <img src="../img/blog/b6.jpg" alt="">
            </div>
            <div class="blog-details">
                <h4>Jersey basket dengan bahan full printing</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, error eum ullam, suscipit aut natus tempora explicabo facere impedit sequi animi debitis expedita earum maxime recusandae vitae nihil quisquam doloremque.
               </p>
               <a href="#">CONTINUE READING</a>
            </div>
            <h1>24/01</h1>
        </div>
    </section>


   <section id="pagination" class="section-p1">
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#"><i class="fa-solid fa-arrow-right"></i> </a>
   </section>

   <!-- <section id="sm-banner" class="section-p1">
      <div class="banner-box">
            <h4>Harga</h4>
            <h2>Buy 1 Get 2</h2>
            <span>Baju khas pantai termurah disini</span>
            <button class="white">Learn More</button>
      </div>
      <div class="banner-box banner-box2">
        <h4>Harga</h4>
        <h2>Buy 1 Get 2</h2>
        <span>Baju khas pantai termurah disini</span>
        <button class="white">Learn More</button>
       </div>
   </section> -->
  

   <section id="newsletter" class="section-p1 section-m1">
        <div class="news">
            <!-- <h4>Sign Up untuk Info lebih lanjut</h4>
            <p>Masukan email anda agar dapat info dan update mengenai <span>barang terbaru</span> </p> -->
        </div>

        <div class="form">
            <!-- <input type="text"placeholder="Your E-Mail" name="" id="">
            <button class="normal">Sign Up</button> -->
        </div>
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
        <a href="about.php">About Us</a>
        <a href="#">Delivery Information</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms & Condition</a>
        <a href="contact.php">Contact Us</a>
    </div>

    <div class="col">
        <h4>My Account</h4>
        <a href="../login.php">Sign In</a>
        <a href="#">View Chart</a>
        <a href="#">My Whislist</a>
        <a href="shop.php">Track My Order</a>
        <a href="contact.php">Help</a>
    </div>
    
   <div class="col install">
     <h4>Install App</h4>
     <p>From App Store or Google Play</p>
     <div class="row">
        <img src="../img/pay/app.jpg" alt="">
        <img src="../img/pay/play.jpg" alt="">
     </div>
     <p>M-Banking juga bisa cuy</p>
     <img src="../img/pay/pay.png" alt="">
   </div>

   <div class="copyright">
    <p>@ Copyright 2023 Cuy Thrift Store SMD</p>
   </div>

   </footer>


    <script src="../script.js"></script>
</body>
</html>