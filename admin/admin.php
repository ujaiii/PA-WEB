<?php
    session_start();
    require '../koneksi.php';
    if(isset($_SESSION['login'])){
      if($_SESSION['Role'] === "admin"){
        if (isset($_POST['cari'])) {
            $cari = $_POST['keyword'];
            $data = mysqli_query($conn, "SELECT * FROM produk WHERE Nama_Produk LIKE '%$cari%' OR Gambar LIKE '%$cari%' OR Harga LIKE '%$cari%' OR Sisa_Stok LIKE '%$cari%'");
        } else {
            $data = mysqli_query($conn, "SELECT * FROM produk ORDER BY Id_Produk ASC");
        }
      }else{
        header("Location: ../user/index_user.php");
      }
    }else{
        header("Location: ../umum/index.php");
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/crud.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="icon" href="../img/CUYLOGO-removebg-preview.ico">
    <script src="../js/script.js"></script>
    <title>Admin Thrift Store</title>
</head>
<body>
    <section id="header">  
        <a href="#"><img src="../img/CUYLOGO-removebg-preview.png" class="logo " alt=""></a>
        <div>
            <ul id="navbar">
               <div class="navigation">
                <li><a href="index_admin.php">Home</a></li>
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
    <div class="table">
        <div class="table-header">
            <p>Product Details</p>
            <div>
                <form action="" method="post">
                    <input name="keyword" placeholder="Product">
                    <button class="tambah" name="cari"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
                    <button class="tambah"> <a href="tambah.php">Tambah</a></button>
                </form>
            </div>
        </div>
        <div class="table-section" >
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Gambar Produk</th>
                        <th>Harga Produk</th>
                        <th>Jumlah Stok</th>
                        <th>Tanggal Update</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                    $cek = mysqli_num_rows($data);
                    if($cek == "0"){
                        echo "
                        <tr>
                            <td colspan='7' style='text-align:center;'>Data Tidak Ditemukan</td>
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
                                <td><?php echo $no; ?></td>
                                <td><?php echo $ts["Nama_Produk"]; ?></td>
                                <td><img src="../img/crud/<?php echo $ts['Gambar'];?>"></td>
                                <!-- ok -->
                                <td>Rp. <?php echo number_format($ts["Harga"],0 ,",",".") ?></td>
                                <td><?php echo $ts["Sisa_Stok"]; ?></td>
                                <td><?php echo $ts["Tanggal"]; ?></td>
                                <td>
                                    <button><a href="edit.php?id=<?php echo $ts["Id_Produk"]; ?>"><i class="fa-solid fa-pen-to-square"></a></i></button>
                                    <button><a href="hapus.php?id=<?php echo $ts["Id_Produk"]; ?>"><i class="fa-solid fa-trash"></a></i></button>
                                </td>
                            </tr>
                    <?php
                    $no++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="pagination">
            <div><i class="fa-solid fa-arrow-left-long"></i></div>
            <div>1</div>
            <div>2</div>
            <div><i class="fa-solid fa-arrow-right-long"></i></div>
        </div>
    </div>
    <script src="../js/script.js"></script>
</body>
</html>