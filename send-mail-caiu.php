<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

    //if(!empty($_POST['semanas'])){        

        require 'include/PHPMailer/src/Exception.php';
        require 'include/PHPMailer/src/PHPMailer.php';
        require 'include/PHPMailer/src/SMTP.php';

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            //$mail->SMTPDebug = 2;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtpout.secureserver.net';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'contact@ekovolunteers.com';                     // SMTP username
            $mail->Password   = '$k0volunteers';                               // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('contact@ekovolunteers.com', 'Eko Alliance');
            $mail->addAddress('guilhermesutto91@gmail.com');     // Add a recipient                            

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = utf8_decode('Site caiu');
            
            $body = "Site caiu, arruma la";
            
            $mail->Body    = $body;
            
            $envio = $mail->send();
            echo '1';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }       

    //}