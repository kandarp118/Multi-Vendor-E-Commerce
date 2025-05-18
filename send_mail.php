<?php
ob_start();
session_start();

// $con = mysqli_connect("localhost", "root", "", "v");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
if(isset($_POST['submit']))
{
	$mail = new PHPMailer(true);
	$email_from=$_POST['email'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	$email_to="vecom2425@gmail.com";

	try {

        $mail->isSMTP();                                            
        $mail->SMTPAuth   = true;

        $mail->Host       = 'smtp.gmail.com';                     
        $mail->Username   = 'vecom2425@gmail.com';                    
        $mail->Password   = 'tksqedesfbhizbll';                               

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
        $mail->Port       = 587;                                    

        $mail->setFrom($email_from, ' ');
        $mail->addAddress($email_to,"VECOM");

        $mail->isHTML(true);                              
        $mail->Subject=$subject;
		$mail->Body=$message;

        if ($mail->send()) 
        {
            // $sent = 'Message has been sent Enter otp here';
			echo"success";
        }
        else 
        {
            echo"Something wrong";
        }
    }
    catch (Exception $e) 
    {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}	
?>
