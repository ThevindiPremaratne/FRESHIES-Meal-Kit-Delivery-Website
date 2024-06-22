<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpMailer/src/Exception.php';
    require 'phpMailer/src/PHPMailer.php';
    require 'phpMailer/src/SMTP.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        
        sendMail($name, $email);
        header("Location: contact.php");
        exit();
    } else {
        header("Location: contact.php");
        exit();
    }

    function sendMail($name, $email, $subject, $message){
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
            $mail->Subject = $subject;
            $mail->Body    = $message;
        
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>
