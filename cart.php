<?php  
  session_start();

  $totalPrice = 0.00;
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
	          <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[<?php echo $cartCount; ?>]</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/cart.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
					    <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <h2>Cart Contents</h2>
                    <?php
                      if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        echo '<table class="table">';
                        echo '<thead class="thead-primary">';
                        echo '<tr class="text-center">';
                        echo '<th>&nbsp;</th>';
                        echo '<th>&nbsp;</th>';
                        echo '<th>Product Name</th>';
                        echo '<th>Price</th>';
                        echo '<th>Quantity</th>';
                        echo '<th>Total</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';

                        foreach ($_SESSION['cart'] as $itemId => $item) {
                          echo '<tr class="text-center" id="item_' . $itemId . '">';
                          echo '<td class="product-remove"><a href="./remove.php?id=' . $itemId . '">x</a></td>';
                          echo '<td class="image-prod"><div class="img" style="background-image:url(./' . $item['itemImage'] . ');"></div></td>';
                          echo '<td class="product-name">' . $item['itemName'] . '</td>';
                          echo '<td class="price">' . $item['itemPrice'] . '</td>';
                          echo '<td class="quantity"><a href="./add.php?id=' . $itemId .  '&name=' . urlencode($item['itemName']) . '&price=' . $item['itemPrice'] . '&quantity=-1">&nbsp&nbsp&nbsp-&nbsp&nbsp&nbsp</a>' . $item['quantity'] . '<a href="./add.php?id=' . $itemId .  '&name=' . urlencode($item['itemName']) . '&price=' . $item['itemPrice'] . '&quantity=1">&nbsp&nbsp&nbsp+&nbsp&nbsp&nbsp</a></td>';
                          echo '<td class="total" id="total_' . $itemId . '">' . ($item['itemPrice'] * $item['quantity']) . '</td>';
                          $totalPrice += ($item['itemPrice'] * $item['quantity']);
                          echo '</tr>';
                        }	

                        echo '</tbody>';
                        echo '</table>';
                      } else {
                        echo '<p>Your cart is empty.</p>';
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <form id="checkoutForm" action="checkout.php" method="POST" class="info">
              <div class="row justify-content-end">
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                  <div class="cart-total mb-3">
                    <h3 class="billing-heading mb-4">Payment Method</h3>
                    <div class="form-group">
                      <label><input type="radio" name="payment_method" value="Direct Bank Tranfer" class="mr-2"> Direct Bank Tranfer</label>
                    </div>
                    <div class="form-group">
                      <label><input type="radio" name="payment_method" value="Check Payment" class="mr-2"> Check Payment</label>
                    </div>
                    <div class="form-group">
                      <label><input type="radio" name="payment_method" value="Paypal" class="mr-2"> Paypal</label>
                    </div>
                    <div class="form-group">
                      <label><input required type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                  <div class="cart-total mb-3">
                    <h3>Order Information</h3>
                    <div class="form-group">
                      <label for="">Name<span style="color:red"> *</span></label>
                      <input required type="text" name="name" class="form-control text-left px-3" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="country">Address<span style="color:red"> *</span></label>
                      <input required type="text" name="address" class="form-control text-left px-3" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="country">Contact Number<span style="color:red"> *</span></label>
                      <input required type="text" name="contact_number" class="form-control text-left px-3" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="country">Email Address<span style="color:red"> *</span></label>
                      <input required type="text" name="email" class="form-control text-left px-3" placeholder="">
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                  <div class="cart-total mb-3">
                    <h3>Cart Total</h3>
                    <p class="d-flex">
                      <span>Subtotal</span>
                      <span>$<?php echo $totalPrice ?></span>
                    </p>
                    <p class="d-flex">
                      <span>Delivery</span>
                      <span>$0.00</span>
                    </p>
                    <p class="d-flex">
                      <span>Discount</span>
                      <span>$<?php if($totalPrice<=3){echo 0.00;} else {echo 3.00;} ?></span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                      <span>Total</span>
                      <input name="totalprice" type="text" value="<?php if($totalPrice<=3){echo '0.00';} else {echo $totalPrice-3.00;} ?>" readonly>
                      <?php
                        if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            
                          foreach ($_SESSION['cart'] as $itemId => $item) {
                            echo '<input type="hidden" name="item_names[]" value="' . $item['itemName'] . '">';
                            echo '<input type="hidden" name="item_quantities[]" value="' . $item['quantity'] . '">';
                          } 
                        } else {
                          echo '<input type="hidden" name="item_names[]" value="">';
                          echo '<input type="hidden" name="item_quantities[]" value="">';
                        }
                      ?>
                    </p>
                  </div>
                  <input type="hidden" name="total_price" value="<?php echo $totalPrice; ?>">
                  <button type="submit" class="btn btn-primary py-3 px-4">Place an order</button>
                </div>
              </div>
            </form>
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
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>

  </body>
</html>