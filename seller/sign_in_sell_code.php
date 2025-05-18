<?php
    include("connection.php");

    $v_email = $_POST['semail'];
    $v_pass = $_POST['spass'];

    $sel_sell_query = "SELECT * FROM vendor WHERE v_email = '$v_email' AND v_password = '$v_pass' ";
    
    $sel_sell_ans = mysqli_query($c,$sel_sell_query);

    if ($sel_sell_ans) {
        if ($fc=mysqli_fetch_array($sel_sell_ans)) {
            session_start();
            $_SESSION['seller'] = $fc;
            if (isset($_SESSION['seller'])) {
                $_SESSION['status_seller_req'] = "seller".$_SESSION['seller']['v_id'];
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
