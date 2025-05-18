<?php
    include("connection.php");

    $u_email = $_POST['uemail'];
    $u_pass = $_POST['upass'];

    $sel_user_query = "SELECT * FROM customer WHERE c_email = '$u_email' AND c_password = '$u_pass' ";
    
    $sel_user_ans = mysqli_query($c,$sel_user_query);

    if ($sel_user_ans) {
        if ($fc=mysqli_fetch_array($sel_user_ans)) {
            session_start();
            $_SESSION['user'] = $fc;
            if (isset($_SESSION['user'])) {
                echo "success";
            } else {
                echo "error in session creation";
            }
            
        } else {
            echo "error in fetching data";
        }
        
    } else {
        echo "wrong Email and Password";
    }
    
?>
