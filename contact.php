<?php
    include "inportHeaders.php";
    
    $title = "Contact Us";
    $message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["fName"] && $_POST["lName"] && $_POST["email"] && $_POST["subject"] && $_POST["message"])
        {
            sendEmail();
        }
        else
        {

        }
    }
      

    function sendEmail()
    {
        $name = $_POST["fName"].' '.$_POST["lName"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];
        
        //send the email
        require '../classes/PHPMailer-master/PHPMailerAutoload.php';
        //Create a PHPMailer object
        $mail = new PHPMailer();
        //Set up server settings this has to be typed in exactly as listed
        $mail->isSMTP();
        $mail->Host = 'smtp.sendgrid.net';
        $mail->SMTPAuth = true;
        $mail->Username = 'apikey';
        $mail->Password = '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';
        $mail->Port = 25;
        //specify who this is from
        $mail->From = 'NSI.Hornsby.IT@tafensw.edu.au';
        $mail->FromName = $name;
        // //Set an alternative reply-to address
        // $mail->addReplyTo($email, $name);
        //Set who the message is to be sent to
        $mail->addAddress($email, $name);
        //Set the subject line
        $mail->Subject = $subject;
        $mail->isHTML(true);
        $mail->Body = "<p>$message</p>";
        //send the message, check for errors
        if (!$mail->send())
        {
            $message = $mail->ErrorInfo;
        }
        else
        {
            $message = "Message sent!";
        }
        echo $message;
        return;
    }

    ob_start();
    //display 
    include "./templates/contactForm.html.php";

    $output = ob_get_clean();
    include "./templates/layout.html.php";
?>