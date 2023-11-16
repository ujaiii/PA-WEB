<?php
    session_start();
    require '../koneksi.php';
    if(isset($_SESSION['login'])){
      if($_SESSION['Role'] === "user"){
        $id_akun = $_SESSION['id_akun'];
        //Query $data berfungsi untuk mengambil data dari TABEL CART dimana 2 kondisi Harus terpenuhi
        //Kondisi 1 ketika Id_produk dari tabel CART == Id_produk dari tabel PRODUK
        //Kondisi 1 menggunakan INNER JOIN karena kolom Nama Gambar akan diambil dari tabel PRODUK
        //Kondisi 2 ketika id_akun dari SESSION == id_akun dari tabel CART
        $data = mysqli_query($conn, "SELECT * FROM cart INNER JOIN produk ON cart.Id_Produk = produk.Id_Produk WHERE Id_Akun = $id_akun");
        //Query $total_beli untuk mengambil Jumlah Harga yang harus dibayar oleh akun
        $total_beli = mysqli_query($conn, "SELECT SUM(Total_Harga) AS Total FROM cart WHERE Id_Akun = $id_akun");
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
                <li><a  href="contact_user.php">Contact</a></li>
                <li><a href="../logout.php">Logout</li>
                <li id="bg-lg"><a class="active" href="cart_user.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
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
        
        <h2>KERANJANG</h2>
        
        <p>Tingkatkan Belanja dengan Produk Berkualitas Kami dan dapatkan Diskon Hingga 50%</p>
       
    </section>

    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Hapus</td>
                    <td>No</td>
                    <td>Gambar Produk</td>
                    <td>Nama Produk</td>
                    <td>Harga Produk</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <?php 
                $cek = mysqli_num_rows($data);
                if($cek == "0"){
                    echo "
                    <tr>
                        <td colspan='7' style='text-align:center;'>Barang Belanja Belum Ada</td>
                    </tr>";
                }
            ?>
            <tbody>
                <?php 
                    include '../koneksi.php';
                    $no = 1;
                    while($ts = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><a href="hapus.php?id=<?php echo $ts["Id_Produk"]; ?>"><i class="far fa-times-circle"></i></a></td>
                    <td><?php echo $no; ?></td>
                    <td><img src="../img/crud/<?php echo $ts['Gambar'];?>"></td>
                    <td><?php echo $ts["Nama_Produk"];?></td>
                    <td>Rp. <?php echo number_format($ts["Harga"],0 ,",",".") ?></td>
                    <td><?php echo $ts["Quantity"];?></td>
                    <td>Rp. <?php echo number_format($ts["Total_Harga"],0 ,",",".") ?></td>
                </tr>
            <?php
                $no++;
                }
            ?>
            </tbody>
        </table>
    </section>

    <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Masukan Coupon</h3>
            <div>
                <input type="text" placeholder="Masukan Coupon Anda" name="" id="">
                <button class="normal">Apply</button>
            </div>
        </div>

        <div id="subtotal">
            <h3>Total Belanja</h3>
            <table>
                <tr>
                    <td><strong>Total</strong></td>
                    <?php $jumlah = mysqli_fetch_array($total_beli) ?>
                    <td><strong>Rp. <?php echo number_format($jumlah['Total'],0 ,",",".") ?></strong></td>
                </tr>
            </table>
            <button class="normal">Proses Untuk Checkout</button>
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
