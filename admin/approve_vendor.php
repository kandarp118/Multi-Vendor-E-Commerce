<?php
    include("connection.php");
    session_start();
    $v_id = $_POST['v_id'];

    if (isset($v_id))
    {
        if (isset($_SESSION['status_admin_sell'])) {
            unset($_SESSION['status_admin_sell']);
        }
        $upd_vendor_qur = "UPDATE vendor SET v_status='1' WHERE v_id='$v_id'";
        $upd_vendor_ans = mysqli_query($c,$upd_vendor_qur);

        if ($upd_vendor_ans) {
            $_SESSION['status_admin_sell'] = "approve_seller".$v_id;
            if ($_SESSION['status_admin_sell']){
            echo "success";
            }
        } else {
            echo "error in update data";
        }
    }
    else 
    {
        echo "error in fetching vid";
    }
    
    
?>