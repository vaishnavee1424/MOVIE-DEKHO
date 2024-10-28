<?php include('connect.php')?>
<!DOCTYPE html>
<html lang="en">
<head><!-- Favicons -->
<link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="new2.css" rel="stylesheet">
  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <center>
      <div class="wrapper">
      <div class="form-wrapper login">
<form action="login.php" method="post" class="php-email-form aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
<div class="container section-title aos-init aos-animate" data-aos="fade-up">
        <h2>Login</h2>
      </div>
<div class="col-md-6">
                  <input type="email" class="input-group" name="email" id="email" required="" placeholder="Enter your Email">
                </div>
                <div class="col-md-6">
                  <input type="password" class="input-group" name="password" id="password" required="" placeholder="Enter your Password">
                </div>
                  <button type="submit" name="login">Login</button>
                </div>

              </div>
            </form>
</body>
</html>
<?php
    if(isset($_POST['login'])){
     
      $email=$_POST['email'];
      $password=$_POST['password'];
      //print_r($_POST);
      $sql = "SELECT * FROM `users` WHERE email ='$email' and password = '$password' ";
     $rs= mysqli_query($con,$sql);
     if(mysqli_num_rows($rs) > 0){
      $data = mysqli_fetch_array($rs);
      $role = $data['roteype'];
      $_SESSION['uid'] = $data['userid'];
      $_SESSION['type'] = $role;

      if($role==1){
        echo "<script> alert('Admin successfull')</script>";
        echo "<script> window.location.href='admin/dashboard.php';</script>";
      }else if($role==2){
        echo "<script> alert('login register successfull')</script>";
        echo "<script> window.location.href='index.php';</script>";
      }

    else{
      echo"<script> alert('invalid') <script>";
     }

    }
  }?>
    