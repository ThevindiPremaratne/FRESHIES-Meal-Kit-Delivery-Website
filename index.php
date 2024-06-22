<?php

  session_start();

  $cartCount = 0;

  if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach($_SESSION['cart'] as $item) {
        $cartCount += $item['quantity'];
    }
  }

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
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Freshies</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
			  <li class="nav-item"><a href="meals.php" class="nav-link">Shop</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
			  <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[<?php echo $cartCount; ?>]</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image: url(images/bg_6.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
	            <div class="col-md-12 ftco-animate text-center">
	              <h1 class="mb-2">We serve yummy meals to your door step</h1>
	              <h2 class="subheading mb-4">Freshies- Where Every Bite Brings Fresh Delights!"</h2>
	            </div>
	          </div>
	        </div>
	      </div>
	      <div class="slider-item" style="background-image: url(images/bg_8.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
	            <div class="col-sm-12 ftco-animate text-center">
	              <h1 class="mb-2">100% fresh foods</h1>
	              <h2 class="subheading mb-4">Freshies- Where Every Bite Brings Fresh Delights!"</h2>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
    </section>

    <hr>
		<section class="ftco-section ftco-category ftco-no-pt">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-6 order-md-last align-items-stretch d-flex">
								<div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(images/12.avif);">
									<div class="text text-center">
										<h1>What are you craving for?</h1>
										<p>	Healthy meals for all of you</p>
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mealPlanModal">Build Meal Plan</button>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(images/break.avif);">
									<div class="text px-3 py-1">
										<h2 class="mb-0"><a href="./meals.php#Breakfast">Breakfast</a></h2>
									</div>
								</div>
								<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(images/lnch.jpeg);">
									<div class="text px-3 py-1">
										<h2 class="mb-0"><a href="./meals.php#Lunch">Lunch</a></h2>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(images/dinner.avif);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="./meals.php#Dinner">Dinner</a></h2>
							</div>		
						</div>
						<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(images/snacks.jpeg);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="meals.php#Snack">Snacks</a></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Featured Products</span>
            <h2 class="mb-4">Savor Every Bite: Don't miss</h2>
            <p>Tempting Treats Await- Don't miss out on our delectable dishes!</p>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6 col-lg-3 ftco-animate">
            <div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="images/cart/2.webp" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">Sri Lankan Rice and Curry</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span>Rs.200.00</span></p>
		    					</div>
	    					</div>
    						<div class="bottom-area d-flex px-3">
                  <div class="m-auto d-flex">
                    <form method="get" action="add.php">
                      <input type="hidden" name="id" value="2">
                      <input type="hidden" name="name" value="Sri Lankan Rice and Curry">
                      <input type="hidden" name="price" value="200">
                      <input type="hidden" name="quantity" value="1">
                      <input type="submit" class="btn btn-primary mx-1" value="Add to cart"></input>
                    </form>
                  </div>
                </div>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-3 ftco-animate">
            <div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="images/cart/5.webp" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">Western Breakfast</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price">Rs.550.00</span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
                  <div class="m-auto d-flex">
                    <form method="get" action="add.php">
                      <input type="hidden" name="id" value="5">
                      <input type="hidden" name="name" value="Western Breakfast">
                      <input type="hidden" name="price" value="550">
                      <input type="hidden" name="quantity" value="1">
                      <input type="submit" class="btn btn-primary mx-1" value="Add to cart"></input>
                    </form>
                  </div>
                </div>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-3 ftco-animate">
            <div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="images/cart/9.webp" alt="Colorlib Template">
	    					<div class="overlay"></div>
	    				</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">Vegetable Kottu</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span>Rs.400.00</span></p>
		    					</div>
	    					</div>
    						<div class="bottom-area d-flex px-3">
                  <div class="m-auto d-flex">
                    <form method="get" action="add.php">
									    <input type="hidden" name="id" value="9">
                      <input type="hidden" name="name" value="Vegetable Kottu">
                      <input type="hidden" name="price" value="400">
                      <input type="hidden" name="quantity" value="1">
                      <input type="submit" class="btn btn-primary mx-1" value="Add to cart"></input>
                    </form>
                  </div>
                </div>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-3 ftco-animate">
            <div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="images/cart/11.webp" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">Chicken Fried Rice</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price">Rs.500</span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
                  <div class="m-auto d-flex">
                    <form method="get" action="add.php">
									    <input type="hidden" name="id" value="11">
                      <input type="hidden" name="name" value="Chicken Fried Rice">
                      <input type="hidden" name="price" value="500">
                      <input type="hidden" name="quantity" value="1">
                      <input type="submit" class="btn btn-primary mx-1" value="Add to cart"></input>
                    </form>
                  </div>
                </div>
    					</div>
    				</div>
    			</div>	
    		</div>
    	</div>
    </section>
		
		<section class="ftco-section img" style="background-image: url(images/bg_14.jpg);">
    	<div class="container">
				<div class="row justify-content-end">
          <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
          	<span class="subheading">Today's special</span>
            <h2 class="mb-4">20% Discount when ordering two dinner meals</h2>
            <p>Pair your discounted dinner meals with our chef's special dessert for the perfect ending to your dining experience!</p>
          </div>
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
                <li class=""><a href="https://twitter.com"><span class="icon-twitter"></span></a></li>
                <li class=""><a href="https://www.facebook.com/login/"><span class="icon-facebook"></span></a></li>
                <li class=""><a href="https://www.instagram.com/accounts/login/?hl=en"><span class="icon-instagram"></span></a></li>
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
            <p>Copyright &copy;All rights reserved | by <a href="#" target="_blank">Freshies</a></p>
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
    
    <!-- Modal -->
    <div class="modal fade" id="mealPlanModal" tabindex="-1" role="dialog" aria-labelledby="mealPlanModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="mealPlanModalLabel">Build Your Meal Plan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="mealPlanForm">
              <div id="hidhid">
                <div class="form-group">
                  <label for="mealType">Select Meal Type:</label>
                  <select class="form-control" id="mealType" name="mealType">
                    <option value="breakfast">Breakfast</option>
                    <option value="lunch">Lunch</option>
                    <option value="dinner">Dinner</option>
                    <option value="snack">Snack</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="mealCategory">Select Meal Category:</label>
                  <select class="form-control" id="mealCategory" name="mealCategory">
                    <option value="vegetarian">vegetarian</option>
                    <option value="nonVegetarian">non-Vegetarian</option>
                  </select>
                </div>
              </div>
              <button class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function() {
        var mealTypeSelect = document.getElementById('mealType');
        var mealCategorySelect = document.getElementById('mealCategory');

        mealTypeSelect.addEventListener('change', function() {
            if (mealTypeSelect.value === 'snack') {
                mealCategorySelect.style.display = 'none';
            } else {
                mealCategorySelect.style.display = 'block';
            }
        });

        document.getElementById('mealPlanForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var mealType = mealTypeSelect.value;
            var mealCategory = mealCategorySelect.value;
            var url;

            if (mealType === 'breakfast') {
                if (mealCategory === 'vegetarian') {
                    url = 'meals.php#breakveg';
                } else {
                    url = 'meals.php#breaknonveg';
                }
            } else if (mealType === 'lunch') {
                if (mealCategory === 'vegetarian') {
                    url = 'meals.php#lunchveg';
                } else {
                    url = 'meals.php#lunchnonveg';
                }
            } else if (mealType === 'dinner') {
                if (mealCategory === 'vegetarian') {
                    url = 'meals.php#dinnerveg';
                } else {
                    url = 'meals.php#dinnernonveg';
                }
            } else if (mealType === 'snack') {
                url = 'meals.php#Snack';
            }

            window.location.href = url;
        });
      });
    </script>
  </body>
</html>