<?php
    session_start();
    require '../koneksi.php';
    if(isset($_SESSION['login'])){
      if($_SESSION['Role'] === "user"){
        $id_akun = $_SESSION["id_akun"];
        if(isset($_POST['kirim'])){
            $nama = htmlspecialchars($_POST["nama"]);
            $email = htmlspecialchars($_POST["email"]);
            $subjek = htmlspecialchars($_POST["subjek"]);
            $pesan = htmlspecialchars($_POST["pesan"]);
            $tambah = mysqli_query($conn, "INSERT INTO contact VALUES('$id_akun','$nama','$email','$subjek','$pesan')");
            if($tambah){
                echo "
                    <script>
                        alert('Pesan Telah Disimpan');
                        document.location.href = 'contact_user.php'
                    </script>
                ";
            }else{
                echo "
                    <script>
                        alert('Pesan Gagal Disimpan');
                        document.location.href = 'contact_user.php'
                    </script>
                ";
            }
        }
      }else{
        header("Location: ../admin/index_admin.php");
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
                <li><a href="index_user.php">Home</a></li>
                <li><a href="shop_user.php">Shop</a></li>
                <li><a  href="blog_user.php">Blog</a></li>
                <li><a href="about_user.php">About</a></li>
                <li><a class="active"  href="contact_user.php">Contact</a></li>
                <li><a href="../logout.php">Logout</li>
                <li id="bg-lg"><a href="cart_user.php"><i class="fa-solid fa-cart-shopping"></i></a></li> 
                <!-- <li id="bg-lg"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>  -->
               </div>
            </ul>
        </div>
        <div id="mobile">
            <img src="../img/menu.png" alt="" class="bar" width="25px" height="25px">
            <a href="cart_user.php" ><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
    </section>


    <section id="page-header" class="about-header">
        
        <h2>Ayo Curhat</h2>
        
        <p>Saran dan Pesan Terbaik Anda</p>
       
    </section>

    <section id="contact-details" class="section-p1">
        <div class="details">
            <span>GET IT</span>
            <h2>visit tempat</h2>
            <h3>head office</h3>
     
        <div>
            <li>
                <i class="fa-solid fa-map"></i>
                <p>jalan perjuangan</p>
            </li>
            <li>
                <i class="far fa-envelope"></i>
                <p>jalan perjuangan</p>
            </li>
            <li>
                <i class="fas fa-phone-alt"></i>
                <p>jalan perjuangan</p>
            </li>
            <li>
                <i class="far fa-clock"></i>
                <p>jalan perjuangan</p>
            </li>
        </div>
    </div>

        <!-- <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6907760117747!2d117.15593291483927!3d-0.4581342996657496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df678b3fc457de5%3A0x71f919167f752cb7!2sJl.%20Perjuangan%2C%20Sempaja%20Sel.%2C%20Kec.%20Samarinda%20Utara%2C%20Kota%20Samarinda%2C%20Kalimantan%20Timur!5e0!3m2!1sid!2sid!4v1667720202137!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div> -->
    </section>

    <section id="form-details">
        <form action="" method="post">
            <span>LEAVE A MESSAGE</span>
            <h2>Saran dan Kritik adalah kunci untuk menjadi lebih baik</h2>
            <input type="text" name="nama" placeholder="Your Name">
            <input type="text" name="email" placeholder="E-Mail">
            <input type="text" name="subjek" placeholder="Subject">
            <textarea name="pesan" id="" cols="30" rows="10" placeholder="Your Message">
            </textarea>
            <button class="normal" name="kirim">Submit</button>
        </form>

        <div class="people">
            <div><img src="" alt="">
                <p><span>Andri</span>gatau apa<br>Phone : +629999999999 
                <br>Email : acuy@gmail.com</p>
            </div>
            <div><img src="" alt="">
                <p><span>Hudzai</span>apaya<br>Phone : +629999999999 
                <br>Email : acuy@gmail.com</p>
            </div>
            
        </div>
    </section>

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
        <a href="about_user.php">About Us</a>
        <a href="#">Delivery Information</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms & Condition</a>
        <a href="contact_user.php">Contact Us</a>
    </div>

    <div class="col">
        <h4>My Account</h4>
        <a href="../logout.php">Sign Out</a>
        <a href="cart_user.php">View Cart</a>
        <a href="shop_user.php">Track My Order</a>
        <a href="contact_user.php">Help</a>
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


    <script src="../js/script.js"></script>
</body>
</html>