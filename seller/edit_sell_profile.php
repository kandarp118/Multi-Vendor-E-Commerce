<?php
    include("connection.php");
    session_start();
    $s_f_nm=$_POST['sfnm'];
    $s_l_nm=$_POST['slnm'];
    $s_m_no=$_POST['smno'];
    $s_email=$_POST['semail'];
    $s_store_nm=$_POST['sstorenm'];
    $s_store_about=$_POST['sstoreabout'];
    $s_address=$_POST['saddress'];
    $s_img=$_FILES['file']['name'];

    if ($s_img === "")  
    {
        $upd_sell="UPDATE vendor SET v_f_name='$s_f_nm', v_l_name='$s_l_nm', v_mobile_no='$s_m_no', v_email='$s_email', v_address='$s_address', v_store_name='$s_store_nm', v_store_about='$s_store_about' WHERE v_id='".$_SESSION['seller']['v_id']."'";
        $upd_sell_ans=mysqli_query($c,$upd_sell);
        if ($upd_sell_ans) {
            echo "success";
        } else {
            echo "error in update";
        }
    } else {
        $s_img_old=$_FILES['file']['tmp_name'];
        $s_img_new= "C:/xampp/htdocs/Akommerce/seller/img/vendor_img/" . $s_img;
        if (move_uploaded_file($s_img_old,$s_img_new)) {
            $upd_sell="UPDATE vendor SET v_f_name='$s_f_nm', v_l_name='$s_l_nm', v_mobile_no='$s_m_no', v_email='$s_email', v_address='$s_address', v_image='$s_img', v_store_name='$s_store_nm', v_store_about='$s_store_about' WHERE v_id='".$_SESSION['seller']['v_id']."'";
            $upd_sell_ans=mysqli_query($c,$upd_sell);
            if ($upd_sell_ans) {
                echo "success";
            } else {
                echo "error in update";
            }
        } else {
            echo "error in upload file";
        }
        
        
    }
    
?>