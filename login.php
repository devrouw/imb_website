<?php

include('config.php');

session_start();

error_reporting(0);

if(isset($_SESSION['email'])){
  header("Location: index.php");
}

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if($password == $cpassword){
        $sql = "SELECT * FROM tb_akun WHERE email='$email' AND password='$password'";
        $result = mysqli_query($koneksi, $sql);
        if(mysqli_num_rows($result) > 0){
            echo "<script>alert('Email yang anda masukkan sudah terdaftar')</script>";
        } else {
            $sql = "INSERT INTO tb_akun (password, email, id_role) VALUES ('$password','$email','2')";
            $result = mysqli_query($koneksi, $sql);
            if($result){
                echo "<script>alert('Registrasi Berhasil!'); document.location='login.php'; </script>";
                $email = "";
                $password = $_POST['password'];
                $cpassword = $_POST['cpassword'];
            } else {
                echo "<script>alert('Registrasi Gagal')</script>";
            }
        }
    } else {
        echo "<script>alert('Password tidak sama')</script>";
    }
}

if(isset($_POST['bt_login'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM tb_akun WHERE email='$email' AND password='$password'";
    $result = mysqli_query($koneksi, $sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
        echo "<script>alert('Login Berhasil!'); document.location='index.php'; </script>";
        // $username = "";
        // $password = $_POST['password'];
     } else {
        echo "<script>alert('Email dan Password tidak sesuai')</script>";
     }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Skripsi IMB! | </title>

    <!-- Bootstrap -->
    <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="assets/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="assets/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="login.php#signin" method="post">
              <h1>Form Masuk</h1>
              <div>
                <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $email ?>" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $_POST['password'] ?>" required="" />
              </div>
              <div>
                <button class="btn btn-default submit" name="bt_login">Login</button>
                <a class="reset_pass" href="#">Lupa Password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Belum Punya Akun?
                  <a href="#signup" class="to_register"> Buat Akun </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paste"></i> IMB</h1>
                  <p>©2021 All Rights Reserved. Skripsi IMB. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form action="login.php#signup" method="post">
              <h1>Buat Akun</h1>
              <div>
                <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $email; ?>" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required="" />
              </div>
              <div>
                <button class="btn btn-default submit" name="submit">Submit</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Sudah Punya Akun?
                  <a href="#signin" class="to_register"> Login </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paste"></i> Skripsi IMB!</h1>
                  <p>©2021 All Rights Reserved. Skripsi IMB. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>