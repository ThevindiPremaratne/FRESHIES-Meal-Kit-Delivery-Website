<?php

  session_start(); 

  @include './config.php';

  if(isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
      header("Location: dashboard.php");
      exit();
  }

  if(isset($_POST["submit"])){

      $email = $_POST["email"];
      $password = $_POST["password"];
      
      $sql = "SELECT * FROM `user` WHERE email = '$email' AND password = '$password'";

      $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){

      $_SESSION['user_logged_in'] = true;
      $_SESSION['email'] = $email;

      header("Location: ../dashboard");
      exit();
  } else {
      echo "<script>
              alert('Check Email & password Again');
              window.location.href = './';
          </script>";
  }
  }
?>

<!DOCTYPE html>
<html lang="en">
<html lang="en">
  <head>
    <title>FRESHIES</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
   
  </head>
  <body class="goto-here">
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Freshies</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="meals.php" class="nav-link">Shop</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
          </ul>
	      </div>
	    </div>
	  </nav>
    <div class="hero-wrap hero-bread" style="background-image: url('images/signin.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Sign In</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="container">
        <br><br>
        <form action="signin.php" method="post" name="sin" style="max-width: 300px; margin: 0 auto; border: 1px solid black; padding: 20px;" onsubmit="return validatesin()">
          <div class="mb-3">
            <label for="exampleInputEmail2" class="form-label" style="font-size: 14px;">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail2" name="email">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword2" class="form-label" style="font-size: 14px;">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword3" name="password">
          </div>
          <button type="submit" class="btn btn-dark" style="font-size: 14px;" aria-describedby="accountHelp" name="submit">Sign In</button>
          <br><br>
        </form>
      </div>
    </div>
    <br>
    <hr>

    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Freshies</h2>
              <p>Where Every Bite Brings Fresh Delights!</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li><a href="https://twitter.com"><span class="icon-twitter"></span></a></li>
                <li><a href="https://www.facebook.com/login/"><span class="icon-facebook"></span></a></li>
                <li><a href="https://www.instagram.com/accounts/login/?hl=en"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="meals.php" class="py-2 d-block">Shop</a></li>
                <li><a href="about.php" class="py-2 d-block">About</a></li>
                <li><a href="contact.php" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Have a Question?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li class="mb-3"><span class="icon icon-map-marker"></span><span class="text">203 Fussels's Lane, Complex 0060,Colombo, Sri Lanka</span></li>
                  <li class="mb-3"><span class="icon icon-phone"></span><span class="text">+94 112 924106</span></li>
                  <li class="mb-3"><span class="icon icon-envelope"></span><span class="text">freshies@gmail.com</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <p>
            Copyright &copy;All rights reserved | by <a href="#" target="_blank">Freshies</a>
            </p>
          </div>
        </div>
      </div>
    </footer>
    
    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  
  
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>
    
  </body>
</html>

