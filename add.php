<?php
    session_start();

    function addToCart($itemId, $itemName, $itemPrice, $itemImage, $quantity, $mealType, $mealCategory)
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        if (isset($_SESSION['cart'][$itemId])) {
            $_SESSION['cart'][$itemId]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$itemId] = array(
                'itemName' => $itemName,
                'itemPrice' => $itemPrice,
                'itemImage' => $itemImage,
                'quantity' => $quantity,
                'mealType' => $mealType,
                'mealCategory' => $mealCategory
            );
        }

    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $nm = $_GET['name'];
        $pr = $_GET['price'];
        $im = $_GET['image'];
        $qu = $_GET['quantity'];
        $mt = $_GET['mealType'];
        $mc = $_GET['mealCategory'];

        addToCart($id, $nm, $pr, $im, $qu, $mt, $mc);
        echo "<script>window.history.back();</script>";
    }
?>