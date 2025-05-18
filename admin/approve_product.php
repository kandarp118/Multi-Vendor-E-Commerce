<?php
    include("connection.php");
    session_start();
    $p_id = $_POST['p_id'];
    $v_id = $_POST['v_id'];
    if (isset($p_id) && isset($v_id)) 
    { 
        if(isset($_SESSION['status_admin']))
        {
            unset($_SESSION['status_admin']);
        }
        $p_id = $_POST['p_id'];
        $v_id = $_POST['v_id'];
        $upd_pro_qur = "UPDATE product SET p_status='1' WHERE p_id='$p_id'";
        $upd_pro_ans = mysqli_query($c,$upd_pro_qur);
        if ($upd_pro_ans) {
            $_SESSION['status_admin'] = "approve".$v_id;
            echo "success";
        } else {
            echo "error in update data";
        }  
    } else {
        echo "error in fetching pid and vid";
    }
    
?>