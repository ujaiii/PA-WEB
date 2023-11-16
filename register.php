<?php
  session_start();
  require 'koneksi.php';
  if(isset($_SESSION['login'])){
    if($_SESSION['Role'] === "admin"){
      header("Location: admin/index_admin.php");
    }else{
      header("Location: user/index_user.php");
    }
    exit;
  }
  if(isset($_POST['daftar'])){
    $email = htmlspecialchars($_POST['email']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    //Enkripsi Password
    $password = password_hash($password,PASSWORD_DEFAULT);
    $result = mysqli_query($conn,"SELECT Email from akun WHERE Email = '$email'");
    if(mysqli_fetch_assoc($result)){
        $_SESSION['status'] = "Email_Gagal";
    }else{
        $sql = "INSERT INTO akun VALUES('', '$username', '$password', '$email', 'user')";
        $result = mysqli_query($conn,$sql);
        if (mysqli_affected_rows($conn) > 0){
            $_SESSION['status'] = "Berhasil";
        }else{
            $_SESSION['status'] = "Gagal";
        }
      }

    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="css/login.css" >
    <link rel="icon" href="img/CUYLOGO-removebg-preview.ico">
    <title>Daftar</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form method="post" action="" class="sign-in-form">
            <h2 class="title">Daftar</h2>
            <?php
                if(isset($_SESSION['status'])){
                    if($_SESSION['status'] === "Berhasil"){
                        echo "
                            <p style='color: green;'>
                                Registrasi Akun Berhasil
                            </p>
                        ";
                    }else if($_SESSION['status'] === "Gagal"){
                        echo "
                            <p style='color: red;'>
                                Registrasi Akun Gagal!
                            </p>
                        ";
                    }else if($_SESSION['status'] === "Email_Gagal"){
                        echo "
                            <p style='color: red;'>
                                Email Sudah Digunakan!
                            </p>
                        ";
                    }
                    echo"
                        <script>
                            if (window.history.replaceState){
                                window.history.replaceState( null, null, window.location.href );
                            }
                        </script>
                    ";
                }
            ?>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required/>
            </div>
            <input type="submit" name="daftar" value="Daftar" class="btn solid" />
            <p class="social-text">Daftar Menggunakan Social Media</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Sudah Punya Account ?</h3>
            <p>
            Silahkan Masuk Menggunakan Akun Anda
            Enjoy Our Website!!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              <a href="login.php">Masuk</a>
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
      </div>
    </div>
  </body>
</html>