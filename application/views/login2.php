<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
  <title>SPK AHP Supir Terbaik PT.Tri Mulya Logistics | Login</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <!-- VENDOR CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/vendor/linearicons/style.css">
  <!-- MAIN CSS -->
  <link rel="stylesheet" href="assets/css/main.css">
  <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
  <link rel="stylesheet" href="assets/css/demo.css">
  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
  <!-- ICONS -->
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
  <!-- WRAPPER -->
  <div id="wrapper">
    <div class="vertical-align-wrap">
      <div class="vertical-align-middle">
        <div class="auth-box ">
          <div class="left">
            <div class="content">
              <div class="header">
                <div class="logo text-center"><img src="assets/img/logo-dark.png" alt="Klorofil Logo"></div>
                <p class="lead">Login to your account</p>
              </div>
              <?php
              $success_msg= $this->session->flashdata('success_msg');
              $error_msg= $this->session->flashdata('error_msg');

                  if($success_msg){
                    ?>
                    <div class="alert alert-success">
                      <?php echo $success_msg; ?>
                    </div>
                  <?php
                  }
                  if($error_msg){
                    ?>
                    <div class="alert alert-danger">
                      <?php echo $error_msg; ?>
                    </div>
                    <?php
                  }
              ?>
              <form class="form-auth-small" method="post" action="<?php echo base_url('login'); ?>">
                <div class="form-group">
                  <label for="signin-email" class="control-label sr-only">Email</label>
                  <input type="email" class="form-control" id="signin-email" name="email_pengguna" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="signin-password" class="control-label sr-only">Password</label>
                  <input type="password" class="form-control" id="signin-password" name="kata_sandi" placeholder="Password">
                </div>
                <!-- <div class="form-group clearfix">
                  <label class="fancy-checkbox element-left">
                    <input type="checkbox">
                    <span>Remember me</span>
                  </label>
                </div> -->
                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                <!-- <div class="bottom">
                  <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
                </div> -->
              </form>
            </div>
          </div>
          <div class="right">
            <div class="overlay"></div>
            <div class="content text">
              <h1 class="heading">Selamat Datang di Website Sistem Pendukung Keputusan Supir Terbaik</h1>
              <p>by Santi Nurmila</p>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- END WRAPPER -->
</body>

</html>
