<?php
    session_start();
    require '../koneksi.php';
    if(isset($_SESSION['login'])){
      if($_SESSION['Role'] === "user"){
        $id = $_GET["id"];
        $id_akun = $_SESSION['id_akun'];
        $data = mysqli_query($conn,"SELECT * FROM produk LEFT JOIN cart ON produk.Id_Produk = cart.Id_Produk WHERE produk.Id_Produk = $id");
        $data1 = mysqli_query($conn,"SELECT * FROM produk LEFT JOIN cart ON produk.Id_Produk = cart.Id_Produk WHERE produk.Id_Produk = $id AND cart.Id_Akun = $id_akun");
        //Memeriksa Stok
        $data_tambah = mysqli_fetch_array($data);
        $data_tambah2 = mysqli_fetch_array($data1);
        if($data_tambah["Sisa_Stok"] === 0){
            echo"
                <script>
                    alert('Stok Produk Sedang Kosong');
                    document.location.href = 'shop_user.php'
                </script>
            ";
        }else{
            if(isset($_POST['tambah_cart'])){

                $quantity = htmlspecialchars($_POST["quantity"]);
                //Memeriksa Apakah Produk yang di tambah User sudah ada di Cart atau belum
                //Pemeriksaan dilakukan dengan menggunakan array $data_tambah2 karena dalam query $data2 terdapat kondisi tambahan yaitu cart.Id_Akun = $id_akun
                //Sehingga data yang diperiksa akan berdasarkan Id_Produk dan Id_Akun
                //Hal ini dilakukan karena jika User1 dan User2 Membeli Produk yang sama, maka yang membedakan Cart nya adalah Id_Akun.
                if($data_tambah2["Id_Produk"] === NULL){
                    $total_harga = $data_tambah["Harga"] * $quantity;
                    $tambah = mysqli_query($conn, "INSERT INTO cart VALUES($id_akun,$id,$quantity,$total_harga)");
                    $stok_terbaru = $data_tambah["Sisa_Stok"] - $quantity;
                    $update_stok = mysqli_query($conn, "UPDATE produk SET Sisa_Stok = $stok_terbaru WHERE Id_Produk = $id");
                }else{
                    $tambah = mysqli_query($conn, "UPDATE cart SET Quantity = '$quantity' WHERE Id_Produk = $id AND Id_Akun = $id_akun");
                    $stok_terbaru = $data_tambah2["Sisa_Stok"] + $data_tambah2["Quantity"] - $quantity;
                    $update_stok = mysqli_query($conn, "UPDATE produk SET Sisa_Stok = '$stok_terbaru' WHERE Id_Produk = '$id'");
                }
                if ($tambah && $update_stok){
                    echo "
                        <script>
                            alert('Produk Berhasil Ditambahkan Ke Keranjang');
                            document.location.href = 'cart_user.php'
                        </script>
                    ";
                }else{
                    echo "
                        <script>
                            alert('Produk Gagal Ditambahkan');
                            document.location.href = 'shop_user.php';
                        </script>
                    ";
                }
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
    <title>Thrift Store</title>
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
                <li><a class="active" href="shop_user.php">Shop</a></li>
                <li><a href="blog_user.php">Blog</a></li>
                <li><a href="about_user.php">About</a></li>
                <li><a href="contact_user.php">Contact</a></li>
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

    <section id="prodetails" class="section-p1"> 
        <div class="single-pro-image">
            <img src="../img/crud/<?php echo $data_tambah["Gambar"]; ?>" width="100%" id="MainImg" alt="">
        </div>
              
        <div class="single-pro-details">
            <h4><?php echo $data_tambah["Nama_Produk"];?></h4>
            <h2>Rp. <?php echo number_format($data_tambah["Harga"],0 ,",",".") ?></h2>
            <form action="" method="post">
                <input type="number" name="quantity" value="" min="1" max=<?php echo $data_tambah["Sisa_Stok"]?> required>
                <button class="normal" name="tambah_cart">Add To Cart</button>
            </form>
        </div>
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

<!-- JS untuk bisa pindah-pindah click baju -->

   <!-- <script>
     var MainImg  = document.getElementById("MainImg");
     var smallimg = document.getElementsByClassName("small-img");

     smallimg[0].onclick = function(){
        MainImg.src = smallimg[0].src;
     }
     smallimg[1].onclick = function(){
        MainImg.src = smallimg[1].src;
     }
     smallimg[2].onclick = function(){
        MainImg.src = smallimg[2].src;
     }
     smallimg[3].onclick = function(){
        MainImg.src = smallimg[3].src;
     }
   </script> -->


    <script src="../js/script.js"></script>
</body>
    </html>