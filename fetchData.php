<?php

  @include './config.php';

  if(isset($_POST['month']) && isset($_POST['year'])){
    $year = $_POST['year'];
    $month = $_POST['month'];
    $monthly_income = "SELECT sum(price) as total FROM report WHERE month = '$month' and year = '$year'";
    $result1 = mysqli_query($conn, $monthly_income);
    $total = mysqli_fetch_assoc($result1)['total'];

    $rows = array();
    $category_list = "SELECT meal_category, meal_type, meal_name, count(quantity) as count, sum(price) as price FROM report WHERE month = '$month' and year = '$year' GROUP BY meal_category , meal_type, meal_name";
    $result2 = mysqli_query($conn, $category_list);
    while ($row = mysqli_fetch_assoc($result2)) {
        $rows[] = $row;
    }

    $response = (object) [
        'total' => $total,
        'list' => $rows
    ];

    $responseJSON = json_encode($response);
    header('Content-Type: application/json');
    echo $responseJSON;
  }
?>