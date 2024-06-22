<?php
  session_start();

  @include './config.php';

  if (!(isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true)) {
      header("Location: ./");
      exit();
  }

  //dashboard
  $sql_orders = "SELECT * FROM orders";
  $result = mysqli_query($conn, $sql_orders);


  //report
  $year = date('Y');
  $month = date('F');
  $total_price = "SELECT sum(price) as total FROM report WHERE month = '$month' and year = '$year'";
  $result1 = mysqli_query($conn, $total_price);
  $total = mysqli_fetch_assoc($result1)['total'];

  // $category_list = "SELECT meal_category, meal_type, meal_name, count(quantity) as count, sum(price) as price FROM report WHERE month = '$month' and year = '$year' GROUP BY meal_category , meal_type, meal_name";
  // $result2 = mysqli_query($conn, $category_list);

  $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  $years = [2020, 2021, 2022, 2023, 2024];
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
	        </ul>
	      </div>
	    </div>
	  </nav>
    <div class="hero-wrap hero-bread" style="background-image: url('images/signin.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Dashboard</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section ftco-category ftco-no-pt">
      <?php
        if (mysqli_num_rows($result) > 0) {
      ?>
        <div class="container">
          <div class="row align-items-center justify-content-sm-between">
            <h2 class="mt-4 mb-4">Order Dashboard</h2>
            <div style="height: 5px">
              <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#generateReport">Generate Monthly Report</button>
            </div>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Total Price</th>
                <th>Payment Method</th>
                <th>Items</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $index = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                  $index++;
              ?>
                <tr>
                  <td><?php echo $index ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['address']; ?></td>
                  <td><?php echo $row['contact_number']; ?></td>
                  <td><?php echo $row['total_price']; ?></td>
                  <td><?php echo $row['payment_method']; ?></td>
                  <td>
                    <?php 
                      $items = json_decode($row['items'], true);
                      foreach ($items as $item) {
                        echo $item['name'] . ' X ' . $item['quantity'] . '<br>';
                      }
                      ?>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <br>
      <?php
        } else {
          echo "<center>No orders found.</center>";
        }
      ?>
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

    <!-- Modal -->
    <div class="modal fade" id="generateReport" tabindex="-1" role="dialog" aria-labelledby="generateReportModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header" style="align-items: center !important; gap: 10px;">
            <h5 class="modal-title" id="generateReportModalLabel">Your Monthly Report</h5>
            <select style="width: 100px;" id="month" name="month">
              <?php 
                foreach($months as $month){
                  if ($month !== date('F')) {
                    echo "<option value='$month'>$month</option>";
                  } else {
                    echo "<option value='$month' selected>$month</option>";
                  }
                }
              ?>
            </select>
            <select style="width: 100px;" id="year" name="year">
              <?php 
                foreach($years as $year){
                  if ($year == date('Y')) {
                    echo "<option value='$year' selected>$year</option>";
                  } else {
                    echo "<option value='$year'>$year</option>";
                  }
                }
              ?>
            </select>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <table class="table table-striped" style="min-width: 100% !important;">
            <thead>
              <tr>
                <th style="padding: 0 !important;"></th>
                <th style="padding: 0 !important;">Qty.</th>
                <th style="padding: 0 !important;">Price</th>
              </tr>
            </thead>
            <tbody id="tableBody">
            
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script>
      $(document).ready(function(){
        function fetchData(month, year) {
          $.ajax({
            url: 'fetchData.php',
            type: 'POST',
            data: { month: month, year: year },
            success: function(response){
              var data = response.list;
              var html_table = "<tr style=\"background-color: white !important;\">";

              html_table += "<td style=\"padding: 0 !important; text-align: start !important; border-bottom: none !important;\">Breakfast</td>";
              html_table += "</tr>";
              html_table += "<tr style=\"background-color: white !important;\">";
              html_table += "<td style=\"padding: 0 !important; text-align: start !important; border-bottom: none !important; padding-left: 5px !important\">- Veg</td>";
              html_table += "</tr>";
              html_table += generateRows('veg', 'breakfast', data)
              html_table += "<tr style=\"background-color: white !important;\">";
              html_table += "<td style=\"padding: 0 !important; text-align: start !important; border-bottom: none !important; padding-left: 5px !important\">- NonVeg</td>";
              html_table += "</tr>";
              html_table += generateRows('nonVeg', 'breakfast', data)
              html_table += "<tr style=\"background-color: white !important;\">";
              html_table += "<td style=\"padding: 0 !important; text-align: start !important; border-bottom: none !important;\">Lunch</td>";
              html_table += "</tr>";
              html_table += "<tr style=\"background-color: white !important;\">";
              html_table += "<td style=\"padding: 0 !important; text-align: start !important; border-bottom: none !important; padding-left: 5px !important\">- Veg</td>";
              html_table += "</tr>";
              html_table += generateRows('veg', 'lunch', data)
              html_table += "<tr style=\"background-color: white !important;\">";
              html_table += "<td style=\"padding: 0 !important; text-align: start !important; border-bottom: none !important; padding-left: 5px !important\">- NonVeg</td>";
              html_table += "</tr>";
              html_table += generateRows('nonVeg', 'lunch', data)
              html_table += "<tr style=\"background-color: white !important;\">";
              html_table += "<td style=\"padding: 0 !important; text-align: start !important; border-bottom: none !important;\">Dinner</td>";
              html_table += "</tr>";
              html_table += "<tr style=\"background-color: white !important;\">";
              html_table += "<td style=\"padding: 0 !important; text-align: start !important; border-bottom: none !important; padding-left: 5px !important\">- Veg</td>";
              html_table += "</tr>";
              html_table += generateRows('veg', 'dinner', data)
              html_table += "<tr style=\"background-color: white !important;\">";
              html_table += "<td style=\"padding: 0 !important; text-align: start !important; border-bottom: none !important; padding-left: 5px !important\">- NonVeg</td>";
              html_table += "</tr>";
              html_table += generateRows('nonVeg', 'dinner', data)
              html_table += "<tr style=\"background-color: white !important;\">";
              html_table += "<td style=\"padding: 0 !important; text-align: start !important; border-bottom: none !important;\">Snacks</td>";
              html_table += "</tr>";
              for(var i = 0; i < data.length; i++){
                if(data[i].meal_category == 'snacks'){
                  html_table += "<tr style=\"background-color: white !important;\">";
                  html_table += "<td style=\"padding: 0 !important; text-align: start !important; border-bottom: none !important; padding-left: 25px !important\">" + data[i].meal_name + "</td>";
                  html_table += "<td style=\"padding: 0 !important; border-bottom: none !important;\">" + data[i].count + "</td>";
                  html_table += "<td style=\"padding: 0 !important; border-bottom: none !important;\">Rs. " + data[i].price + ".00</td>";
                  html_table += "</tr>";
                }
              }
              html_table += "<tr style=\"background-color: white !important;\">";
              html_table += "<b><td style=\"padding: 0 !important; text-align: start !important; border-top: 3px solid !important; border-bottom: 3px double !important;\">Total Income</b></td>";
              html_table += "<td style=\"padding: 0 !important; border-top: 3px solid !important; border-bottom: 3px double !important;\">&nbsp;</td>";
              if(response.total){
                html_table += "<td style=\"padding: 0 !important; border-top: 3px solid !important; border-bottom: 3px double !important;\" id='total_income'>Rs. " + response.total + ".00</td>";
              }else{
                html_table += "<td style=\"padding: 0 !important; border-top: 3px solid !important; border-bottom: 3px double !important;\" id='total_income'>Rs. 0.00</td>";
              }
              html_table += "</tr>";

              $('#tableBody').html(html_table)
            },
            error: function(xhr, status, error) {
              console.error('Error fetching data: ', error);
            }
          });
        }

        function generateRows(type, category, data) {
          var str = "";
          for(var i = 0; i < data.length; i++){
            if(data[i].meal_category == category){
              if(data[i].meal_type == type){
                str += "<tr style=\"background-color: white !important;\">";
                str += "<td style=\"padding: 0 !important; text-align: start !important; border-bottom: none !important; padding-left: 25px !important\">" + data[i].meal_name + "</td>";
                str += "<td style=\"padding: 0 !important; border-bottom: none !important;\">" + data[i].count + "</td>";
                str += "<td style=\"padding: 0 !important; border-bottom: none !important;\">Rs. " + data[i].price + ".00</td>";
                str += "</tr>";
              }
            }
          }

          return str;
        }

        var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var currentMonth = months[new Date().getMonth()];
        var currentYear = new Date().getFullYear();
        fetchData(currentMonth, currentYear);

        $('#year, #month').change(function(){
          var selectedMonth = $('#month').val();
          var selectedYear = $('#year').val();
          fetchData(selectedMonth, selectedYear);
        });

      });
  </script>

  </body>
</html>

