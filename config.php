<?php
    $conn = mysqli_connect('localhost','root','','freshies');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
