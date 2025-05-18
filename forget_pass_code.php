<?php
    include("connection.php");
    session_start();
    if (isset($_POST['email']) || isset($_POST['mobile'])) {
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $sel_cus = "SELECT * FROM customer WHERE c_email='$email' OR c_mobile_no='$mobile' ";
        $sel_res = mysqli_query($c,$sel_cus);
        if ($sel_res) {
            $_SESSION['pass_email'] = $email;
            $_SESSION['pass_mobile'] = $mobile;
            if (isset($_SESSION['pass_email']) || isset($_SESSION['pass_mobile'])) 
            {
                echo "success";
            }
            else
            {
                echo "error in session set";
            }
        }
        else
        {
            echo "Wrong Email or Mobile No.";
        }
    } else {
        echo "not set email or mobile no";
    }
    
?>