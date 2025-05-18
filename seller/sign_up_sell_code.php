<?php
    include("connection.php");

    $v_f_name = $_POST['sfnm'];
    $v_l_name = $_POST['slnm'];
    $v_mono = $_POST['scucode'] . $_POST['smono'];
    $v_email = $_POST['semail'];
    $v_pass = $_POST['srpass'];
    $v_add = $_POST['sadd'];
    $v_stor_name = $_POST['ssnm'];
    $v_stor_about = $_POST['sabout'];
    $v_img = $_FILES['file']['name'];
    $v_img_old = $_FILES['file']['tmp_name'];
    $v_img_new = "C:/xampp/htdocs/Akommerce/seller/img/vendor_img/";

    if (move_uploaded_file($v_img_old,$v_img_new.$v_img)) {
        $ins_user_query = "INSERT INTO `vendor`(`v_id`, `v_f_name`, `v_l_name`, `v_mobile_no`, `v_email`, `v_password`, `v_address`, `v_image`, `v_store_name`, `v_store_about`)
        VALUES ('?','$v_f_name','$v_l_name','$v_mono','$v_email','$v_pass','$v_add','$v_img','$v_stor_name','$v_stor_about')";
        
        $ins_user_ans = mysqli_query($c,$ins_user_query);

        if ($ins_user_ans) {
            echo "success";
        } else {
            echo "error insert data";
        }
    } else {
        echo "error in file uploading";
    }
    
    
    
?>