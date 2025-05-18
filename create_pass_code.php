<?php

    include("connection.php");
    session_start();

    if (isset($_SESSION['pass_email']) || isset($_SESSION['pass_mobile']))
    {
        if (isset($_POST['new_pass']) && isset($_POST['conf_pass'])) 
        {
            if ($_POST['new_pass'] == $_POST['conf_pass']) 
            {
                $pass = $_POST['new_pass'];
                $email = $_SESSION['pass_email'];
                $mobile = $_SESSION['pass_mobile'];
                $upd_pass = "UPDATE customer SET c_password = '$pass' WHERE c_email = '$email' OR c_mobile_no = '$mobile'";    
                $upd_ans = mysqli_query($c,$upd_pass);
                
                if ($upd_ans) {
                    unset($_SESSION['pass_email']);
                    unset($_SESSION['pass_mobile']);
                    if (!isset($_SESSION['pass_email']) || !isset($_SESSION['pass_mobile'])) {
                        echo "success";
                    }
                    else
                    {
                        echo "error in unset session";
                    }
                } else {
                    echo "error in uodate query";
                }
            } 
            else 
            {
                echo "do not mache Password";
            }
        }
        else 
        {
            echo "New Password is not set.";
        }
    } 
    else 
    {
        echo "Email or Mobile no. is not set.";
    }  
?>