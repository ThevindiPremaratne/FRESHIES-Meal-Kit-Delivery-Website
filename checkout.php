<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpMailer/src/Exception.php';
    require 'phpMailer/src/PHPMailer.php';
    require 'phpMailer/src/SMTP.php';

    include './config.php';
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $year = date('Y');
        $month = date('F');
        $name = $_POST['name'];
        $address = $_POST['address'];
        $contact_number = $_POST['contact_number'];
        $email = $_POST['email'];
        $total_price = $_POST['totalprice'];
        $payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : '';

        foreach(($_SESSION['cart']) as $key => $item){
            $uniqueId = time().'-'.mt_rand();
            $itemName = $item['itemName'];
            $mealType = isset($item['mealType']) ? $item['mealType'] : '';
            $mealCategory = $item['mealCategory'];
            $quantity = $item['quantity'];
            $price = $item['itemPrice'] * $quantity;

            $sql_report = "INSERT INTO report (id, meal_name, meal_type, meal_category, quantity, year, month, price) 
                    VALUES ('$uniqueId', '$itemName', '$mealType', '$mealCategory', '$quantity', '$year', '$month', '$price')";

            mysqli_query($conn, $sql_report);
        }

        $items = array();
        foreach ($_POST['item_names'] as $key => $item_name) {
            $item_quantity = $_POST['item_quantities'][$key];
            $items[] = array('name' => $item_name, 'quantity' => $item_quantity);
        }
        $serialized_items = json_encode($items);

        $sql_order = "INSERT INTO orders (name, address, contact_number, total_price, payment_method, items) 
                    VALUES ('$name', '$address', '$contact_number', '$total_price', '$payment_method', '$serialized_items')";
        
        if (mysqli_query($conn, $sql_order)) {
            sendMail($name, $email);
            unset($_SESSION['cart']);
            header("Location: cart.php");
            exit();
        } else {
            $sql_report_delete = "DELETE FROM report WHERE id = '$uniqueId'";
            mysqli_query($conn, $sql_report_delete);
            echo "Error: " . $sql_order . "<br>" . mysqli_error($conn);
        }
        
        mysqli_close($conn);
    } else {
        header("Location: cart.php");
        exit();
    }

    function sendMail($name, $email){
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();                                          
            $mail->Host       = 'smtp.gmail.com';                     
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'freshiess2024@gmail.com';    //Your mail
            $mail->Password   = 'test';     //app password
            $mail->SMTPSecure = 'ssl';           
            $mail->Port       = 465;                                 
        
            //Recipients
            $mail->setFrom('freshiess2024@gmail.com');        //your mail
            $mail->addAddress($email, $name); 
        
            //Content
            $mail->isHTML(true);                                  
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>
