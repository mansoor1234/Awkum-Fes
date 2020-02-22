<?php include('config.php'); ?>
<?php include(INCLUDE_PATH . '/logic/userSignup.php'); ?>
<?php 
if(isset($_SESSION['userPermissions'])  && isset($_SESSION['user']) ){
if(count($_SESSION['userPermissions']) != 0 && count($_SESSION['user']) != 0){
    header("Location:index.php");} }?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | General Form Elements</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
   <!--  <div class="page-wrapper">
        <div class="auth-wrapper">
            <div class="card auth-content mb-0">
                <div class="card-body py-5">
                    <div class="text-center mb-5">
                        <h3 class="mb-3 text-primary">IMS</h3>
                        <div class="font-18 text-center">Login to Your accaont</div>
                    </div>
                    <?php include(INCLUDE_PATH . "/layouts/messages.php"); ?>
                    <form id="login-form" action="login.php" method="POST">
                        <div class="mb-4">
                            <div class="md-form mb-0"><input class="md-form-control" type="text" name="username"><label>Email Or Username</label></div>
                        </div>
                        <div class="mb-4">
                            <div class="md-form mb-0"><input class="md-form-control" type="password" name="password"><label>Password</label></div>
                        </div>
                       <button class="btn btn-primary btn-rounded btn-block" type="submit" name="loginBtn">LOGIN</button>
                    </form>
                    <div class="text-center mt-5 font-13">
                        <div class="mb-2 text-muted">2019 © All rights reserved</div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- BEGIN: Page backdrops-->
 
 <!-- general form elements -->
          <div class="row mt-5">
            <div class="col-4 offset-4 align-center">
            <div class="card card-primary mb-0">
              <div class="card-header">
                <h3 class="card-title">Login to your account</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="login-form" action="login.php" method="POST">
                <div class="card-body">
                 <?php include(INCLUDE_PATH . "/layouts/messages.php"); ?>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email Or Username</label>
                    <input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder="Email Or Username" required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required="">
                  </div>
                 </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="loginBtn" class="btn btn-primary">Login</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
    
</body>
</html>
