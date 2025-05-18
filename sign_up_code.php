<?php
    include("connection.php");

    $u_f_name = $_POST['ufnm'];
    $u_l_name = $_POST['ulnm'];
    $u_mono = $_POST['cucode']." ".$_POST['umno'];
    $u_email = $_POST['uemail'];
    $u_pass = $_POST['rpass'];
    
    $ins_user_query = "INSERT INTO customer VALUES ('?','$u_f_name','$u_l_name','$u_mono','$u_email','$u_pass')";
    
    $ins_user_ans = mysqli_query($c,$ins_user_query);

    if ($ins_user_ans) {
        echo "success";
    } else {
        echo "error";
    }
    
?>