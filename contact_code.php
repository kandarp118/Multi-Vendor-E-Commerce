<?php
    include("connection.php");

    // echo $_POST['email'];

    ob_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    if(isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message']))
    {
        $mail = new PHPMailer(true);
        $name=$_POST['name'];
        $email_to=$_POST['email'];
        $subject=$_POST['subject'];
        $message=$_POST['message'];
        $email_from="vecom2425@gmail.com";

        try {

            $mail->isSMTP();                                            
            $mail->SMTPAuth   = true;

            $mail->Host       = 'smtp.gmail.com';                     
            $mail->Username   = 'vecom2425@gmail.com';                    
            $mail->Password   = 'tksqedesfbhizbll';                               

            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
            $mail->Port       = 587;                                    

            $mail->setFrom($email_to, " VECOM : ");
            $mail->addAddress($email_from," VECOM : ");

            $mail->isHTML(true);                              
            $mail->Subject=$subject;
            $mail->Body=$message;

            if ($mail->send()) 
            {
                $ins_cont="INSERT INTO contact VALUES('?','$name','$email_to','$subject','$message')";
                $ins_ans = mysqli_query($c,$ins_cont);
                if ($ins_ans) {
                    echo "success";
                } else {
                    echo "error in insert contact";
                }
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
    else{
        echo "error in fetch ids";
    }
?>