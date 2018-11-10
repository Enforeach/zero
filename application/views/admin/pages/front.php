<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login V1</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="<?= site_url('assets/images/icons/favicon.ico') ?>"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= site_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= site_url('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= site_url('assets/vendor/animate/animate.css') ?>">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?= site_url('assets/vendor/css-hamburgers/hamburgers.min.css') ?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= site_url('assets/vendor/select2/select2.min.css') ?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= site_url('assets/css/util.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= site_url('assets/css/main.css') ?>">
<!--===============================================================================================-->
<style type="text/css">


.login100-form-btn {
    font-family: Montserrat-Bold;
    font-size: 15px;
    line-height: 1.5;
    color: #fff;
    text-transform: uppercase;
    width: 100%;
    height: 50px;
    border-radius: 25px;
    background-color: #1c1f1c;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0 25px;
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    -moz-transition: all 0.4s;
    transition: all 0.4s;
}
  .login100-form-btn:hover {
    background: #e6e6e6;
    color: black;
}
</style>
</head>
<body>
  <?php
  error_reporting(0);
      if($alert == "failed"){
        echo "<script>failed_sweet('make sure the username and password is correct.');</script>";
      }
    ?>
  <div class="limiter">
    <div class="container-login100" style="background-color: #ffffff;">
      <div class="wrap-login100" style="background-color: #b5b2b22e">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="<?= site_url('assets/images/zero3.png'); ?>" alt="IMG">
        </div>

        <form class="login100-form validate-form" method="post">
          <span class="login100-form-title">
            Member Login
          </span>

          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="username" placeholder="Username/Email">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <input class="input100" type="password" name="password" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          
          <div class="container-login100-form-btn">
            <button class="login100-form-btn">
              Login
            </button>
          </div>

          <div class="text-center p-t-12">
            <span class="txt1">
              Belum punya akun?
            </span>
            <a class="txt2" href="#">
              Buat
            </a>
          </div>
          
        </form>
        <div class="text-center p-t-70">
          <span class="txt1 lele">
            Copyright 2017 Endforeach
          </span>
        </div>
      </div>
    </div>
  </div>
  
  

  
<!--===============================================================================================-->  
  <script src="<?= site_url('assets/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
<!--===============================================================================================-->
  <script src="<?= site_url('assets/vendor/bootstrap/js/popper.js') ?>"></script>
  <script src="<?= site_url('assets/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
<!--===============================================================================================-->
  <script src="<?= site_url('assets/vendor/select2/select2.min.js') ?>"></script>
<!--===============================================================================================-->
  <script src="<?= site_url('assets/vendor/tilt/tilt.jquery.min.js') ?>"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
<!--===============================================================================================-->
  <script src="<?= site_url('assets/js/main.js') ?>"></script>

</body>
</html>