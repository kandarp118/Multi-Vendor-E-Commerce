<?php
    include("connection.php");
    session_start();

    $u_f_name=$_POST['ufnm'];
    $u_l_name=$_POST['ulnm'];
    $u_m_no=$_POST['umno'];
    $u_email=$_POST['uemail'];

    
        $upd_user="UPDATE customer SET c_first_name='$u_f_name', c_last_name='$u_l_name', c_mobile_no='$u_m_no', c_email='$u_email' WHERE c_id='".$_SESSION['user']['c_id']."'";
        $upd_user_ans=mysqli_query($c,$upd_user);
        if ($upd_user_ans) {
            echo "success";
        } else {
           echo "error in update";
        }
?>