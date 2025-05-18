<?php
    include("connection.php");
    session_start();
    if (isset($_POST['email']) || isset($_POST['mobile'])) {
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $sel_cus = "SELECT * FROM vendor WHERE v_email='$email' OR v_mobile_no='$mobile' ";
        $sel_res = mysqli_query($c,$sel_cus);
        if ($sel_res) {
            $_SESSION['pass_email_sell'] = $email;
            $_SESSION['pass_mobile_sell'] = $mobile ;
            if (isset($_SESSION['pass_email_sell']) || isset($_SESSION['pass_mobile_sell'])) 
            {
                echo "success";
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