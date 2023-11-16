<?php
  session_start();
  require '../koneksi.php';
  if(isset($_SESSION['login'])){
    if($_SESSION['Role'] === "admin"){
      $id = $_GET["id"];
      
      if(isset($_POST['update'])){
        $nama = htmlspecialchars($_POST["nama_produk"]);
        $harga = htmlspecialchars($_POST["harga"]);
        $stok = htmlspecialchars($_POST["stok"]);
        $gambar = $_FILES["gambar_produk"]["name"];

        $jenis_file = array('png','jpg','jpeg');
        $memisahkan_ekstensi = explode('.', $gambar);
        $ekstensi = strtolower(end($memisahkan_ekstensi));
        //set zona waktu
        date_default_timezone_set("Asia/Makassar");
        //Membuat nama file baru menggunakan waktu upload dan nama file aslinya
        $waktu = date("Y-m-d H:i:s");
        $enkripsi = md5($waktu);
        $nama_gambar_baru = "$enkripsi-$gambar";
        $tmp = $_FILES['gambar_produk']['tmp_name'];
        //Mengecek jenis ekstensi apakah sudah sesuai
        if(in_array($ekstensi, $jenis_file) === true){
          //Memulai Proses penghapusan File Gambar Yang Lama
          $nama_foto = "SELECT Gambar FROM produk WHERE Id_Produk = '$id'";
          $data_gambar = mysqli_query($conn, $nama_foto);
          //Menyimpan data gambar ke dalam bentuk array yang berisikan 'name', 'type', 'size' dll.
          $gambar_lama = mysqli_fetch_array($data_gambar);
          //Menghapus file didalam Penyimpanan atau direktori
          unlink("../img/crud/".$gambar_lama['Gambar']);

          //Setelah itu Masukkan File Gambar yang Baru
          move_uploaded_file($tmp, '../img/crud/'.$nama_gambar_baru);
          
          //Setelah File Terupdate, Database Juga Di Update
          $update = mysqli_query($conn, "UPDATE produk SET Nama_Produk = '$nama', Gambar = '$nama_gambar_baru', Harga = '$harga', Sisa_Stok = '$stok', Tanggal = '$waktu' WHERE Id_Produk = $id");
          if($update){
            header("Location: admin.php?pesan=berhasil");
          }else{
            header("Location: admin.php?pesan=gagal");
          }
        }
      }
    }else{
      header("Location: ../user/index_user.php");
    }
  }else{
      header("Location: ../umum/index.php");
  }
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Edit Produk</title>
    <link rel="stylesheet" href="../css/edit.css">
    <link rel="icon" href="../img/CUYLOGO-removebg-preview.ico">
  </head>
  <body>
      <center>
      <h1>Edit Produk</h1>
      <center>
      <form method="post" action="" enctype="multipart/form-data" >
      <section class="base">
        <input name="id" value=""  hidden />
        <div>
          <label>Nama Produk</label>
          <input type="text" name="nama_produk" value="" autofocus="" required/>
        </div>
        <div>
            <label>Gambar Produk</label>
            <input type="file" name="gambar_produk" required/>
          </div>
        <div>
          <label>Harga </label>
         <input type="number" min="0" name="harga" required/>
        </div>
        <div>
          <label>Stok</label>
         <input type="number"min="1" name="stok" required/>
        </div>
       
        <div>
         <button type="submit" name="update" >Simpan Perubahan</button>
        </div>
        </section>
      </form>
  </body>
</html>