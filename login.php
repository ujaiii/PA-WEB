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
  if(isset($_POST['login'])){
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $result = mysqli_query($conn, "SELECT * FROM akun WHERE Username='$username'");
    if(mysqli_num_rows($result) === 1){
      $row = mysqli_fetch_assoc($result);
      if(password_verify($password, $row['Password'])){
        $_SESSION['login'] = $row["Username"];
        $_SESSION['Role'] = $row["Role"];
        $_SESSION['id_akun'] = $row["Id_Akun"];
        if($_SESSION['Role'] === "admin"){
          header("Location: admin/index_admin.php");
        }else{
          header("Location: user/index_user.php");
        }
      }else{
        $_SESSION['status'] = "Password_Salah";
      }
    }else{
      $_SESSION['status'] = "Username_Tidak_Ditemukan";
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
    <title>Masuk</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form method="post" action="" class="sign-in-form">
            <h2 class="title">Masuk</h2>
            <?php
              if(isset($_SESSION['status'])){
                if($_SESSION['status'] === "Username_Tidak_Ditemukan" || $_SESSION['status'] === "Password_Salah"){
                    echo "
                        <p style='color: red;'>
                            Username dan Password Salah!!!
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
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required/>
            </div>
            <input type="submit" name="login" value="Login" class="btn solid" />
            <p class="social-text">Masuk Menggunakan Social Media</p>
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
            <h3>Belum Punya Account ?</h3>
            <p>
             Silahkan register terlebih dahulu di bawah ini
             Enjoy Our Website !!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              <a href="register.php">Daftar</a>
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
      </div>
    </div>
  </body>
</html>