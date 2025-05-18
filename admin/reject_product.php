<?php
    include("connection.php");
    session_start();
    $p_id = $_POST['p_id'];
    $v_id = $_POST['v_id'];
    
    if (isset($p_id) && isset($v_id)) {
        if (isset($_SESSION['status_admin'])) {
            unset($_SESSION['status_admin']);
        }
        $upd_pro="UPDATE product SET p_status='0' WHERE p_id='$p_id' AND p_author='$v_id'";
        $upd_ans=mysqli_query($c,$upd_pro);
        if ($upd_ans) {
            $_SESSION['status_admin'] = "reject".$v_id;
            echo "success";
        } else {
            echo "error in rejecting";
        }
        
    } else {
        echo "error in fetching pid and vid";
    }
    
?>