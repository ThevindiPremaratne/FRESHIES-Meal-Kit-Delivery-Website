<?php

	session_start();

	$cartCount = 0;

	if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
		foreach($_SESSION['cart'] as $item) {
			$cartCount += $item['quantity'];
		}
	}

	$data = file_get_contents('data\foods.json');
	$foods = json_decode($data, true);
?>

<!DOCTYPE html>
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
		<nav class="navbar navbar-expand-lg navbar-dark  bg-dark ftco-navbar-light sleep">
			<div class="container">
				<a class="navbar-brand" href="index.php">Freshies</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="oi oi-menu"></span> Menu
				</button>
				<div class="collapse navbar-collapse" id="ftco-nav">
					<ul class="navbar-nav ml-auto fix-top">
						<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
						<li class="nav-item active"><a href="meals.php" class="nav-link">Shop</a></li>
						<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
						<li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
						<li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[<?php echo $cartCount; ?>]</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END nav -->

		<div class="hero-wrap hero-bread" style="background-image: url('images/meals.jpg');">
			<div class="container">
				<div class="row no-gutters slider-text align-items-center justify-content-center">
					<div class="col-md-9 ftco-animate text-center">
						<p class="breadcrumbs"><span class="mr-2"></p>
						<h1 class="mb-0 bread">Meal Plan</h1>
					</div>
				</div>
			</div>
		</div>

		<hr>
		<section id="Breakfast" class="ftco-section1">
			<div class="container">
				<section id="breakveg">
					<h2 class="mb-4 "><b>Breakfast</b></h2><h4>-veg</h4>
					<div class="row">
						<?php 
							foreach ($foods['breakfast']['veg'] as $item) {
						?>
							<div class="col-md-6 col-lg-3 ftco-animate">
								<div class="product">
									<a href="#" class="img-prod"><img class="img-fluid" src="<?php echo $item['image']?>" alt="Colorlib Template">
										<div class="overlay"></div>
									</a>
									<div class="text py-3 pb-4 px-3 text-center">
										<h3><a href="#"><?php echo $item['name']?></a></h3>
										<div class="d-flex">
											<div class="pricing">
												<p class="price"><span>Rs.<?php echo $item['price']?>.00</span></p>
											</div>
										</div>
										<div class="bottom-area d-flex px-3">
											<div class="m-auto d-flex">
												<form method="get" action="add.php">
													<input type="hidden" name="id" value="<?php echo $item['id']?>">
													<input type="hidden" name="name" value="<?php echo $item['name']?>">
													<input type="hidden" name="price" value="<?php echo $item['price']?>">
													<input type="hidden" name="image" value="<?php echo $item['image']?>">
													<input type="hidden" name="quantity" value="1">
													<input type="hidden" name="mealType" value="veg">
													<input type="hidden" name="mealCategory" value="breakfast">
													<input type="submit" class="btn btn-primary mx-1" value="Add to cart"></input>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</section>

				<section id="breaknonveg" class="ftco-section1">
					<div class="container">
						<h4>-non veg</h4>
						<div class="row">
							<?php 
								foreach ($foods['breakfast']['nonVeg'] as $item) {
							?>
								<div class="col-md-6 col-lg-3 ftco-animate">
									<div class="product">
										<a href="#" class="img-prod"><img class="img-fluid" src="<?php echo $item['image']?>" alt="Colorlib Template">
											<div class="overlay"></div>
										</a>
										<div class="text py-3 pb-4 px-3 text-center">
											<h3><a href="#"><?php echo $item['name']?></a></h3>
											<div class="d-flex">
												<div class="pricing">
													<p class="price"><span>Rs.<?php echo $item['price']?>.00</span></p>
												</div>
											</div>
											<div class="bottom-area d-flex px-3">
												<div class="m-auto d-flex">
													<form method="get" action="add.php">
														<input type="hidden" name="id" value="<?php echo $item['id']?>">
														<input type="hidden" name="name" value="<?php echo $item['name']?>">
														<input type="hidden" name="price" value="<?php echo $item['price']?>">
														<input type="hidden" name="image" value="<?php echo $item['image']?>">
														<input type="hidden" name="quantity" value="1">
														<input type="hidden" name="mealType" value="nonVeg">
														<input type="hidden" name="mealCategory" value="breakfast">
														<input type="submit" class="btn btn-primary mx-1" value="Add to cart"></input>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</section>
			</div>
		</section>

		<hr>
		<hr>
		<section id="Lunch" class="ftco-section1">
			<div class="container">
				<section id="lunchveg">
					<h2 class="mb-4"><b>Lunch</b></h2><h4>-veg</h4>
					<div class="row">
						<?php 
							foreach ($foods['lunch']['veg'] as $item) {
						?>
							<div class="col-md-6 col-lg-3 ftco-animate">
								<div class="product">
									<a href="#" class="img-prod"><img class="img-fluid" src="<?php echo $item['image']?>" alt="Colorlib Template">
										<div class="overlay"></div>
									</a>
									<div class="text py-3 pb-4 px-3 text-center">
										<h3><a href="#"><?php echo $item['name']?></a></h3>
										<div class="d-flex">
											<div class="pricing">
												<p class="price"><span>Rs.<?php echo $item['price']?>.00</span></p>
											</div>
										</div>
										<div class="bottom-area d-flex px-3">
											<div class="m-auto d-flex">
												<form method="get" action="add.php">
													<input type="hidden" name="id" value="<?php echo $item['id']?>">
													<input type="hidden" name="name" value="<?php echo $item['name']?>">
													<input type="hidden" name="price" value="<?php echo $item['price']?>">
													<input type="hidden" name="image" value="<?php echo $item['image']?>">
													<input type="hidden" name="quantity" value="1">
													<input type="hidden" name="mealType" value="veg">
													<input type="hidden" name="mealCategory" value="lunch">
													<input type="submit" class="btn btn-primary mx-1" value="Add to cart"></input>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
    				</div>
            	</section>

                <section id="lunchnonveg" class="ftco-section1">
                    <div class="container">
                        <h4>-non veg</h4>
                        <div class="row">
							<?php 
								foreach ($foods['lunch']['nonVeg'] as $item) {
							?>
								<div class="col-md-6 col-lg-3 ftco-animate">
									<div class="product">
										<a href="#" class="img-prod"><img class="img-fluid" src="<?php echo $item['image']?>" alt="Colorlib Template">
											<div class="overlay"></div>
										</a>
										<div class="text py-3 pb-4 px-3 text-center">
											<h3><a href="#"><?php echo $item['name']?></a></h3>
											<div class="d-flex">
												<div class="pricing">
													<p class="price"><span>Rs.<?php echo $item['price']?>.00</span></p>
												</div>
											</div>
											<div class="bottom-area d-flex px-3">
												<div class="m-auto d-flex">
													<form method="get" action="add.php">
														<input type="hidden" name="id" value="<?php echo $item['id']?>">
														<input type="hidden" name="name" value="<?php echo $item['name']?>">
														<input type="hidden" name="price" value="<?php echo $item['price']?>">
														<input type="hidden" name="image" value="<?php echo $item['image']?>">
														<input type="hidden" name="quantity" value="1">
														<input type="hidden" name="mealType" value="nonVeg">
														<input type="hidden" name="mealCategory" value="lunch">
														<input type="submit" class="btn btn-primary mx-1" value="Add to cart"></input>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>		
    					</div>
    				</div>
            	</section>
    		</div>
    	</section>

		<hr>
		<hr>
		<section id="Dinner" class="ftco-section1">
			<div class="container">
				<section id="dinnerveg">
					<h2 class="mb-4"><b>Dinner</b></h2><h4>-veg</h4>
					<div class="row">
						<?php 
							foreach ($foods['dinner']['veg'] as $item) {
						?>
							<div class="col-md-6 col-lg-3 ftco-animate">
								<div class="product">
									<a href="#" class="img-prod"><img class="img-fluid" src="<?php echo $item['image']?>" alt="Colorlib Template">
										<div class="overlay"></div>
									</a>
									<div class="text py-3 pb-4 px-3 text-center">
										<h3><a href="#"><?php echo $item['name']?></a></h3>
										<div class="d-flex">
											<div class="pricing">
												<p class="price"><span>Rs.<?php echo $item['price']?>.00</span></p>
											</div>
										</div>
										<div class="bottom-area d-flex px-3">
											<div class="m-auto d-flex">
												<form method="get" action="add.php">
													<input type="hidden" name="id" value="<?php echo $item['id']?>">
													<input type="hidden" name="name" value="<?php echo $item['name']?>">
													<input type="hidden" name="price" value="<?php echo $item['price']?>">
													<input type="hidden" name="image" value="<?php echo $item['image']?>">
													<input type="hidden" name="quantity" value="1">
													<input type="hidden" name="mealType" value="veg">
													<input type="hidden" name="mealCategory" value="dinner">
													<input type="submit" class="btn btn-primary mx-1" value="Add to cart"></input>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
    				</div>
            	</section>

                <section id="dinnernonveg" class="ftco-section1">
                    <div class="container">
                        <h4>-non veg</h4>
                        <div class="row">
							<?php 
								foreach ($foods['dinner']['nonVeg'] as $item) {
							?>
								<div class="col-md-6 col-lg-3 ftco-animate">
									<div class="product">
										<a href="#" class="img-prod"><img class="img-fluid" src="<?php echo $item['image']?>" alt="Colorlib Template">
											<div class="overlay"></div>
										</a>
										<div class="text py-3 pb-4 px-3 text-center">
											<h3><a href="#"><?php echo $item['name']?></a></h3>
											<div class="d-flex">
												<div class="pricing">
													<p class="price"><span>Rs.<?php echo $item['price']?>.00</span></p>
												</div>
											</div>
											<div class="bottom-area d-flex px-3">
												<div class="m-auto d-flex">
													<form method="get" action="add.php">
														<input type="hidden" name="id" value="<?php echo $item['id']?>">
														<input type="hidden" name="name" value="<?php echo $item['name']?>">
														<input type="hidden" name="price" value="<?php echo $item['price']?>">
														<input type="hidden" name="image" value="<?php echo $item['image']?>">
														<input type="hidden" name="quantity" value="1">
														<input type="hidden" name="mealType" value="nonVeg">
														<input type="hidden" name="mealCategory" value="dinner">
														<input type="submit" class="btn btn-primary mx-1" value="Add to cart"></input>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
            	</section>
    		</div>
    	</section>

		<hr>
		<hr>
		<section id="Snack" class="ftco-section4">
			<div class="container">
				<h2 class="mb-4"><b>Snacks</b></h2>
				<div class="row">
					<?php 
						foreach ($foods['snacks'] as $item) {
					?>
						<div class="col-md-6 col-lg-3 ftco-animate">
							<div class="product">
								<a href="#" class="img-prod"><img class="img-fluid" src="<?php echo $item['image']?>" alt="Colorlib Template">
									<div class="overlay"></div>
								</a>
								<div class="text py-3 pb-4 px-3 text-center">
									<h3><a href="#"><?php echo $item['name']?></a></h3>
									<div class="d-flex">
										<div class="pricing">
											<p class="price"><span>Rs.<?php echo $item['price']?>.00</span></p>
										</div>
									</div>
									<div class="bottom-area d-flex px-3">
										<div class="m-auto d-flex">
											<form method="get" action="add.php">
												<input type="hidden" name="id" value="<?php echo $item['id']?>">
												<input type="hidden" name="name" value="<?php echo $item['name']?>">
												<input type="hidden" name="price" value="<?php echo $item['price']?>">
												<input type="hidden" name="image" value="<?php echo $item['image']?>">
												<input type="hidden" name="quantity" value="1">
												<input type="hidden" name="mealType" value="">
												<input type="hidden" name="mealCategory" value="snacks">
												<input type="submit" class="btn btn-primary mx-1" value="Add to cart"></input>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
    			</div>
    		</div>
		</section>
          
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