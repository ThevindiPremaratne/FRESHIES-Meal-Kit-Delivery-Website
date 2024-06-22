<?php
    session_start();

    if(isset($_GET['id'])) {
        $itemId = $_GET['id'];
        if(isset($_SESSION['cart'][$itemId])) {
            unset($_SESSION['cart'][$itemId]);
        }
    }

    header("Location: cart.php");
    exit();
?>
