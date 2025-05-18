<?php
    include("connection.php");
    session_start();
    if (isset($_POST['o_id']) && isset($_POST['om_id'])) {
        $o_id = $_POST['o_id'];
        $om_id = $_POST['om_id'];
        // $upd_order = "UPDATE orders SET o_status='1' WHERE o_id='$o_id'";
        // $upd_ans = mysqli_query($c,$upd_order);
        // if ($upd_ans) {
            $upd_order1 = "UPDATE order_master SET om_status='1' WHERE om_id='$om_id' AND o_id='$o_id'";
            $upd_ans1 = mysqli_query($c,$upd_order1);
            if ($upd_ans1) {
                $_SESSION['status_admin_order'] = "delivered".$_SESSION['user']['c_id'];
                echo "success";
            } else {
                echo "error in update order_master status";
            }
        // } else {
        //     echo "error in update orders status";
        // }
    } else {
        echo "o_id ans om_id not send";
    }
    
?>