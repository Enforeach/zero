<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Homies | Login Administrator </title>

    <!-- Bootstrap -->
    <link href="<?php echo site_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo site_url('assets/vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo site_url('assets/css/custom.css'); ?>" rel="stylesheet">
    <!-- SweetAlert -->
    <link href="<?php echo site_url('assets/vendors/sweetalert/dist/sweetalert.css'); ?>" rel="stylesheet">

    <!-- JQuery -->
    <script src="<?php echo site_url('assets/vendors/jquery/dist/jquery.min.js'); ?>"></script>
    <!-- BootstrapJS -->
    <script src="<?php echo site_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <!-- SweetAlert -->
    <script src="<?php echo site_url('assets/vendors/sweetalert/dist/sweetalert.min.js'); ?>"></script>
    <!-- Custom Alert -->
    <script src="<?php echo site_url('assets/js/custom_alert.js'); ?>"></script>

  </head>

  <body style="background:#F7F7F7;">
    <?php
      if($alert == "failed"){
        echo "<script>failed_sweet('make sure the username and password is correct.');</script>";
      }
    ?>
    <div class="">
      <div id="wrapper">
        <div id="login" class=" form" style="margin: 130px 0;">
          <section class="login_content">
            <form method="post">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus=""/>
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" name="login" class="btn btn-default submit">Log in</button>
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->

              </div>
              <div class="clearfix"></div>
              <div class="separator">

                  <p>©2018 End Foreach Copyright. Homies!</p>
                
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
