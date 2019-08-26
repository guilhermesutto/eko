<?php
include("include/db.php");
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
            $mail->Password   = 'c0nt@ct123';                               // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 3535;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('contact@ekovolunteers.com', 'Eko Alliance');
            $mail->addAddress('guilhermesutto91@gmail.com');     // Add a recipient            
            $mail->addAddress('gabriella@ekovolunteers.com');     // Add a recipient            
            $mail->addAddress('gabriellalmachado1@gmail.com');     // Add a recipient            

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = utf8_decode('Inscrição realizada pelo site');
            
            $body = utf8_decode("Foi feita uma solicitação de inscrição pelo site, segue as informações desse voluntário:")." <br> <br> ";
            foreach($_POST as $key=>$value){
                if($key == 'project'){                    
                    $body .= ucwords($key).": ".getTermobyId($value)." <br> "; 
                }else{
                    $body .= ucwords($key).": ".$value." <br> "; 
                }    
            }
            $mail->Body    = $body;
            
            $envio = $mail->send();
            echo '1';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }       

    //}