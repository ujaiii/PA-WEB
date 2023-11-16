<?php
    session_start();
    require '../koneksi.php';
    if(isset($_SESSION['login'])){
      if($_SESSION['Role'] === "admin"){
        if(isset($_POST['tambah'])){
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
            if(move_uploaded_file($tmp,'../img/crud/'.$nama_gambar_baru)){
              $tambah = mysqli_query($conn, "INSERT INTO produk VALUES('','$nama', '$nama_gambar_baru', '$harga', '$stok', '$waktu')");
              if ($tambah){
                  echo "
                      <script>
                          alert('Produk Berhasil Ditambahkan');
                          document.location.href = 'admin.php'
                      </script>
                  ";
              }else{
                  echo "
                      <script>
                          alert('Produk Gagal Ditambahkan');
                          document.location.href = 'admin.php';
                      </script>
                  ";
              }
            }
            //Jika ekstensinya salah
          }else{
            echo "
              <script>
                  alert('File yang di Upload Bukan Gambar!!!');
                  document.location.href = 'admin.php';
              </script>
            ";
          }
        
        }else{

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
    <title>Tambah Product</title>
    <link rel="stylesheet" href="../css/edit.css">
    <link rel="icon" href="../img/CUYLOGO-removebg-preview.ico">
  </head>
  <body>
      <center>
      <h1>Tambah Produk</h1>
      <center>
      <form method="POST" action="" enctype="multipart/form-data" >
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
         <input type="number" min="0" name="harga" value="" required/>
        </div>
        <div>
          <label>Stok</label>
         <input type="number" min="1" name="stok" value="" required/>
        </div>
       
        <div>
         <button type="submit" name="tambah">Simpan</button>
        </div>
        </section>
      </form>
  </body>
</html>