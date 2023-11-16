<?php
    session_start();
    require '../koneksi.php';
    if(isset($_SESSION['login'])){
        if($_SESSION['Role'] === "admin"){
            $id = $_GET["id"];
            //Mengambil data gambar
            $nama_foto = "SELECT Gambar FROM produk WHERE Id_Produk = '$id'";
            $data_gambar = mysqli_query($conn, $nama_foto);

            //Menyimpan data gambar ke dalam bentuk array yang berisikan 'name', 'type', 'size' dll.
            $gambar_lama = mysqli_fetch_array($data_gambar);
            //Menghapus file didalam Penyimpanan atau direktori
            unlink("../img/crud/".$gambar_lama['Gambar']);

            //Menghapus data dari database
            $hapus = mysqli_query($conn, "DELETE FROM produk WHERE Id_Produk = '$id'");
            if($hapus){
                header("Location: admin.php?pesan=berhasil");
            }else{
                header("Location: admin.php?pesan=gagal");
            }
        }else{
            header("Location: ../user/index_user.php");
        }
    }else{
        header("Location: ../umum/index.php");
    }
?>